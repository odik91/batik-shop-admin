<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
