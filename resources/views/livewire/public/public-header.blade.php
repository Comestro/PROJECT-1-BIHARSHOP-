<nav class="bg-white fixed  top-0  w-full border-gray-200 dark:bg-gray-900 dark:border-gray-700 z-50">
    <div class="w-full  flex-col md:flex-row gap-3 flex flex-wrap md:items-center justify-between mx-auto  px-[5%] py-4">
        <a href="{{ route('index') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-black whitespace-nowrap dark:text-white">BiharShop</span>
            {{-- <img class="w-auto h-24 object-cover" src="{{asset('logo.png')}}" alt=""> --}}
        </a>


        <div class="flex flex-1">
            <form class="md:max-w-xl mx-auto  w-full ">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <livewire:public.product.search-product />
            </form>
        </div>
        <div class="hidden md:block">
            <div class=" flex gap-4 items-center">
                @livewire('public.cart-counter')

                @if (!Auth::check())
                    <a href="{{ route('login') }}"
                        class="flex border px-3 py-2 rounded-full cursor-pointer item-center gap-1 hover:shadow-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                        </svg>
                        <span>Login</span>
                    </a>
                @endif

                @auth
                <div x-data="{ open: false }" class="relative">
                    <!-- Avatar Button -->
                    <div @mouseenter="open = true" @mouseleave="open = false" class="rounded-full cursor-pointer flex items-center gap-1 border px-3 py-2">
                        <!-- Avatar button content -->
                       
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                        </svg>
                    </div>

                    <!-- Dropdown menu -->
                    <div x-show="open" class="z-50 bg-white absolute top-full right-0 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600" @mouseenter="open = true" @mouseleave="open = false">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                            <li>
                                <a href="{{ route('user.index') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    My Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.my-order') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    My Orders
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.wishlist') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    Wishlist (34)
                                </a>
                            </li>
                        </ul>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-red-500 text-white px-3 py-2 text-center font-bold text-lg">Logout</button>
                        </form>
                    </div>
                </div>

                @endauth

            </div>
        </div>
    </div>
</nav>
