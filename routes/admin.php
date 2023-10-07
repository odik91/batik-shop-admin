<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\SubcategoryController;
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
  });
});
