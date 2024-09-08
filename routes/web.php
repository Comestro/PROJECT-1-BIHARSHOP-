<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductVariationController;


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::get('/',[PublicController::class,"index"])->name("index");

// Route::view('/admin', 'admin.dashboard');
require __DIR__.'/auth.php';

Route::get('/user', [UserController::class, 'index'])->name('user.index');


Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/add-product', [AdminController::class, 'insertProduct']);
Route::get('/admin/manage-product', [AdminController::class, 'manageProduct']);

Route::prefix('admin')->group(function () {
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('coupon', CouponController::class);
    Route::resource('product-variations', ProductVariationController::class);
});

