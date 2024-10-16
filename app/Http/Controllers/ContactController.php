<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
	public function index() {
		$title = 'Kontak Kami';
		return view('public.contact', compact('title'));
	}
}
