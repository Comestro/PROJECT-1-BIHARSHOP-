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
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductVariationController;
use App\Http\Controllers\MembershipPaymentController;
use App\Livewire\Admin\EditCoupon;
use App\Models\Membership;
use App\Models\MembershipPayment;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
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
Route::get('/our-team', [PublicController::class, "ourTeam"])->name("public.team");
Route::get('/gallery', [PublicController::class, "gallery"])->name("public.gallery");
Route::get('/privacy-policy', [PublicController::class, "privacyPolicy"])->name("public.privacy");
Route::get('/terms-conditions', [PublicController::class, "termsConditions"])->name("public.terms");
Route::get('/about-us', [PublicController::class, "AboutUs"])->name("public.about");
Route::get('/refund-policy', [PublicController::class, "refundPolicy"])->name("public.refund");
Route::post('/save-online-payment', [PaymentController::class, 'saveOnlinePayment'])->name('save.online.payment');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('public.show');
Route::post('/save-membership-payment', [MembershipPaymentController::class, 'saveMembershipPayment'])->name('save.membership.payment');

// Route::get('/category/{cat_slug}',[PublicController::class,"filter"])->name("filter");

// error's for 505 and 404:
Route::fallback([PublicController::class, 'showError404']);
Route::get('/500', [PublicController::class, "showError500"]);
Route::get('/505', [PublicController::class, "showError505"]);


Route::get('/category/{cat_slug}', [PublicController::class, "filter"])->name("filter");
Route::match(['get', "post"], '/public-login', [PublicController::class, "login"])->name("login");
Route::match(['get', "post"], '/public-signup', [PublicController::class, "signup"])->name("signup");
Route::match(['get', "post"], '/membership-signup', [PublicController::class, "membershipSignup"])->name("membership.signup");
Route::post('/public-register', [PublicController::class, "register"])->name("register");
Route::post('/membership-register', [PublicController::class, "membershipRegister"])->name("membership.register");
Route::post('/logout', [PublicController::class, "logout"])->name("logout");

// Route::view('/admin', 'admin.dashboard');
// require __DIR__ . '/auth.php';



Route::get("/generate-user", function () {

    $spreadsheetId = '10Ms39WYABF5H-wqXzzpIfN6p4MtEhDRZKiPaF-tve2k';
    $apiKey = 'AIzaSyBu4vMj33xSBa5LCksfG8IsFJh8-TaCnBI';
    // Get API key from the .env file (better for security)
    $rangeSheet2 = 'Sheet2!A2:C219'; // Specify the range for Sheet2

    $urlSheet2 = "https://sheets.googleapis.com/v4/spreadsheets/$spreadsheetId/values/$rangeSheet2?key=$apiKey";
    $responseSheet2 = Http::get($urlSheet2);

    if ($responseSheet2->failed()) {
        echo "Error fetching data from Sheet2. Status code: " . $responseSheet2->status();
        echo "\nError response body: " . $responseSheet2->body();
    } else {
        $dataSheet2 = $responseSheet2->json();
        $phpArraySheet2 = $dataSheet2['values'];



        // Process the data to format it for insertion
        $userData = [];
        foreach ($phpArraySheet2 as $row) {
            // Assuming Sheet2 data structure matches ['name', 'email', 'password']
            // Adjust the indexes as needed based on the actual structure of your Sheet2
            $userData[] = [
                'name' => $row[0], // Name is in the first column
                'email' => $row[1], // Email is in the second column
                'password' => bcrypt($row[2]), // Assuming password is in the third column, hashed before insertion
            ];
        }

        User::insert($userData);


        echo "PHP Array for Sheet2:\n";
        echo "<pre>";
        print_r($userData);
        echo "</pre>";
    }
});

