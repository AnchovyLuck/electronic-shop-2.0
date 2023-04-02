<?php


use App\Http\Controllers\Front\ShopController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckOutController;
use App\Http\Controllers\Front\AccountController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Auth\PasswordResetController;
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

Route::prefix('checkout')->group(function () {
    Route::get('/', [CheckOutController::class, 'index'])->middleware('CheckMemberLogin');
    Route::get('result', [CheckOutController::class, 'result']);
    Route::post('/', [CheckOutController::class, 'addOrder'])->middleware('CheckMemberLogin');
    Route::get('vnPayCheck', [CheckOutController::class, 'vnPayCheck']);
});

Route::prefix('account')->group(function () {
    Route::get('login', [AccountController::class, 'login'])->middleware('CheckHasLogin');
    Route::post('login', [AccountController::class, 'checkLogin']);
    Route::get('logout', [AccountController::class, 'logout']);
    Route::get('register', [AccountController::class, 'register'])->middleware('CheckHasLogin');
    Route::post('register', [AccountController::class, 'postRegister']);
    Route::get('forgot-password', [PasswordResetController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('forgot-password', [PasswordResetController::class, 'submitForgotPasswordForm'])->name('password.email');
    Route::get('reset-password/{token}', [PasswordResetController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('reset-password', [PasswordResetController::class, 'submitResetPasswordForm'])->name('password.update');
    Route::prefix('my-order')->middleware('CheckMemberLogin')->group(function () {
        Route::get('/', [AccountController::class, 'myOrderIndex']);
        Route::get('{id}', [AccountController::class, 'myOrderShow']);
    });
    Route::get('{id}',[AccountController::class, 'myAccount'])->middleware('CheckMemberLogin');
    Route::post('my-account',[AccountController::class, 'updateAccount'])->middleware('CheckMemberLogin');
    
});

//Dashboard Admin
Route::prefix('admin')->middleware('CheckAdminLogin')->group(function () {
    Route::redirect('', 'admin/user');
    Route::resource('user', UserController::class);
    Route::prefix('login')->withoutMiddleware('CheckAdminLogin')->group(function () {
        Route::get('/',[App\Http\Controllers\Admin\HomeController::class, 'getLogin']);
        Route::post('/',[App\Http\Controllers\Admin\HomeController::class, 'postLogin']);
    });
    Route::get('logout',[App\Http\Controllers\Admin\HomeController::class, 'logout']);
    Route::resource('category', ProductCategoryController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('product', ProductController::class);
    Route::resource('product/{id}/image', ProductImageController::class);
    Route::resource('product/{id}/detail', ProductDetailController::class);
    Route::resource('order', OrderController::class);
});

Route::get('test',[HomeController::class, 'test']);
