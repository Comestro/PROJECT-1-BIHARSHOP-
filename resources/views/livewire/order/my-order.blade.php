<div>
    <div class="p-6">
        <!-- Home Navigation -->
        <div class="flex items-center font-semibold text-sm sm:px-5 mb-3 mt-6 lg:ml-3">
            <!-- Home -->
            <div class="flex items-center font-semibold ">
                <a href="{{ route('user.index') }}" class="text-gray-700 text-sm sm:text-base">Home</a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 sm:w-6 sm:h-6 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </div>

            <!-- My Orders -->
            <div class="flex items-center text-gray-600">
                <a href="{{ route('user.my-order') }}" class="text-black">My Orders</a>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row lg:space-x-6 lg:space-y-0">
            <!-- Filter Button for Mobile -->
            <div class="w-full lg:hidden mb-6">
                <button id="filterButton"
                    class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-md">
                   Filters
                </button>
            </div>

            <!-- Sidebar (Hidden in Mobile, Visible in Desktop) -->
            <div id="filterSidebar" class="w-full lg:w-64 xl:w-1/4 lg:mr-6 mb-6 lg:mb-0 hidden lg:block">
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <!-- Filters Heading -->
                    <div class="mb-6">
                        <span class="text-2xl font-semibold text-gray-800">Filters</span>
                    </div>
                    <hr class="my-4">

                    <!-- Order Status Section -->
                    <div class="mb-8">
                        <div class="text-lg font-medium text-gray-600 mb-4">Order Status</div>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3">
                                <input wire:click="updateFilters('statusFilters', 'On the way')" type="checkbox"
                                    class="w-5 h-5 text-indigo-600 rounded border-gray-300 focus:ring-2 focus:ring-indigo-500">
                                <span class="text-sm text-gray-800">On the way</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <input wire:click="updateFilters('statusFilters', 'Delivered')" type="checkbox"
                                    class="w-5 h-5 text-indigo-600 rounded border-gray-300 focus:ring-2 focus:ring-indigo-500">
                                <span class="text-sm text-gray-800">Delivered</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <input wire:click="updateFilters('statusFilters', 'Cancelled')" type="checkbox"
                                    class="w-5 h-5 text-indigo-600 rounded border-gray-300 focus:ring-2 focus:ring-indigo-500">
                                <span class="text-sm text-gray-800">Cancelled</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <input wire:click="updateFilters('statusFilters', 'Returned')" type="checkbox"
                                    class="w-5 h-5 text-indigo-600 rounded border-gray-300 focus:ring-2 focus:ring-indigo-500">
                                <span class="text-sm text-gray-800">Returned</span>
                            </div>
                        </div>
                    </div>

                    <!-- Order Time Section -->
                    <div>
                        <div class="text-lg font-medium text-gray-600 mb-4">Order Time</div>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3">
                                <input wire:click="updateFilters('timeFilters', '30_days')" type="checkbox"
                                    class="w-5 h-5 text-indigo-600 rounded border-gray-300 focus:ring-2 focus:ring-indigo-500">
                                <span class="text-sm text-gray-800">Last 30 days</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <input wire:click="updateFilters('timeFilters', '2023')" type="checkbox"
                                    class="w-5 h-5 text-indigo-600 rounded border-gray-300 focus:ring-2 focus:ring-indigo-500">
                                <span class="text-sm text-gray-800">2023</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1">
                <div class="space-y-3">
                    <!-- Search bar -->
                    <div class="flex flex-col sm:flex-row items-center mb-4">
                        <!-- Search Input -->
                        <div class="w-full sm:w-auto flex-grow sm:mb-0">
                            <input type="search" wire:model.live='searchTerm'
                                class="w-full py-3 border border-gray-300 rounded-full sm:rounded-r-lg text-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 ease-in-out"
                                placeholder="Search your orders here">
                        </div>
                    
                        <!-- Search Button -->
                        <button
                            class="hidden sm:block flex items-center bg-blue-500 text-white py-4 px-6 rounded-r-lg hover:bg-blue-600 transition duration-200 ease-in-out">
                            <svg width="16" height="16" viewBox="0 0 17 18" xmlns="http://www.w3.org/2000/svg" class="mr-4">
                                <g fill="currentColor" fill-rule="evenodd">
                                    <path
                                        d="m11.618 9.897l4.225 4.212c.092.092.101.232.02.313l-1.465 1.46c-.081.081-.221.072-.314-.02l-4.216-4.203">
                                    </path>
                                    <path
                                        d="m6.486 10.901c-2.42 0-4.381-1.956-4.381-4.368 0-2.413 1.961-4.369 4.381-4.369 2.42 0 4.381 1.956 4.381 4.369 0 2.413-1.961 4.368-4.381 4.368m0-10.835c-3.582 0-6.486 2.895-6.486 6.467 0 3.572 2.904 6.467 6.486 6.467 3.582 0 6.486-2.895 6.486-6.467 0-3.572-2.904-6.467-6.486-6.467">
                                    </path>
                                </g>
                            </svg>
                        </button>
                    </div>
                    
                </div>
                
                <!-- Orders List -->
                <div class="space-y-6">
                    @forelse ($orders as $order)
                        @foreach ($order->orderItems as $orderItem)
                            @if ($orderItem->products->name && stripos($orderItem->products->name, $searchTerm) !== false)
                                <a wire:navigate
                                    href="{{ route('product.view', ['category' => $orderItem->products->category->cat_slug, 'slug' => $orderItem->products->slug]) }}">
                                    <div
                                        class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6 p-4 bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
                                        <!-- Product Image -->
                                        <img src="{{ $orderItem->products->image ? asset('storage/image/product/' . $orderItem->products->image) : asset('path/to/default-image.jpg') }}"
                                            class="w-24 h-24 object-cover rounded-lg mx-auto sm:mx-0">
                
                                        <!-- Product Details -->
                                        <div
                                            class="flex flex-col sm:flex-row flex-grow space-y-4 sm:space-y-0 sm:space-x-6 justify-between">
                                            <!-- Product Info -->
                                            <div class="flex-1">
                                                <h2 class="text-xl font-semibold text-gray-800">
                                                    {{ $orderItem->products->name }}</h2>
                                                <p class="text-sm text-gray-500">
                                                    {{ $orderItem->colorVariant ? 'Color: ' . $orderItem->colorVariant->variant_value : 'Color: N/A' }}
                                                </p>
                                            </div>
                
                                            <!-- Price -->
                                            <div class="text-lg font-bold text-gray-900">
                                                ₹{{ $orderItem->products->price }}</div>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    @empty
                        <p class="text-lg text-gray-500">No orders found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
