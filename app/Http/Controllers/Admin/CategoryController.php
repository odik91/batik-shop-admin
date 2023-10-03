<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
	public function index()
	{
		$title = 'Kategori';
		return view('admin.pages.category.index', compact('title'));
	}

	public function dataTableCategory()
	{
		if (request()->ajax()) {
			$categories = Category::orderBy('category', 'asc')->get();
			return DataTables::of($categories)
				->addIndexColumn()
				->make(true);
		}
	}

	public function ajaxAddCategory(Request $request)
	{
	}

	public function ajaxUpdateCategory(Request $request)
	{
	}

	public function ajaxDeleteCategory(Request $request)
	{
		if (request()->ajax()) {
			$category = Category::find($request['id']);
			$name = $category->category;
			$category->delete();
			return response()->json([
				'message' => 'Kategori ' . $name . ' berhasil dihapus',
			], 200);
		}
	}
}
