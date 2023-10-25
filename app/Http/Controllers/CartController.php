<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CartController extends Controller
{
	public function ajaxGetCartUser(Request $request)
	{
		if (request()->ajax()) {
			$cart = Cart::join('products', 'carts.product_id', 'products.id')
				->leftJoin('colors', 'carts.color_id', 'colors.id')
				->leftJoin('sizes', 'carts.size_id', 'sizes.id')
				->select(
					'carts.id as cart_id',
					'carts.product_id as id',
					'carts.size_id',
					'carts.color_id',
					'carts.quantity',
					'products.product',
					'products.price',
					'products.weight_estimation',
					'colors.color',
					'sizes.size',
					DB::raw('SUM(carts.quantity * products.price) as total')
				)
				->addSelect(DB::raw('(
						SELECT file
						FROM product_galleries
						WHERE product_galleries.product_id = products.id
						LIMIT 1
					) as image'))
				->where('carts.user_id', auth()->user()['id'])
				->groupBy(
					'cart_id',
					'id',
					'size_id',
					'color_id',
					'quantity',
					'product',
					'price',
					'weight_estimation',
					'color',
					'size',
					'image'
				)
				->get();

			return response()->json($cart, 200);
		}
	}

	public function ajaxUpdateCart(Request $request)
	{
		if (request()->ajax()) {
			try {
				$cart = Cart::find($request['id']);
				$cart->delete();
				return response()->json([
					'message' => 'Barang berhasil dihapus dari keranjang'
				], 200);
			} catch (Exception $e) {
				return response()->json([
					'message' => 'Barang gagal dihapus dari keranjang'
				], 501);
			}
		}
	}

	public function ajaxCartCheckout(Request $request)
	{
		if (request()->ajax()) {
			$this->validate($request, [
				'total_peritem' => 'required',
				'id_item' => 'required',
				'province' => 'required',
				'kota' => 'required',
				'courier' => 'required',
			]);

			$id = Str::uuid();

			# calculate weight
			$get_cart_items = Cart::whereIn('carts.id', $request['id_item'])
				->join('products', 'carts.product_id', 'products.id')
				->select(
					'carts.product_id',
					'carts.size_id',
					'carts.color_id',
					'products.price',
					'products.weight_estimation',
				)
				->get();

			$total_weight = 0;
			$total_price = 0;
			foreach ($get_cart_items as $key => $cart_item) {
				$total_weight += (float) $request['total_peritem'][$key] * (float) $cart_item['weight_estimation'];
				$total_price += (float) $request['total_peritem'][$key] * (float) $cart_item['price'];
			}

			DB::beginTransaction();
			try {
				# get ship cost expenses
				$cost_shipping = 10000;
				$data = '';

				if ($request['courier'] != 'lokal') {
					$curl = curl_init();
					$key = env('RAJA_ONGKIR');
					$origin = env('DEFAULT_CITY');

					$kota = $request['kota'];
					$berat = $total_weight < 1 ? 1 : $total_weight;
					$kurir = $request['courier'];

					curl_setopt_array($curl, array(
						CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_ENCODING => "",
						CURLOPT_MAXREDIRS => 10,
						CURLOPT_TIMEOUT => 30,
						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST => "POST",
						CURLOPT_POSTFIELDS => "origin=$origin&destination=$kota&weight=$berat&courier=$kurir",
						CURLOPT_HTTPHEADER => array(
							"content-type: application/x-www-form-urlencoded",
							"key: $key"
						),
					));

					$response = curl_exec($curl);
					$err = curl_error($curl);
					$data = json_decode($response);

					$cost_services = $data->rajaongkir->results[0]->costs;

					foreach ($cost_services as $cost_service) {
						if ($cost_service->service == $request['service_choice']) {
							$cost_shipping = (float) $cost_service->cost[0]->value;
						}
					}
				}

				# insert data into table order
				$invoice = Order::generateInvoice('no-iv/batik/');
				$order = new Order([
					'id' => strtoupper($id),
					'invoice' => $invoice,
					'user_id' => auth()->user()['id'],
					'status' => 'ordered',
					'address' => $request['alamat'],
					'province_id' => $request['province'],
					'city_id' => $request['kota'],
					'courier' => $request['courier'],
					'service' => $request['service_choice'],
					'shipping_expenses' => $cost_shipping,
					'wight' => $total_weight,
					'total' => $total_price,
				]);
				$order->save();

				foreach ($request['id_item'] as $key => $id_item) {
					$size_id = $get_cart_items[$key]['size_id'] ? (int) $get_cart_items[$key]['size_id'] : null;
					$color_id = $get_cart_items[$key]['color_id'] ? (int) $get_cart_items[$key]['color_id'] : null;
					$order_detail = new OrderDetail([
						'order_id' => strtoupper($id),
						'product_id' => (int) $get_cart_items[$key]['product_id'],
						'size_id' => $size_id,
						'color_id' => $color_id,
						'total_item' => (float) $request['total_peritem'][$key],
						'price' => (float) $get_cart_items[$key]['price'],
						'discount' => 0,
						'total' => (float) $request['total_peritem'][$key] * (float) $get_cart_items[$key]['price'],
					]);
					$order_detail->save();
					Cart::where('id', $id_item)->delete();
				}

				DB::commit();

				return response()->json([
					'message' => 'Pesanan berhasil dibuat'
				], 200);
			} catch (Exception $e) {
				DB::rollBack();
				return response()->json([
					'message' => 'Pemesanan barang gagal dilakukan',
					'error_log' => $e->getMessage(),
				], 422);
			}
		}
	}
}
