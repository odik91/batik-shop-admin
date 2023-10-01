<?php

use App\Http\Controllers\Admin\MainController;
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
    Route::get('/', function() {
      return redirect()->route('admin.home');
    });
    Route::get('/home', [MainController::class, 'index'])->name('home');
  });
});
