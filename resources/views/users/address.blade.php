@extends('users.layout')
@section('title')

Address Page

@endsection
@section('content')
    <div class="flex p-5">
        <div class="w-64 xl:w-1/4 lg:mr-6">
            <aside class="bg-white shadow-md rounded-lg p-6 flex flex-col">
                <div class="flex flex-col items-center border-b pb-6 mb-6">
                    <!-- Avatar -->
                    <div class="w-24 h-24 rounded-full overflow-hidden bg-gray-200">
                        <img src="https://via.placeholder.com/150" alt="User Avatar" class="w-full h-full object-cover">
                    </div>

                    <!-- User Info -->
                    <div class="mt-4 text-center">
                        <h2 class="text-2xl font-semibold text-gray-800">Saurav</h2>
                        <p class="text-gray-500 text-sm">Hello!</p>
                    </div>
                </div>

                <!-- Navigation Links -->
                <nav class="flex flex-col flex-grow">
                    <a href="#personal-info"
                        class="block py-3 px-4 rounded-md text-center bg-blue-600 text-white font-semibold mb-2 hover:bg-blue-700">Personal
                        Information</a>
                    <a href="/user/my-order"
                        class="block py-3 px-4 rounded-md text-center text-gray-700 mb-2 hover:bg-gray-100">My
                        Orders</a>
                    <a href="user/address"
                        class="block py-3 px-4 rounded-md text-center text-gray-700 mb-2 hover:bg-gray-100">Saved
                        Addresses</a>
                    <a href="#payment"
                        class="block py-3 px-4 rounded-md text-center text-gray-700 mb-2 hover:bg-gray-100">Payment
                        Methods</a>
                    <a href="#wishlist"
                        class="block py-3 px-4 rounded-md text-center text-gray-700 mb-2 hover:bg-gray-100">Wishlist</a>
                    <a href="#logout"
                        class="block py-3 px-4 rounded-md text-center text-red-600 hover:bg-gray-100">Logout</a>
                </nav>
            </aside>
        </div>
        <div class="flex-1">
            <div class="bg-white p-6 rounded-md shadow-lg max-w-4xl mx-auto">
                <!-- Title and Add Address Button -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Manage Addresses</h2>
                    <button class="flex items-center text-blue-600 font-medium hover:text-blue-800">
                        <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTIiIGhlaWdodD0iMTIiIHZpZXdCb3g9IjAgMCAxMiAxMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGZpbGw9IiMyMTc1RkYiIGQ9Ik0xMS4yNSA2Ljc1aC00LjV2NC41aC0xLjV2LTQuNUguNzV2LTEuNWg0LjVWLjc1aDEuNXY0LjVoNC41Ii8+PHBhdGggZD0iTS0zLTNoMTh2MThILTMiLz48L2c+PC9zdmc+"
                            alt="Add Icon" class="h-4 w-4 mr-2">
                        ADD NEW ADDRESS
                    </button>
                </div>

                <!-- Address List -->
                <div class="space-y-6">
                    <div class="border border-gray-300 p-6 rounded-lg shadow-sm bg-white">
                        <div class="flex justify-between items-center">
                            <a href="#"
                                class="text-sm font-medium text-gray-500 bg-slate-100 px-3 py-1 rounded-md hover:bg-slate-200 transition">
                                Home
                            </a>
                            <img class="h-6 w-6 cursor-pointer"
                                src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjE2IiB2aWV3Qm94PSIwIDAgNCAxNiI+CiAgICA8ZyBmaWxsPSIjODc4Nzg3IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPgogICAgICAgIDxjaXJjbGUgY3g9IjIiIGN5PSIyIiByPSIyIi8+CiAgICAgICAgPGNpcmNsZSBjeD0iMiIgY3k9IjgiIHI9IjIiLz4KICAgICAgICA8Y2lyY2xlIGN4PSIyIiBjeT0iMTQiIHI9IjIiLz4KICAgIDwvZz4KPC9zdmc+Cg=="
                                alt="Address Icon">
                        </div>

                        <div class="mt-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-lg font-bold text-gray-900">Saurav Kumar</p>
                                    <p class="text-gray-600 text-md">9117442498</p>
                                </div>
                            </div>

                            <p class="text-gray-600 mt-4 text-md leading-relaxed">
                                Purnea, Prabhat colony, donor chowk, Durga mandir, Purnia, Bihar - <span
                                    class="font-semibold">854304</span>
                            </p>
                        </div>
                    </div>



                    <!-- Add more addresses similarly -->
                </div>
            </div>

        </div>

    </div>
@endsection
