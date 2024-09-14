<?php

use App\Http\Controllers\CouponController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductVariationController;
use App\Livewire\Admin\EditCoupon;





Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::get('/', [PublicController::class, "index"])->name("index");
Route::get('/view', [PublicController::class, "view"])->name("view");
Route::get('/cart', [PublicController::class, "cart"])->name("cart");
// Route::get('/filter',[PublicController::class,"filter"])->name("filter");
Route::get('/our-team',[PublicController::class,"ourTeam"])->name("public.team");
Route::get('/privacy-policy',[PublicController::class,"privacyPolicy"])->name("public.privacy");
Route::get('/refund-policy',[PublicController::class,"refundPolicy"])->name("public.refund");

Route::get('/category/{cat_slug}',[PublicController::class,"filter"])->name("filter");
Route::get('/public-login',[PublicController::class,"login"])->name("public.login");
Route::get('/public-signup',[PublicController::class,"signup"])->name("public.signup");
Route::post('/public-register',[PublicController::class,"register"])->name("public.register");

// Route::view('/admin', 'admin.dashboard');
require __DIR__ . '/auth.php';

// user route's grouping here:
Route::prefix("user")->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get("/", "index")->name('user.index');
        Route::get("/wishlist", "wishlist")->name('user.wishlist');
        Route::get('/my-order',  'MyOrder')->name('user.my-order');
        Route::get('/my-coupon', 'MyCoupon')->name('user.my-coupon');
        Route::get('/address', 'MyAddress')->name('user.address');
        Route::get('/gift-card', 'GiftCard')->name('user.gift-card');
        Route::get('/payment', 'payment')->name('user.payment');
    });
});



Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
// Route::get('/admin/add-product', [AdminController::class, 'insertProduct']);
// Route::get('/admin/manage-product', [AdminController::class, 'manageProduct']);
Route::post('/coupon/toggle-status/{id}', [CouponController::class, 'toggleStatus'])->name('coupon.toggleStatus');
Route::get('admin/edit-coupon/{id}', EditCoupon::class)->name('admin.edit-coupon');

Route::prefix('admin')->group(function () {
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('address', AddressController::class);
    Route::resource('coupon', CouponController::class);
    Route::resource('product-variations', ProductVariationController::class);
});

Route::get('product/{category}/{slug}', [PublicController::class,'productView'])->name('product.view');


