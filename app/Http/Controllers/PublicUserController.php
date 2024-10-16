<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicUserController extends Controller
{
	public function profile()
	{
		$title = 'Profile';
		$orders = Order::get();
		return view('public.profile', compact('title', 'orders'));
	}

	public function ajaxGetDetailOrder(Request $request)
	{
		if (request()->ajax()) {
			$orderDetail = OrderDetail::join('products', 'order_details.product_id', 'products.id')
				->leftJoin('colors', 'order_details.color_id', 'colors.id')
				->leftJoin('sizes', 'order_details.size_id', 'sizes.id')
				->where('order_details.order_id', $request['order_id'])
				->select(
					'order_details.price',
					'order_details.discount',
					'order_details.total',
					'order_details.total_item',
					'colors.color',
					'sizes.size',
					'products.product'
				)
				->addSelect(DB::raw('(
					SELECT file
					FROM product_galleries
					WHERE product_galleries.product_id = products.id
					LIMIT 1
				) as image'))
				->get();

			$order = Order::find($request['order_id']);
			return response()->json([
				'order_detail' => $orderDetail,
				'order' => $order
			], 200);
		}
	}

	public function ajaxPaymentMethod(Request $request)
	{
		if (request()->ajax()) {
			$this->validate($request, [
				'payment' => 'required',
			]);

			try {
				$random_code = null;
				$status = 'process';
				if ($request['payment'] == 'transfer') {
					$random_code = rand(100, 999);
					$status = 'waiting payment';
				}

				$order = Order::find($request['product_id']);
				$order->payment_term = $request['payment'];
				$order->description = $request['description'];
				$order->status = $status;
				$order->uniqe_code = $random_code;
				$order->save();

				if ($request['payment'] == 'transfer') {
					return response()->json([
						'message' => 'Order berhasil dilanjutkan, silakan lakukan pembayaran melalui menu mengunggu pembayaran'
					], 200);
				} else {
					return response()->json([
						'message' => 'Order berhasil dilanjutkan. Tunggu perubahan status orderan anda'
					], 200);
				}
			} catch (Exception $e) {
				return response()->json([
					'message' => 'Gagal melanjutkan proses order',
					'error_log' => $e
				], 501);
			}
		}
	}
}
