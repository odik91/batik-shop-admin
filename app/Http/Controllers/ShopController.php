<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\Province;
use Illuminate\Http\Request;

class ShopController extends Controller
{
  public function index()
  {
    $title = 'Toko';
    $products = Product::paginate(9);
    return view('public.shop', compact('title', 'products'));
  }

  public function productDetail($slug)
  {
    $title = 'Detail Produk';
    $product = Product::where('slug', $slug)->first();
    return view('public.product-detail', compact('title', 'product'));
  }

  public function shoppingCart()
  {
    $title = 'Keranjang Belanja';
    return view('public.cart', compact('title'));
  }

  public function checkout()
  {
    $title = 'Checkout';
    return view('public.checkout', compact('title'));
  }

  public function wishlists()
  {
    $title = 'Daftar Keinginan';
    return view('public.wishlists', compact('title'));
  }

  public function detailProductInCart(Request $request)
  {
    if (request()->ajax()) {
      $params = json_decode($request['localData']);

      $data = [];
      foreach ($params as $param) {
        $product = Product::leftJoin('product_sizes', 'products.id', 'product_sizes.product_id')
          ->leftJoin('sizes', 'product_sizes.size_id', 'sizes.id')
          ->leftJoin('product_colors', 'products.id', 'product_colors.product_id')
          ->leftJoin('colors', 'product_colors.color_id', 'colors.id')
          ->where('products.id', $param->id)
          ->where('product_sizes.size_id', $param->size)
          ->where('product_colors.color_id', $param->color)
          ->select(
            'products.id',
            'products.product',
            'sizes.id as size_id',
            'sizes.size',
            'colors.id as color_id',
            'colors.color',
            'products.price',
            'products.weight_estimation',
          )
          ->first();

        $getImage = ProductGallery::where('product_id', $product['id'])->first();
        $product->image = $getImage['file'];
        $product->quantity = $param->quantity;
        $product->total = (int) $param->quantity * (float) $product->price;

        array_push($data, $product);
      }
      return response()->json($data, 200);
    }
  }

  public function ajaxFetchProvinceFromRajaOngkir()
  {
    if (request()->ajax()) {
      $provinces = Province::orderBy('province', 'asc')
        ->select('id', 'province')
        ->get();

      return response()->json($provinces, 200);
    }
  }

  public function ajaxFetchCityFromRajaOngkir(Request $request)
  {
    if (request()->ajax()) {
      $cities = City::where('province_id', $request['id'])
        ->select(
          'id',
          'type',
          'city'
        )
        ->get();

      return response()->json($cities, 200);
    }
  }

  public function ajaxFetchBiayaOngkir(Request $request)
  {
    if (request()->ajax()) {
      $curl = curl_init();
      $key = env('RAJA_ONGKIR');
      $origin = env('DEFAULT_CITY');
      // $provinsi = $request['provinsi'];
      $kota = $request['kota'];
      $kurir = $request['kurir'];
      $berat = $request['berat'];

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

      curl_close($curl);

      if ($err) {
        return response()->json([
          'message' => "cURL Error #:" . $err
        ], 422);
      } else {
        return response()->json($data, 200);
      }
    }
  }

  public function addToCart(Request $request) {
    if (request()->ajax()) {
      return response()->json($request->all(), 200);
    }
  }
}
