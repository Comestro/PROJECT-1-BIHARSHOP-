@extends('users.layout')
@section('title')

My-Order Page

@endsection

@section('content')
    <div class="flex p-6 space-x-6">
        <!-- Sidebar -->
        <div class="w-48 sm:w-64 xl:w-1/4 lg:mr-6">
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <!-- Filters Heading -->
                <div class="mb-6">
                    <span class="text-2xl font-semibold text-gray-800">Filters</span>
                </div>
                <hr>
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
        <div class="flex-1 p-4">
            <div class="space-y-6">
                <!-- Search bar -->
                <div class="flex items-center mb-6">
                    <div class="flex-grow">
                        <input type="text"
                            class="w-full py-3 border border-gray-300 rounded-l-lg text-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Search your orders here">
                    </div>

                    <button
                        class="flex items-center px-6 py-3 bg-blue-600 text-white rounded-r-lg hover:bg-blue-700 transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-md">
                        <svg width="18" height="18" viewBox="0 0 17 18" xmlns="http://www.w3.org/2000/svg"
                            class="mr-2">
                            <g fill="currentColor" fill-rule="evenodd">
                                <path
                                    d="m11.618 9.897l4.225 4.212c.092.092.101.232.02.313l-1.465 1.46c-.081.081-.221.072-.314-.02l-4.216-4.203">
                                </path>
                                <path
                                    d="m6.486 10.901c-2.42 0-4.381-1.956-4.381-4.368 0-2.413 1.961-4.369 4.381-4.369 2.42 0 4.381 1.956 4.381 4.369 0 2.413-1.961 4.368-4.381 4.368m0-10.835c-3.582 0-6.486 2.895-6.486 6.467 0 3.572 2.904 6.467 6.486 6.467 3.582 0 6.486-2.895 6.486-6.467 0-3.572-2.904-6.467-6.486-6.467">
                                </path>
                            </g>
                        </svg>
                        <span>Search Orders</span>
                    </button>
                </div>


                <!-- Order List -->
                <div class="space-y-6">
                    <!-- Order 1 -->
                    <div class="flex space-x-6 p-6 bg-white border border-gray-200 rounded-lg shadow-md">
                        <!-- Product Image -->
                        <img src="https://rukminim2.flixcart.com/image/200/200/kxqg2a80/stuffed-toy/c/0/d/doremon-soft-toy-for-kids-children-girls-boys-40-kg-traders-original-imaga4hvpzdcdxjy.jpeg?q=90"
                            alt="JAWGROW JAWGROW01 ULTRA Massager" class="w-24 h-24 object-cover rounded-lg">

                        <!-- Product Details -->
                        <div class="flex justify-between items-start flex-grow">
                            <!-- Product Info -->
                            <div class="flex flex-col">
                                <h2 class="font-bold text-lg">JAWGROW JAWGROW01</h2>
                                <p class="text-gray-600 mb-1">Color: Black</p>
                            </div>

                            <!-- Price -->
                            <p class="font-bold text-lg text-gray-900">₹525</p>

                            <!-- Cancellation Info -->
                            <div class="flex flex-col items-start text-red-500 ml-6">
                                <p class="ml-0">Cancelled on Feb 12</p>
                                <p class="text-gray-600 mt-1 max-w-sm">The seller has cancelled your order because the
                                    courier service provider is unable to deliver to your location.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
