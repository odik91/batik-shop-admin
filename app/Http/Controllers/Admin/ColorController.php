<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ColorController extends Controller
{
	public function index()
	{
		$title = 'Wrana';
		$parent = 'pengaturan';
		return view('admin.pages.color.index', compact('title', 'parent'));
	}

	public function dataTableColor()
	{
		if (request()->ajax()) {
			$colours = Color::orderBy('color', 'asc')->get();
			return DataTables::of($colours)->addIndexColumn()->make(true);
		}
	}
}
