<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PublicUserController extends Controller
{
	public function profile()
	{
		$title = 'Profile';
		$orders = Order::get();
		return view('public.profile', compact('title', 'orders'));
	}
}
