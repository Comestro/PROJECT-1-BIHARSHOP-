<?php

use App\Http\Controllers\CouponController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributeValueController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\Auth\SocialiteController;
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
Route::get('/checkout', [PublicController::class, "checkout"])->name("checkout");
Route::get('/confirm-order', [PublicController::class, "confirmOrder"])->name("confirm.order");
Route::get('/our-team',[PublicController::class,"ourTeam"])->name("public.team");
Route::get('/privacy-policy',[PublicController::class,"privacyPolicy"])->name("public.privacy");
Route::get('/refund-policy',[PublicController::class,"refundPolicy"])->name("public.refund");
Route::post('/save-online-payment', [PaymentController::class, 'saveOnlinePayment'])->name('save.online.payment');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('public.show');
// Route::get('/category/{cat_slug}',[PublicController::class,"filter"])->name("filter");

Route::get('/category/{cat_slug}/{cat_id}',[PublicController::class,"filter"])->name("filter");

Route::match(['get',"post"],'/public-login',[PublicController::class,"login"])->name("login");
Route::match(['get',"post"],'/public-signup',[PublicController::class,"signup"])->name("signup");
Route::post('/public-register',[PublicController::class,"register"])->name("register");
Route::post('/logout',[PublicController::class,"logout"])->name("logout");

// Route::view('/admin', 'admin.dashboard');
// require __DIR__ . '/auth.php';

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
    Route::get('/users', [UserController::class,"manageUser"])->name('users.index');
    Route::get('/orders', [OrderController::class,"manageOrder"])->name('orders.index');
    Route::get('/orders/{orderId}', [OrderController::class, 'viewOrder'])->name('order.view');
    Route::get('/users/wishlist/{userId}', [UserController::class, 'viewUserWishlist'])->name('user.wishlist.view');
    Route::get('/users/order/{userId}', [UserController::class, 'viewUserOrder'])->name('user.order.view');
    Route::get('/users/address/{userId}', [UserController::class, 'viewUserAddress'])->name('user.address.view');

});


Route::get('product/{category}/{slug}', [PublicController::class,'productView'])->name('product.view');


// login with google-works here:
Route::get('auth/google', [SocialiteController ::class, 'redirectToGoogle'])->name('google.login');

Route::get('auth/google/callback', [SocialiteController::class, 'handleGoogleCallback'])->name('google.callback');


