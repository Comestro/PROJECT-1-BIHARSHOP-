<div class="w-full  mb-4 sm:mt-0">
    <aside class="rounded-lg p-2 lg:px-2 lg:py-4 flex flex-col "> <!-- Adjusted padding here -->
        <div class="flex flex-col items-center border-b pb-6 mb-6">
            <button @click="sidebarOpen = !sidebarOpen" type="button" class="lg:hidden sm:inline-flex items-center p-2 ms-3 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg>
             </button>
            <!-- Avatar -->
            <div class="w-16 h-16 rounded-full overflow-hidden bg-gray-200">
                @if (Auth::user() && Auth::user()->image)
                    <!-- Show user's profile image -->
                    <img src="{{ Auth::user()->image }}" alt="User Avatar" class="w-full h-full object-cover">
                @elseif (Auth::user() && Auth::user()->email)
                    <!-- Show a default avatar for email login if no profile image is available -->
                    <img src="https://cdn-icons-png.flaticon.com/128/3135/3135715.png" alt="Default Avatar"
                        class="w-full h-full object-cover">
                @else
                    <!-- Show an online default avatar -->
                    <img src="{{asset('dp.jpg')}}" alt="Online Default Avatar" class="w-full h-full object-cover">
                @endif
            </div>
            <!-- User Info -->
            <div class="mt-4 text-center">
                <p class="text-gray-500 text-sm">Hello!</p>
                <h2 class="text-lg font-semibold text-gray-800">{{ Auth::user()->name }}</h2>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-red-500 text-white px-4 rounded mt-2 py-1 flex text-center font-bold text-lg md:hidden">Logout</button>
            </form>

        </div>

        <!-- Navigation Buttons (Mobile Friendly) -->
        <nav class="flex flex-col">
            <a wire:navigate href='{{ route('user.index') }}' class="py-3 px-4 rounded-md text-center {{ Route::is('user.index') ? 'bg-blue-700 text-white' : 'text-gray-700' }} font-semibold">
                Personal Info
            </a>
            <a wire:navigate href='{{ route('user.my-order') }}' class="py-3 px-4 rounded-md text-center {{ Route::is('user.my-order') ? 'bg-blue-700 text-white' : 'text-gray-700' }}">
                Orders
            </a>
            <a wire:navigate href='{{ route('user.address') }}' class="py-3 px-4 rounded-md text-center {{ Route::is('user.address') ? 'bg-blue-700 text-white' : 'text-gray-700' }}">
                Addresses
            </a>
            <a wire:navigate href='{{ route('user.membership') }}' class="py-3 px-4 rounded-md text-center {{ Route::is('user.membership') ? 'bg-blue-700 text-white' : 'text-gray-700' }}">
                Membership
            </a>
            <a wire:navigate href='{{ route('user.gift-card') }}' class="py-3 px-4 rounded-md text-center {{ Route::is('user.gift-card') ? 'bg-blue-700 text-white' : 'text-gray-700' }}">
                Gift-Card
            </a>
            <a wire:navigate href='{{ route('user.my-coupon') }}' class="py-3 px-4 rounded-md text-center {{ Route::is('user.my-coupon') ? 'bg-blue-700 text-white' : 'text-gray-700' }}">
                Coupons
            </a>
            <a wire:navigate href='{{ route('user.wishlist') }}' class="py-3 px-4 rounded-md text-center {{ Route::is('user.wishlist') ? 'bg-blue-700 text-white' : 'text-gray-700' }}">
                Wishlist
            </a>
        </nav>
    </aside>
</div>
