<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
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
		if (request()->ajax()) {
			$this->validate(
				$request,
				[
					'category' => 'required|string|unique:categories,category'
				],
				[
					'category.unique' => 'Kategori telah digunakan'
				]
			);

			try {
				$category = new Category(['category' => $request['category']]);
				$category->save();

				return response()->json([
					'message' => 'Kategori ' . $request['category'] . ' berhasil ditambahkan'
				], 201);
			} catch (Exception $e) {
				return response()->json([
					'message' => 'Gagal menambahkan kategori'
				], 422);
			}
		}
	}  

	public function ajaxUpdateCategory(Request $request)
	{
	}

	public function ajaxDeleteCategory(Request $request)
	{
		if (request()->ajax()) {
			$category = Category::find($request['id']);
			$name = $category->category;
			$category->forceDelete();
			return response()->json([
				'message' => 'Kategori ' . $name . ' berhasil dihapus',
			], 200);
		}
	}
}