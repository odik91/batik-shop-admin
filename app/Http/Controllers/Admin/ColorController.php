<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ColorController extends Controller
{
	public function index() {
		$title = 'Wrana';
		return view('admin.pages.color.index', compact('title'));
	}
}
