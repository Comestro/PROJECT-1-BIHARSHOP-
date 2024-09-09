@extends('users.layout')

@section('title')
    My Order Page
@endsection

@section('content')
    <div class="flex flex-col lg:flex-row p-6  lg:space-x-6 lg:space-y-0">
        <!-- Filter Button for Mobile -->
        <div class="w-full lg:hidden mb-6">
            <button id="filterButton"
                class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-md">
                Show Filters
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
                    <!-- Order Status Options -->
                    <div class="space-y-4">
                        <!-- Option 1: On the way -->
                        <div class="flex items-center space-x-3">
                            <input type="checkbox"
                                class="w-5 h-5 text-indigo-600 rounded border-gray-300 focus:ring-2 focus:ring-indigo-500">
                            <span class="text-sm text-gray-800">On the way</span>
                        </div>
                        <!-- Option 2: Delivered -->
                        <div class="flex items-center space-x-3">
                            <input type="checkbox"
                                class="w-5 h-5 text-indigo-600 rounded border-gray-300 focus:ring-2 focus:ring-indigo-500">
                            <span class="text-sm text-gray-800">Delivered</span>
                        </div>
                        <!-- Option 3: Cancelled -->
                        <div class="flex items-center space-x-3">
                            <input type="checkbox"
                                class="w-5 h-5 text-indigo-600 rounded border-gray-300 focus:ring-2 focus:ring-indigo-500">
                            <span class="text-sm text-gray-800">Cancelled</span>
                        </div>
                        <!-- Option 4: Returned -->
                        <div class="flex items-center space-x-3">
                            <input type="checkbox"
                                class="w-5 h-5 text-indigo-600 rounded border-gray-300 focus:ring-2 focus:ring-indigo-500">
                            <span class="text-sm text-gray-800">Returned</span>
                        </div>
                    </div>
                </div>

                <!-- Order Time Section -->
                <div>
                    <div class="text-lg font-medium text-gray-600 mb-4">Order Time</div>
                    <!-- Order Time Options -->
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <input type="checkbox"
                                class="w-5 h-5 text-indigo-600 rounded border-gray-300 focus:ring-2 focus:ring-indigo-500">
                            <span class="text-sm text-gray-800">Last 30 days</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <input type="checkbox"
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
                <div class="flex flex-col sm:flex-row items-center  mb-4">
                    <!-- Search Input -->
                    <div class="w-full sm:w-auto flex-grow sm:mb-0">
                        <input type="text"
                            class="w-full py-3 border border-gray-300 rounded-l-lg sm:rounded-l-lg text-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 ease-in-out"
                            placeholder="Search your orders here">
                    </div>

                    <!-- Search Button -->
                    <button
                        class="hidden sm:block flex items-center bg-blue-500 text-white py-4 px-6 rounded-r-lg sm:rounded-r-lg hover:bg-blue-600 transition duration-200 ease-in-out">
                        <svg width="16" height="16" viewBox="0 0 17 18" xmlns="http://www.w3.org/2000/svg"
                            class="mr-4">
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

            <!-- Order List -->
            <div class="space-y-6">
                <!-- Order 1 -->
                <div
                    class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6 p-4 bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
                    <!-- Product Image -->
                    <img src="https://rukminim2.flixcart.com/image/200/200/kxqg2a80/stuffed-toy/c/0/d/doremon-soft-toy-for-kids-children-girls-boys-40-kg-traders-original-imaga4hvpzdcdxjy.jpeg?q=90"
                        alt="JAWGROW JAWGROW01 ULTRA Massager" class="w-24 h-24 object-cover rounded-lg mx-auto sm:mx-0">                        
                    <!-- Product Details -->
                    <div class="flex flex-col sm:flex-row flex-grow space-y-4 sm:space-y-0 sm:space-x-6 justify-between">
                        <!-- Product Info -->
                        <div class="flex-1">
                            <h2 class="text-xl font-semibold text-gray-800">JAWGROW JAWGROW01</h2>
                            <p class="text-gray-600">Color: Black</p>
                        </div>
                    
                        <!-- Price -->
                        <div class="text-lg font-bold text-gray-900">
                            ₹525
                        </div>
                    
                        <!-- Cancellation Info -->
                        <div class="flex flex-col text-red-500 text-sm space-y-2">
                            <p class="font-medium">Cancelled on Feb 12</p>
                            <p class="text-gray-600 max-w-xs">The seller has cancelled your order because the courier service provider is unable to deliver to your location.</p>
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
    </div>

    <script>
        document.getElementById('filterButton').addEventListener('click', function() {
            var filterSidebar = document.getElementById('filterSidebar');
            filterSidebar.classList.toggle('hidden');
        });
    </script>
@endsection
