<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
  public function index()
  {
    $title = 'Subkategori';
    return view('admin.pages.subcategory.index', compact('title'));
  }

  public function dataTableSubcategory()
  {
    if (request()->ajax()) {
      $subcategories = Subcategory::join('categories', 'subcategories.category_id', 'categories.id')
        ->select(
          'subcategories.id',
          'subcategories.subcategory',
          'categories.category',
          'categories.id as category_id'
        )
        ->get();

      return DataTables::of($subcategories)
        ->addIndexColumn()
        ->make(true);
    }
  }

  public function ajaxGetCategory(Request $request)
  {
    if (request()->ajax()) {
      $search = $request['query'];
      $category = Category::where('category', 'like', '%' . $search . '%')
        ->orderBy('category', 'asc')
        ->get();
      return response()->json($category, 200);
    }
  }

  public function ajaxStoreSubcategory(Request $request)
  {
    if (request()->ajax()) {
      $this->validate($request, [
        'category' => 'required',
        'subcategory' => 'required|string|unique:subcategories,category_id,subcategory'
      ]);

      // return response()->json($request->all(), 422);

      try {
        $subcategory = new Subcategory([
          'category_id' => $request['category'],
          'subcategory' => ucwords($request['subcategory']),
          'slug' => Str::slug($request['subcategory']),
        ]);
        $subcategory->save();

        return response()->json([
          'message' => 'Subkategori ' . $subcategory['subcategory'] . ' berhasil ditambahkan'
        ], 201);
      } catch (Exception $e) {
        return response()->json([
          'message' => 'Subkategori gagal ditambahkan',
        ], 422);
      }
    }
  }

  public function ajaxUpdateSubcategory(Request $request)
  {
    if (request()->ajax()) {
      $this->validate($request, [
        'category' => 'required',
        'subcategory' => 'required|string'
      ]);

      $checkDuplicate = Subcategory::where('category_id', $request['category'])
        ->where('subcategory', ucwords($request['subcategory']))
        ->where('id', '!=', $request['id'])
        ->get();

      if (sizeof($checkDuplicate) > 0) {
        return response()->json([
          'message' => 'Subkategori telah digunakan'
        ], 422);
      }

      try {
        $subcategory = Subcategory::find($request['id']);
        $subcategory->category_id = $request['category'];
        $subcategory->subcategory = ucwords($request['subcategory']);
        $subcategory->slug = Str::slug($request['subcategory']);
        $subcategory->save();

        return response()->json([
          'message' => $subcategory->subcategory . ' berhasil diperbarui'
        ], 200);
      } catch (Exception $e) {
        return response()->json([
          'message' => 'Subkategori gagal diperbarui',
          'error_log' => $e
        ], 422);
      }
    }
  }

  public function ajaxDeleteSubcategory(Request $request)
  {
    if (request()->ajax()) {
      $subcategory = Subcategory::find($request['id']);
      $name = $subcategory['subcategory'];
      try {
        $subcategory->forceDelete();
        return response()->json([
          'message' => $name . ' berhasil dihapus',
        ], 200);
      } catch (Exception $e) {
        return response()->json([
          'message' => 'Subkategori gagal dihapus',
          'error_log' => $e
        ], 422);
      }
    }
  }
}
