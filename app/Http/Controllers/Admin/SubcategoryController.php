<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SubcategoryController extends Controller
{
  public function index()
  {
    $title = 'Subkategory';
    return view('admin.pages.subcategory.index', compact('title'));
  }

  public function dataTableSubcategory()
  {
    if (request()->ajax()) {
      $subcategories = Subcategory::join('categories', 'subcategories.category_id', 'categories.id')
        ->select(
          'subcategories.id',
          'subcategories.subcategory',
          'categories.category'
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

      try {
        $subcategory = new Subcategory([
          'category_id' => $request['category'],
          'subcategory' => $request['subcategory'],
        ]);
        $subcategory->save();
        return response()->json([
          'message' => 'Subkategori ' . $subcategory['subcategory'] . ' berhasil ditambahkan'
        ], 201);
      } catch (Exception $e) {
        return response()->json([
          'message' => 'Subkategori gagal ditambahkan'
        ], 422);
      }
    }
  }

  public function ajaxUpdateSubcategory(Request $request)
  {
    if (request()->ajax()) {
      $this->validate($request, []);
    }
  }
}
