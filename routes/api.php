<?php

use App\Http\Controllers\API\Admin\AuthContoller;
use App\Http\Controllers\API\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'auth:api'], function () {
	Route::get('/user', [UserController::class, 'getUser']);

	Route::post('/logout', [AuthContoller::class, 'logout']);
});

Route::post('/login', [AuthContoller::class, 'login']);
