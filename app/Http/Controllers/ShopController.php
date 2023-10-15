<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
}
