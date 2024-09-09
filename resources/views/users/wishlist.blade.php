@extends('users.layout')
@section('title')
    Wishlist Page
@endsection

@section('content')
    <!-- Main Content Area -->
    <div class="flex flex-wrap lg:flex-nowrap p-6">

        <!-- Sidebar -->
        <x-user-navbar />

        <!-- Main Content -->
        <div class="flex-1 sm:px-4">
            <div class="bg-white p-6 rounded-lg shadow-lg">
        
                <div class="w-full">
                    <div class="flex justify-between items-center mb-6 border-b border-gray-200 pb-2">
                        <span class="text-2xl font-bold text-gray-800">My Wishlist (4)</span>
                    </div>
        
                    <!-- Loop starts here to show the wishlist items -->
                    <div class="relative bg-white shadow-sm rounded-lg p-4 mb-2">
                        <div class="w-full flex flex-col sm:flex-row items-center gap-4">
                            <img class="w-24 h-24 sm:w-24 sm:h-24 object-cover" src="https://picsum.photos/500/800" alt="Product Image">
                            <div class="flex-1">
                                <div class="text-lg sm:text-base font-semibold text-gray-800 mb-1">Product Name</div>
                                <div class="flex items-center gap-4 mb-2">
                                    <div class="text-lg sm:text-base font-bold text-gray-900">₹456
                                        <del class="text-gray-500 text-sm ml-2">₹1400</del>
                                    </div>
                                    <span class="text-green-600 font-medium">62% off</span>
                                </div>
                                <div class="text-sm text-gray-600 flex items-center space-x-2 sm:space-x-4">
                                    <a href="#" class="bg-gray-200 text-lg px-3 py-1">-</a>
                                    <span class="text-lg font-medium">2</span>
                                    <a href="#" class="bg-gray-200 text-lg px-3 py-1">+</a>
                                </div>
                            </div>
                        </div>
                        <button class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <!-- Loop ends here for wishlist -->
        
                </div>
        
            </div>
        </div>
        

    </div>
@endsection
