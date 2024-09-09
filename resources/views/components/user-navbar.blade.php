<div class="w-full lg:w-64 xl:w-1/4 mb-4">
    <aside class="bg-white shadow-md rounded-lg p-6 lg:p-8 flex flex-col"> <!-- Adjusted padding here -->
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
            <button onclick="location.href='{{ route('user.index') }}'"
                class="hidden sm:block py-3 px-4 rounded-md text-center bg-blue-600 text-white font-semibold hover:bg-blue-700 border border-gray-300">
                Personal Information
            </button>                    
            <button onclick="location.href='{{ route('user.my-order') }}'"
                class="block sm:hidden py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border border-gray-300">
                <i class="fas fa-box mr-2"></i> Orders
            </button>

            <button onclick="location.href='{{ route('user.my-order') }}'"
                class="hidden sm:block py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border-none sm:border-none">
                Orders
            </button>

            <button onclick="location.href='{{ route('user.address') }}'"
                class="block sm:hidden py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border border-gray-300">
                <i class="fas fa-map-marker-alt mr-2"></i> Addresses
            </button>

            <button onclick="location.href='{{ route('user.address') }}'"
                class="hidden sm:block py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border-none sm:border-none">
                Addresses
            </button>

            <button onclick="location.href='{{ route('user.gift-card') }}'"
                class="block sm:hidden py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border border-gray-300">
                <i class="fas fa-gift-alt mr-2"></i> Gift-Card
            </button>
            
            <button onclick="location.href='{{ route('user.gift-card') }}'"
                class="hidden sm:block py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border-none sm:border-none">
                Gift-Card
            </button>

            <button onclick="location.href='#payment'"
                class="block sm:hidden py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border border-gray-300">
                <i class="fas fa-credit-card mr-2"></i> Payment
            </button>

            <button onclick="location.href='#payment'"
                class="hidden sm:block py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border-none sm:border-none">
                Payment
            </button>

            <button onclick="location.href='{{ route('user.my-coupon') }}'"
                class="block sm:hidden py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border border-gray-300">
                <i class="fas fa-ticket-alt mr-2"></i> Coupons
            </button>

            <button onclick="location.href='{{ route('user.my-coupon') }}'"
                class="hidden sm:block py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border-none sm:border-none">
                Coupons
            </button>

            <button onclick="location.href='{{ route('user.wishlist') }}'"
                class="block sm:hidden py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border border-gray-300">
                <i class="fas fa-heart mr-2"></i> Wishlist
            </button>

            <button onclick="location.href='{{ route('user.wishlist') }}'"
                class="hidden sm:block py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border-none sm:border-none">
                Wishlist
            </button>

            <button onclick="location.href='#logout'"
                class="hidden sm:block py-3 px-4 rounded-md text-center text-red-600 hover:bg-gray-100 border-none sm:border-none">
                Logout
            </button>

        </nav>
    </aside>
</div>