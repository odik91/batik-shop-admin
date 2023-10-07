<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
	public function index()
	{
		$title = 'Kategori';
		$parent = 'pengaturan';
		return view('admin.pages.category.index', compact('title', 'parent'));
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
				$category = new Category([
					'category' => $request['category'],
					'slug' => Str::slug($request['category']),
				]);
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
		if (request()->ajax()) {
			$this->validate(
				$request,
				[
					'category' => 'required|string|unique:categories,category,' . $request['id']
				],
				[
					'category.unique' => 'Kategori telah digunakan'
				]
			);

			try {
				$category = Category::find($request['id']);
				$category->category = $request['category'];
				$category->slug = Str::slug($request['category']);
				$category->save();

				return response()->json([
					'message' => 'Kategori ' . $request['category'] . ' berhasil diubah'
				], 200);
			} catch (Exception $e) {
				return response()->json([
					'message' => 'Kategori gagal di ubah',
					'error_log' => $e
				], 422);
			}
		}
	}

	public function ajaxDeleteCategory(Request $request)
	{
		if (request()->ajax()) {
			$category = Category::find($request['id']);
			$subcategories = $category->getSubCategories;

			if (sizeof($subcategories) > 0) {
				return response()->json([
					'message' => ucwords($category['category']) . ' tidak dapat dihapus.<br> Category sedang digunakan pada subkategori'
				], 422);
			}

			$name = $category->category;
			$category->forceDelete();
			return response()->json([
				'message' => 'Kategori ' . $name . ' berhasil dihapus',
			], 200);
		}
	}
}
