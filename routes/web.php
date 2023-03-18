<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ShopController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckOutController;
use App\Http\Controllers\Front\AccountController;
use App\Http\Controllers\Admin\UserController;
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

//Front (Client)
Route::get('/', [HomeController::class, 'index']);

Route::prefix('shop')->group(function () {
    Route::get('product/{id}', [ShopController::class, 'show']);
    Route::post('product/{id}', [ShopController::class, 'postComment']);
    Route::get('/', [ShopController::class, 'index']);
    Route::get('category/{categoryName}', [ShopController::class, 'category']);
});

Route::prefix('cart')->group(function () {
    Route::get('add', [CartController::class, 'add']);
    Route::get('/', [CartController::class, 'index']);
    Route::get('delete', [CartController::class, 'delete']);
    Route::get('destroy', [CartController::class, 'destroy']);
    Route::get('update', [CartController::class, 'update']);
});

Route::get('about',[HomeController::class, 'about']);

Route::prefix('checkout')->middleware('CheckMemberLogin')->group(function () {
    Route::get('', [CheckOutController::class, 'index']);
    Route::get('result', [CheckOutController::class, 'result']);
    Route::post('/', [CheckOutController::class, 'addOrder']);
    Route::get('vnPayCheck', [CheckOutController::class, 'vnPayCheck']);
});

Route::prefix('account')->group(function () {
    Route::get('login', [AccountController::class, 'login']);
    Route::post('login', [AccountController::class, 'checkLogin']);
    Route::get('logout', [AccountController::class, 'logout']);
    Route::get('register', [AccountController::class, 'register']);
    Route::post('register', [AccountController::class, 'postRegister']);
    Route::prefix('my-order')->middleware('CheckMemberLogin')->group(function () {
        Route::get('/', [AccountController::class, 'myOrderIndex']);
        Route::get('{id}', [AccountController::class, 'myOrderShow']);
    });
});

//Dashboard Admin
Route::prefix('admin')->group(function () {
    Route::resource('user', UserController::class);
});


