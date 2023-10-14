<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\Subcategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	public function index()
	{
		$title = 'Produk';
		$parent = 'toko';
		return view('admin.pages.products.index', compact('title', 'parent'));
	}

	public function ajaxGetCategory(Request $request)
	{
		if (request()->ajax()) {
			$categories = Category::where('category', 'like', '%' . $request['query'] . '%')
				->orderBy('category', 'asc')
				->select(
					'id',
					'category',
				)
				->get();
			return response()->json($categories, 200);
		}
	}

	public function ajaxGetSubcategory(Request $request)
	{
		if (request()->ajax()) {
			$subcategories = Subcategory::where('category_id', $request['category_id'])
				->orderBy('subcategory', 'asc')
				->select(
					'id',
					'subcategory',
				)
				->get();
			return response()->json($subcategories, 200);
		}
	}

	public function ajaxGetUnit(Request $request)
	{
		if (request()->ajax()) {
		$units = Unit::where('unit', 'like', '%' . $request['query'] .  '%')
			->orWhere('abbrevation', 'like', '%' . $request['query'] .  '%')
			->select(
				'id',
				'unit',
				'abbrevation'
			)
			->orderBy('unit', 'asc')
			->get();
		return response()->json($units, 200);
		}
	}

	public function ajaxGetSize(Request $request)
	{
		if (request()->ajax()) {
			$search = $request['query'];
			$sizes = Size::where('size', 'like', '%' . $search . '%')
				->get();
			return response()->json($sizes, 200);
		}
	}

	public function ajaxGetColor(Request $request)
	{
		if (request()->ajax()) {
			$search = $request['query'];
			$colors = Color::where('color', 'like', '%' . $search . '%')
				->get();
			return response()->json($colors, 200);
		}
	}

	public function ajaxStoreData(Request $request)
	{
		if (request()->ajax()) {
			return response()->json($request->all(), 200);
		}
	}
}
