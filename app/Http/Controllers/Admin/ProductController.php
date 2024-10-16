<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\Subcategory;
use App\Models\Unit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

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
			$this->validate(
				$request,
				[
					'product-name' => 'required|unique:products,product',
					'category' => 'required',
					'subcategory' => 'required',
					'unit' => 'required',
					'images' => 'required',
					'description' => 'required',
					'price' => 'required',
					'weight' => 'required',
				],
				[
					'product-name.required' => 'Mohon isi nama produk',
					'product-name.unique' => 'Nama produk telah digunakan',
					'category.required' => 'Mohon pilih kategori',
					'subcategory.required' => 'Mohon pilih subkategori',
					'unit.required' => 'Mohon isi satuan',
					'images.required' => 'Mohon isi gambar',
					'description.required' => 'Mohon isi deskripsi',
					'price.required' => 'Mohon isi harga',
					'weight.required' => 'Mohon isi perkiraan berat',
				]
			);

			DB::beginTransaction();
			try {
				$price = round((float) str_replace(',', '.', str_replace('.', '', $request['price'])), 2);
				$weight = round((float) str_replace(',', '.', str_replace('.', '', $request['weight'])), 2);
				$discount = 0;

				if ($request['discount']) {
					$discount = round((float) str_replace(',', '.', str_replace('.', '', $request['discount'])), 2);
				}

				# insert main data product
				$product = new Product([
					'category_id' => $request['category'],
					'subcategory_id' => $request['subcategory'],
					'unit_id' => $request['unit'],
					'product' => ucwords($request['product-name']),
					'slug' => Str::slug($request['product-name']),
					'description' => $request['description'],
					'price' => $price,
					'discount' => $discount,
					'weight_estimation' => $weight,
					'active' => $request['aktif'],
				]);
				$product->save();

				# insert ukuran
				if ($request['size']) {
					foreach ($request['size'] as $size) {
						$size = new ProductSize([
							'product_id' => $product['id'],
							'size_id' => $size,
						]);
						$size->save();
					}
				}

				# insert warna
				if ($request['color']) {
					foreach ($request['color'] as $color) {
						$productColor = new ProductColor([
							'product_id' => $product['id'],
							'color_id' => $color,
						]);
						$productColor->save();
					}
				}

				# upload imgae and save image name into database
				$arrayImage = [];
				$images = $request->file('images');
				foreach ($images as $key => $image) {
					$file = $product['slug'] . '-' . $key . '.' . $image->getClientOriginalExtension();
					$pathImage = public_path('upload/images');
					$resizeImage = Image::make($image->path());
					$resizeImage->resize(1024, 1024, function ($const) {
						$const->aspectRatio();
					})->save($pathImage . '/' . $file);

					array_push($arrayImage, $file);
				}

				foreach ($arrayImage as $image) {
					$productGallery = new ProductGallery([
						'product_id' => $product['id'],
						'file' => $image,
					]);
					$productGallery->save();
				}

				DB::commit();

				return response()->json([
					'message' => $product['product'] . ' berhasil ditambahkan',
				], 201);
			} catch (Exception $e) {
				return response()->json([
					'messgae' => 'Produk gagal ditambahkan',
					'error_log' => $e
				]);
			}
		}
	}

	public function dataTableProduct()
	{
		if (request()->ajax()) {
			$products = Product::join('categories', 'products.category_id', 'categories.id')
				->join('subcategories', 'products.subcategory_id', 'subcategories.id')
				->join('units', 'products.unit_id', 'units.id')
				// ->leftJoin('product_sizes', 'products.id', 'product_sizes.product_id')
				// ->leftJoin('product_colors', 'products.id', 'product_colors.product_id')
				// ->leftJoin('colors', 'product_colors.color_id', 'colors.id')
				->select(
					'products.id',
					'products.product',
					'categories.category',
					'subcategories.subcategory',
					'products.description',
					'products.price',
					'products.discount',
					'products.weight_estimation',
					// 'colors.color',
				)
				->orderBy('products.product', 'asc')
				->get();

			foreach ($products as $key => $product) {
				$galleries = ProductGallery::where('product_id', $product['id'])->get();
				$images = [];
				foreach ($galleries as $gallery) {
					array_push($images, $gallery['file']);
				}
				$products[$key]->files = $images;
			}

			return DataTables::of($products)
				->addIndexColumn()
				->make(true);
		}
	}

	public function ajaxGetDetailProduct($id)
	{
		// if (request()->ajax()) {
		$product = Product::join('categories', 'products.category_id', 'categories.id')
			->join('subcategories', 'products.subcategory_id', 'subcategories.id')
			->join('units', 'products.unit_id', 'units.id')
			->select(
				'products.id',
				'products.product',
				'categories.category',
				'categories.id as category_id',
				'subcategories.subcategory',
				'subcategories.id as subcategory_id',
				'units.unit',
				'units.id as unit_id',
				'products.description',
				'products.price',
				'products.discount',
				'products.weight_estimation',
			)
			->where('products.id', $id)
			->first();

		$sizes = ProductSize::join('sizes', 'product_sizes.size_id', 'sizes.id')
			->where('product_sizes.product_id', $id)
			->get();
		$listSizes = [];
		foreach($sizes as $size) {
			array_push($listSizes, [
				'size_id' => $size['id'],
				'size' => $size['size']
			]);
		}
		$product->sizes = $listSizes;

		$getColors = '';

		$galleries = ProductGallery::where('product_id', $id)->get();
		$images = [];
		foreach ($galleries as $gallery) {
			array_push($images, $gallery['file']);
		}
		$product->files = $images;

		return response()->json($product, 200);
		// }
	}
}