Route::get('/import-memberships', function () {
    $spreadsheetId = '10Ms39WYABF5H-wqXzzpIfN6p4MtEhDRZKiPaF-tve2k';
    $apiKey = 'AIzaSyBu4vMj33xSBa5LCksfG8IsFJh8-TaCnBI';
    $range = 'Sheet1!C2:AH219'; // Adjust range if needed
    $url = "https://sheets.googleapis.com/v4/spreadsheets/$spreadsheetId/values/$range?key=$apiKey";
    
    $response = Http::get($url);
    if ($response->status() === 200) {
        $data = $response->json();
        $rows = $data['values'];
        
        foreach ($rows as $row) {
            $email = $row[4]; // Assuming email is at index 6 in each row

            // Check if a user exists with the email
            $user = User::where('email', $email)->first();
            if ($user) {
                // Create membership record if it doesn't exist
                if (!Membership::where('user_id', $user->id)->first()) {
                Membership::create([
                    'user_id' => $user->id,
                    'name' => $user->name, // Map other fields accordingly
                    'email' => $user->email,
                    'membership_id' => $row[0], 
                    'token' => $row[2], 
                    'gender' => $row[5], 
                    'date_of_birth' => ($row[6] == 'NULL')? NULL : $row[6], 
                    'nationality' => $row[7], 
                    'marital_status' => $row[8], 
                    'religion' => $row[9], 
                    'father_name' => $row[10], 
                    'mother_name' => $row[11], 
                    'home_address' => $row[12], 
                    'pincode' => $row[13], 
                    'city' => $row[14], 
                    'state' => $row[15], 
                    'mobile' => $row[16], 
                    'whatsapp' => $row[17], 
                    'nominee_name' => $row[18], 
                    'nominee_relation' => $row[19], 
                    'ifsc' => $row[20],
                    'bank_name' => $row[21],
                    'branch_name' => $row[22],
                    'account_no' => $row[23],
                    'pancard' => $row[24],
                    'aadhar_card' => $row[25],
                    'image' => $row[26],
                    'isPaid' => $row[27],
                    'payment_status' => $row[28],
                    'isVerified' => $row[29],
                    'status' => ($row[30] == "")? false : $row[30],
                    'terms_and_condition' => $row[31],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            }
        }
        echo "Membership records created successfully!";
    } else {
        echo "Failed to fetch data from Google Sheets. Status: " . $response->status();
    }
});


Route::get('/add-membership-payments', function () {
    // Retrieve all members from the `membership` table
    $members = Membership::all();

    foreach ($members as $member) {
        // Check if a `user_id` exists; if not, create a payment record
           
        if(!MembershipPayment::where('membership_id', $member->id)->first()){

        
            MembershipPayment::create([
                'membership_id' => $member->id,
                'amount' => 251, // Set default or specific amount if needed
                'currency' => 'INR', // Set the default currency or get from input
                'receipt_no' => time(),
                'payment_id' => null,
                'transaction_fee' => 251,
                'transaction_id' => time() . rand(11, 99) . date('yd'),
                'transaction_date' => date("Y-m-d H:i:s"),
                'payment_card_id' => null,
                'method' => "cash", // or specify as needed
                'wallet' => null,
                'bank' => null,
                'payment_date' => null,
                'payment_vpa' => null,
                'ip_address' => request()->ip(),
                'international_payment' => 'No',
                'error_reason' => null,
                'error_code' => null,
                'error_description' => null,
                'payment_status' => 1,
                'status' => 1,
                'notes' => 'Generated for member without user ID',
            ]);
        }


    }

    echo "Payment records created for members without a `user_id`.";
});



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
        Route::get('/membership-scanner/{token}', 'membershipScanner')->name('user.membership.scanner');
        Route::get('/gift-card', 'GiftCard')->name('user.gift-card');
        Route::get('/payment', 'payment')->name('user.payment');
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
        Route::get('/users', [UserController::class, "manageUser"])->name('users.index');
        Route::get('/membership', [UserController::class, "manageMembership"])->name('membership.index');
        Route::get('/membership-view/{id}', [MembershipController::class, "viewMembership"])->name('membership.view');
        Route::get('/membership/{id}', [MembershipController::class, "editMembership"])->name('membership.edit');
        Route::get('/membership-export', [MembershipController::class, "exportMembership"])->name('membership.export');
        Route::get('/orders', [OrderController::class, "manageOrder"])->name('orders.index');
        Route::get('/orders/{orderId}', [OrderController::class, 'viewOrder'])->name('order.view');
        Route::get('/users/wishlist/{userId}', [UserController::class, 'viewUserWishlist'])->name('user.wishlist.view');
        Route::get('/users/order/{userId}', [UserController::class, 'viewUserOrder'])->name('user.order.view');
        Route::get('/users/address/{userId}', [UserController::class, 'viewUserAddress'])->name('user.address.view');
        Route::get('/edit-coupon/{id}', EditCoupon::class)->name('admin.edit-coupon');
    });
});

Route::post('/coupon/toggle-status/{id}', [CouponController::class, 'toggleStatus'])->name('coupon.toggleStatus');
Route::get('product/{category}/{slug}', [PublicController::class, 'productView'])->name('product.view');


// login with google-works here:
Route::get('auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('google.login');

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


Route::get('confirm-order', [MailController::class, 'index']);
