<?php

use App\Http\Controllers\CouponController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributeValueController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductVariationController;
use App\Http\Controllers\MembershipPaymentController;
use App\Livewire\Admin\EditCoupon;
use Illuminate\Support\Facades\Artisan;
use Livewire\Livewire;


Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/bihar-shop/public/livewire/update', $handle);
});

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
Route::get('/gallery',[PublicController::class,"gallery"])->name("public.gallery");
Route::get('/privacy-policy',[PublicController::class,"privacyPolicy"])->name("public.privacy");
Route::get('/terms-conditions',[PublicController::class,"termsConditions"])->name("public.terms");
Route::get('/about-us',[PublicController::class,"AboutUs"])->name("public.about");
Route::get('/refund-policy',[PublicController::class,"refundPolicy"])->name("public.refund");
Route::post('/save-online-payment', [PaymentController::class, 'saveOnlinePayment'])->name('save.online.payment');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('public.show');
Route::post('/save-membership-payment', [MembershipPaymentController::class, 'saveMembershipPayment'])->name('save.membership.payment');

// Route::get('/category/{cat_slug}',[PublicController::class,"filter"])->name("filter");

Route::get('/category/{cat_slug}/{cat_id}',[PublicController::class,"filter"])->name("filter");

Route::match(['get',"post"],'/public-login',[PublicController::class,"login"])->name("login");
Route::match(['get',"post"],'/public-signup',[PublicController::class,"signup"])->name("signup");
Route::match(['get',"post"],'/membership-signup',[PublicController::class,"membershipSignup"])->name("membership.signup");
Route::post('/public-register',[PublicController::class,"register"])->name("register");
Route::post('/membership-register',[PublicController::class,"membershipRegister"])->name("membership.register");
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
        Route::get('/membership', 'membership')->name('user.membership');
        Route::get('/membership-payment/{token}', 'membershipPayment')->name('user.membership.payment');
        Route::get('/gift-card', 'GiftCard')->name('user.gift-card');
        Route::get('/payment', 'payment')->name('user.payment');
        Route::get('/membership', 'membership')->name('user.membership');
    });
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::resource('category', CategoryController::class);
        Route::resource('product', ProductController::class);
        Route::resource('address', AddressController::class);
        Route::resource('coupon', CouponController::class);
        Route::resource('gallery', GalleryController::class);
        Route::get('/users', [UserController::class,"manageUser"])->name('users.index');
        Route::get('/membership', [UserController::class,"manageMembership"])->name('membership.index');
        Route::get('/orders', [OrderController::class,"manageOrder"])->name('orders.index');
        Route::get('/orders/{orderId}', [OrderController::class, 'viewOrder'])->name('order.view');
        Route::get('/users/wishlist/{userId}', [UserController::class, 'viewUserWishlist'])->name('user.wishlist.view');
        Route::get('/users/order/{userId}', [UserController::class, 'viewUserOrder'])->name('user.order.view');
        Route::get('/users/address/{userId}', [UserController::class, 'viewUserAddress'])->name('user.address.view');
        Route::get('/edit-coupon/{id}', EditCoupon::class)->name('admin.edit-coupon');
    });
});

Route::post('/coupon/toggle-status/{id}', [CouponController::class, 'toggleStatus'])->name('coupon.toggleStatus');
Route::get('product/{category}/{slug}', [PublicController::class,'productView'])->name('product.view');


// login with google-works here:
Route::get('auth/google', [SocialiteController ::class, 'redirectToGoogle'])->name('google.login');

Route::get('auth/google/callback', [SocialiteController::class, 'handleGoogleCallback'])->name('google.callback');




Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage link has been created!';
});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('optimize:clear');
    return "All Caches are cleared by @Roni";
});


Route::get('confirm-order',[MailController::class,'index']);



