@extends('users.layout')
@section('title', 'my-profile')

@section('content')

    <!-- Main Content Area -->
    <div class="flex flex-wrap lg:flex-nowrap p-5">
        <!-- Sidebar -->
        <div class="w-full lg:w-64 xl:w-1/4">
            <aside class="bg-white shadow-md rounded-lg p-6 flex flex-col">
                <div class="flex flex-col items-center border-b pb-6 mb-6">
                    <!-- Avatar -->
                    <div class="w-24 h-24 rounded-full overflow-hidden bg-gray-200">
                        <img src="https://via.placeholder.com/150" alt="User Avatar" class="w-full h-full object-cover">
                    </div>

                    <!-- User Info -->
                    <div class="mt-4 text-center">
                        <h2 class="text-2xl font-semibold text-gray-800">Syed Sadique</h2>
                        <p class="text-gray-500 text-sm">Hello!</p>
                    </div>
                </div>

                <!-- Navigation Buttons (Mobile Friendly) -->
                <nav class="grid grid-cols-2 gap-2 sm:grid-cols-2 sm:gap-4 sm:flex lg:flex-col">
                    <!-- Personal Information -->
                    <!-- Personal Information for Desktop (only name, no icon) -->
                    <button onclick="location.href='#personal-info'"
                        class="hidden sm:block py-3 px-4 rounded-md text-center bg-blue-600 text-white font-semibold hover:bg-blue-700 border border-gray-300">
                        Personal Information
                    </button>


                    <!-- Orders for Mobile (icon with name, with border) -->
                    <!-- Orders for Mobile (icon with name, with border in mobile) -->
                    <button onclick="location.href='#orders'"
                        class="block sm:hidden py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border border-gray-300">
                        <i class="fas fa-box mr-2"></i> Orders
                    </button>

                    <!-- Orders for Desktop (only name, no border in desktop) -->
                    <button onclick="location.href='#orders'"
                        class="hidden sm:block py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border-none sm:border-none">
                        Orders
                    </button>

                    <!-- Addresses for Mobile (icon with name, with border in mobile) -->
                    <button onclick="location.href='{{ route('user.address') }}'"
                        class="block sm:hidden py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border border-gray-300">
                        <i class="fas fa-map-marker-alt mr-2"></i> Addresses
                    </button>

                    <!-- Addresses for Desktop (only name, no border in desktop) -->
                    <button onclick="location.href='{{ route('user.address') }}'"
                        class="hidden sm:block py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border-none sm:border-none">
                        Addresses
                    </button>

                    <!-- Payment for Mobile (icon with name, with border in mobile) -->
                    <button onclick="location.href='#payment'"
                        class="block sm:hidden py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border border-gray-300">
                        <i class="fas fa-credit-card mr-2"></i> Payment
                    </button>

                    <!-- Payment for Desktop (only name, no border in desktop) -->
                    <button onclick="location.href='#payment'"
                        class="hidden sm:block py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border-none sm:border-none">
                        Payment
                    </button>

                    <!-- Coupons for Mobile (icon with name, with border in mobile) -->
                    <button onclick="location.href='{{ route('user.my-coupon') }}'"
                        class="block sm:hidden py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border border-gray-300">
                        <i class="fas fa-ticket-alt mr-2"></i> Coupons
                    </button>

                    <!-- Coupons for Desktop (only name, no border in desktop) -->
                    <button onclick="location.href='{{ route('user.my-coupon') }}'"
                        class="hidden sm:block py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border-none sm:border-none">
                        Coupons
                    </button>

                    <!-- Wishlist for Mobile (icon with name, with border in mobile) -->
                    <button onclick="location.href='{{ route('user.wishlist') }}'"
                        class="block sm:hidden py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border border-gray-300">
                        <i class="fas fa-heart mr-2"></i> Wishlist
                    </button>

                    <!-- Wishlist for Desktop (only name, no border in desktop) -->
                    <button onclick="location.href='{{ route('user.wishlist') }}'"
                        class="hidden sm:block py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border-none sm:border-none">
                        Wishlist
                    </button>

                    <!-- Logout for Mobile (icon with name, with border in mobile) -->
                    <button onclick="location.href='#logout'"
                        class="block sm:hidden py-3 px-4 rounded-md text-center text-red-600 hover:bg-gray-100 border border-gray-300">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>

                    <!-- Logout for Desktop (only name, no border in desktop) -->
                    <button onclick="location.href='#logout'"
                        class="hidden sm:block py-3 px-4 rounded-md text-center text-red-600 hover:bg-gray-100 border-none sm:border-none">
                        Logout
                    </button>

                </nav>




            </aside>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-4">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <!-- Personal Information Section -->
                <div class="flex justify-between items-center mb-6">
                    <span class="text-2xl font-semibold">Personal Information</span>
                    <button class="text-blue-500 hover:underline">Edit</button>
                </div>
                <form>
                    <div class="flex space-x-6 mb-6">
                        <div class="flex-1">
                            <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" id="firstName" name="firstName"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                required disabled autocomplete="name" value="Saurav">
                        </div>
                        <div class="flex-1">
                            <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input type="text" id="lastName" name="lastName"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                disabled autocomplete="name" value="Itachi">
                        </div>
                    </div>

                    <!-- Gender -->
                    <div class="mb-6">
                        <span class="block text-sm font-medium text-gray-700 mb-2">Your Gender</span>
                        <div class="flex space-x-4">
                            <label for="Male" class="flex items-center">
                                <input type="radio" id="Male" name="gender"
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" disabled>
                                <span class="ml-2 text-gray-700">Male</span>
                            </label>
                            <label for="Female" class="flex items-center">
                                <input type="radio" id="Female" name="gender"
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" disabled>
                                <span class="ml-2 text-gray-700">Female</span>
                            </label>
                        </div>
                    </div>
                </form>

                <!-- Email Section -->
                <div class="mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-semibold">Email Address</span>
                        <button class="text-blue-500 hover:underline">Edit</button>
                    </div>
                    <form>
                        <input type="text" name="email"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                            disabled autocomplete="email" required value="">
                    </form>
                </div>

                <!-- Mobile Section -->
                <div class="mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-semibold">Mobile Number</span>
                        <button class="text-blue-500 hover:underline">Edit</button>
                    </div>
                    <form>
                        <input type="text" name="mobileNumber"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                            disabled autocomplete="tel" required value="+919117442498">
                    </form>
                </div>

                <!-- FAQs -->
                <div class="bg-gray-100 p-4 rounded-lg mb-6">
                    <div class="text-lg font-semibold mb-2">FAQs</div>
                    <div class="space-y-4">
                        <div>
                            <h4 class="text-md font-medium text-gray-900">What happens when I update my email address (or
                                mobile number)?</h4>
                            <p class="text-gray-700">Your login email id (or mobile number) changes, likewise. You'll
                                receive all your account related communication on your updated email address (or mobile
                                number).</p>
                        </div>
                        <div>
                            <h4 class="text-md font-medium text-gray-900">When will my account be updated with the new
                                email
                                address (or mobile number)?</h4>
                            <p class="text-gray-700">It happens as soon as you confirm the verification code sent to your
                                email (or mobile) and save the changes.</p>
                        </div>
                        <div>
                            <h4 class="text-md font-medium text-gray-900">What happens to my existing account when I update
                                my email address (or mobile number)?</h4>
                            <p class="text-gray-700">Updating your email address (or mobile number) doesn't invalidate your
                                account. Your account remains fully functional. You'll continue seeing your Order history,
                                saved information and personal details.</p>
                        </div>
                        <div>
                            <h4 class="text-md font-medium text-gray-900">Does my Seller account get affected when I update
                                my email address?</h4>
                            <p class="text-gray-700">Any changes will reflect in your Seller account also.</p>
                        </div>
                    </div>
                </div>

                <!-- Account Buttons -->
                <div class="flex justify-between items-center mt-6">
                    <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Deactivate Account</button>
                    <button class="bg-red-700 text-white px-4 py-2 rounded-md hover:bg-red-800">Delete Account</button>
                </div>
            </div>
        </div>
    </div>

@endsection
