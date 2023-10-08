<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SizeController extends Controller
{
	public function index()
	{
		$title = 'Ukuran';
		return view('admin.pages.size.index', compact('title'));
	}

	public function sizeDataTable()
	{
		// if (request()->ajax()) {
			$sizes = Size::orderBy('id', 'asc')->get();
			return DataTables::of($sizes)->addIndexColumn()->make(true);
		// }
	}

	public function ajaxUpdateSize(Request $request) {}

	public function ajaxDeleteSize(Request $request) {}
}
