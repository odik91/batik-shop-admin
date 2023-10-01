<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicUserController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
	// return view('welcome');
	return redirect()->route('public.home');
});

// route public pages
# route public home page
Route::get('/home', [HomeController::class, 'index'])->name('public.home');

# route shop
Route::get('/shop', [ShopController::class, 'index'])->name('public.shop');
Route::get('/product-detail/{id}', [ShopController::class, 'productDetail'])->name('public.product-detail');
Route::get('/keranjang-belanja', [ShopController::class, 'shoppingCart'])->name('public.keranjang-belanja');
Route::get('/checkout', [ShopController::class, 'checkout'])->name('public.checkout');
Route::get('/wishlists', [ShopController::class, 'wishlists'])->name('public.wishlists');

# route contact
Route::get('/contact-us', [ContactController::class, 'index'])->name('public.contact-us');

# route profile
Route::get('/profile', [PublicUserController::class, 'profile'])->name('public.profile');

# route admin
Route::get('/admin/login', function () {
	return view('admin.auth.login');
});
Route::get('/admin/home', function () {
	return view('admin.pages.home');
});