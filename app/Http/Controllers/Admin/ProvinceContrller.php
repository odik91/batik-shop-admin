<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProvinceContrller extends Controller
{
	public function index()
	{
		$title = 'Provinsi';
		$parent = 'pengaturan';
		return view('admin.pages.province.index', compact('title', 'parent'));
	}

	public function dataTable()
	{
		if (request()->ajax()) {
			$provinces = Province::orderBy('id', 'asc')->get();
			return DataTables::of($provinces)->addIndexColumn()->make(true);
		}
	}

	public function ajaxAddProvince(Request $request)
	{
	}

	public function ajaxUpdateProvince(Request $request)
	{
	}

	public function ajaxDeleteProvince(Request $request)
	{
	}
}
