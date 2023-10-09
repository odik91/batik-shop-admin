<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProvinceContrller;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\UnitController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\RoutePath;

Route::prefix('admin')->name('admin.')->group(function () {
  Route::view('/login', 'admin.auth.login')->middleware('guest:admin')->name('login');
  // route login based on fortify
  $limiter = config('fortify.limiters.login');

  Route::post(RoutePath::for('login', '/login'), [AuthenticatedSessionController::class, 'store'])
    ->middleware(array_filter([
      'guest:admin', // Guard 'admin' untuk penggunaan Fortify
      $limiter ? 'throttle:' . $limiter : null,
    ]))->name('login');


  Route::middleware(['auth:admin'])->group(function () {
    Route::post(RoutePath::for('logout', '/logout'), [AuthenticatedSessionController::class, 'destroy'])
      ->name('logout');
    Route::get('/', function () {
      return redirect()->route('admin.home');
    });
    Route::get('/home', [MainController::class, 'index'])->name('home');

    # route kategori
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/datatable-category', [CategoryController::class, 'dataTableCategory'])->name('datatable-category');
    Route::post('/ajax-add-category', [CategoryController::class, 'ajaxAddCategory'])->name('ajax-add-category');
    Route::match(['PUT', 'PATCH'], '/ajax-update-category', [CategoryController::class, 'ajaxUpdateCategory'])->name('ajax-update-category');
    Route::delete('/ajax-delete-category', [CategoryController::class, 'ajaxDeleteCategory'])->name('ajax-delete-category');

    # route subcategory
    Route::get('/subcategory', [SubcategoryController::class, 'index'])->name('subcategory');
    Route::get('/subcategory-datatable', [SubcategoryController::class, 'dataTableSubcategory'])->name('subacategory-datatable');
    Route::get('/subcategory-ajax-get-categories', [SubcategoryController::class, 'ajaxGetCategory'])->name('ajax-get-categories');
    Route::post('/subcategory-ajax-store-subcategories', [SubcategoryController::class, 'ajaxStoreSubcategory'])->name('ajax-store-subcategories');
    Route::match(['PUT', 'PATCH'], '/subcategory-ajax-update-subcategories', [SubcategoryController::class, 'ajaxUpdateSubcategory'])->name('ajax-update-subcategories');
    Route::delete('/subcategory-ajax-delete', [SubcategoryController::class, 'ajaxDeleteSubcategory'])->name('subcategory-ajax-delete');

    # route color
    Route::get('/color', [ColorController::class, 'index'])->name('color');
    Route::get('/color-datatable', [ColorController::class, 'dataTableColor'])->name('color-datatable');

    # route size
    Route::get('/size', [SizeController::class, 'index'])->name('size');
    Route::get('/size-datatable', [SizeController::class, 'sizeDataTable'])->name('size-datatable');
    Route::match(['PUT', 'PATCH'], '/size-update', [SizeController::class, 'ajaxUpdateSize'])->name('size-update');
    Route::delete('/size-delete', [SizeController::class, 'ajaxDeleteSize'])->name('size-delete');

    # route units
    Route::get('/unit', [UnitController::class, 'index'])->name('unit');
    Route::get('/unit-datatable', [UnitController::class, 'dataTableUnit'])->name('unit-datatable');

    # route province
    Route::get('/province', [ProvinceContrller::class, 'index'])->name('province');
    Route::get('/province-datatable', [ProvinceContrller::class, 'dataTable'])->name('province-datatable');
    Route::post('/province-add', [ProvinceContrller::class, 'ajaxAddProvince'])->name('province-add');
    Route::match(['PUT', 'PATCH'], '/province-update', [ProvinceContrller::class, 'ajaxUpdateProvince'])->name('province-update');
    Route::delete('/province-delete', [ProvinceContrller::class, 'ajaxDeleteProvince'])->name('province-delete');

    # route city
    Route::get('/city', [CityController::class, 'index'])->name('city');
    Route::get('/city-datatable', [CityController::class, 'dataTableCity'])->name('city-datatable');
    Route::post('/city-add', [CityController::class, 'ajaxAddCity'])->name('city-add');
    Route::match(['PUT', 'PATCH'], '/city-update', [CityController::class, 'ajaxUpdateCity'])->name('city-update');
    Route::delete('/city-delete', [CityController::class, 'ajaxDeleteCity'])->name('city-delete');

    # route product
    Route::get('product', [ProductController::class, 'index'])->name('product');
  });
});
