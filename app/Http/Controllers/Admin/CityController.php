<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CityController extends Controller
{
  public function index()
  {
    $title = 'Kabupaten - Kota';
    $parent = 'pengaturan';
    return view('admin.pages.city.index', compact('title', 'parent'));
  }

  public function dataTableCity()
  {
    $cities = City::join('provinces', 'cities.province_id', 'provinces.id')
      ->select(
        'cities.id',
        'cities.city',
        'cities.province_id',
        'provinces.province',
      )
      ->orderBy('cities.province_id', 'asc')
      ->get();

    return DataTables::of($cities)->addIndexColumn()->make(true);
  }

  public function ajaxAddCity(Request $request)
  {
  }

  public function ajaxUpdateCity(Request $request)
  {
  }

  public function ajaxDeleteCity(Request $request)
  {
  }
}
