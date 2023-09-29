<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicUserController extends Controller
{
	public function profile()
	{
		$title = 'Profile';
		return view('public.profile', compact('title'));
	}
}
