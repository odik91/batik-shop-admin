<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
	public function index()
	{
		$title = 'Dashboard';
		$username = auth()->guard('admin')->name;
		// dd(auth()->guard('admin')->name);
		return view('admin.pages.home', compact('title', 'username'));
	}
}
