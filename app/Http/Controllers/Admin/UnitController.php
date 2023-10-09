<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UnitController extends Controller
{
	public function index()
	{
		$title = 'Satuan';
		$parent = 'pengaturan';
		return view('admin.pages.unit.index', compact('title', 'parent'));
	}

	public function dataTableUnit()
	{
		if (request()->ajax()) {
			$units = Unit::orderBy('unit', 'asc')->get();
			return DataTables::of($units)->addIndexColumn()->make(true);
		}
	}
}
