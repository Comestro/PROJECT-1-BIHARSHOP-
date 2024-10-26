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
                    <img src="" alt="Online Default Avatar" class="w-full h-full object-cover">
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
        <nav class="grid grid-cols-2 sm:grid-cols-2 sm:flex lg:flex-col">
            <!-- Personal Information -->
            <a wire:navigate href='{{ route('user.index') }}'
                class="hidden sm:block py-3 px-4 rounded-md text-center {{ Route::is('user.index') ? 'bg-blue-700 text-white' : 'text-gray-700' }}   font-semibold">
                Personal Info
            </a>
            <a   wire:navigate href='{{ route('user.my-order') }}'
                class="block sm:hidden py-3 {{ Route::is('user.my-order') ? 'bg-blue-700 text-white' : 'text-gray-700' }} px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border border-gray-300 flex gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
                </svg>
                Orders
            </a>

            <a wire:navigate href='{{ route('user.my-order') }}'
                class="hidden sm:block py-3 px-4 rounded-md  {{ Route::is('user.my-order') ? 'bg-blue-700 text-white' : 'text-gray-700' }}  text-center text-gray-700 ">
                Orders
            </a>

            <a  wire:navigate href='{{ route('user.address') }}'
                class="block sm:hidden py-3 {{ Route::is('user.address') ? 'bg-blue-700 text-white' : 'text-gray-700' }}  px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border border-gray-300 flex gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd"
                        d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                        clip-rule="evenodd" />
                </svg>
                Addresses
            </a>

            <a   wire:navigate href='{{ route('user.address') }}'
                class="hidden {{ Route::is('user.address') ? 'bg-blue-700 text-white' : 'text-gray-700' }} sm:block py-3 px-4 rounded-md text-center text-gray-700 ">
                Addresses
            </a>

            <a   wire:navigate href='{{ route('user.membership') }}'
                class="block {{ Route::is('user.membership') ? 'bg-blue-700 text-white' : 'text-gray-700' }} sm:hidden py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border border-gray-300 flex gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd"
                        d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                        clip-rule="evenodd" />
                </svg>
                Membership
            </a>

            <a   wire:navigate href='{{ route('user.membership') }}'
                class=" {{ Route::is('user.membership') ? 'bg-blue-700 text-white' : 'text-gray-700' }} hidden sm:block py-3 px-4 rounded-md text-center text-gray-700 ">
                Membership
            </a>

            <a  wire:navigate href='{{ route('user.gift-card') }}'
                class="{{ Route::is('user.gift-card') ? 'bg-blue-700 text-white' : 'text-gray-700' }}  hidden sm:block py-3 px-4 rounded-md text-center text-gray-700 ">
                Gift-Card
            </a>


            <a   wire:navigate href='{{ route('user.my-coupon') }}'
                class=" {{ Route::is('user.my-coupon') ? 'bg-blue-700 text-white' : 'text-gray-700' }} block sm:hidden py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border border-gray-300 flex gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd"
                        d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875Zm6.905 9.97a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 1 0 1.06 1.06l1.72-1.72V18a.75.75 0 0 0 1.5 0v-4.19l1.72 1.72a.75.75 0 1 0 1.06-1.06l-3-3Z"
                        clip-rule="evenodd" />
                    <path
                        d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
                </svg>
                Coupons
            </a>

            <a  wire:navigate href='{{ route('user.my-coupon') }}'
                class=" {{ Route::is('user.my-coupon') ? 'bg-blue-700 text-white' : 'text-gray-700' }} hidden sm:block py-3 px-4 rounded-md text-center text-gray-700 ">
                Coupons
            </a>

            <a wire:navigate href='{{ route('user.wishlist') }}'
                class="{{ Route::is('user.wishlist') ? 'bg-blue-700 text-white' : 'text-gray-700' }} block sm:hidden py-3 px-4 rounded-md text-center text-gray-700 hover:bg-gray-100 border border-gray-300  flex gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path
                        d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                </svg>
                Wishlist
            </a>

            <a wire:navigate href='{{ route('user.wishlist') }}'
                class="{{ Route::is('user.wishlist') ? 'bg-blue-700 text-white' : 'text-gray-700' }}  hidden sm:block py-3 px-4 rounded-md text-center text-gray-700 ">
                Wishlist
            </a>

            <a wire:navigate onclick="location.href='#logout'"
                class=" hidden sm:block py-3 px-4 rounded-md text-center text-red-600 ">
                Logout
            </a>

        </nav>
    </aside>
</div>
