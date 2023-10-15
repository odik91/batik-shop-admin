<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	{
		$title = 'Home';
		$new_products = Product::orderBy('created_at', 'desc')
			->limit(8)
			->get();
		return view('public.home', compact('title', 'new_products'));
	}
}
