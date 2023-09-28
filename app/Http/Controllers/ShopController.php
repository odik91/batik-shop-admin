<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
  public function index() {
    $title = 'Toko';
    return view('public.shop', compact('title'));
  }
}
