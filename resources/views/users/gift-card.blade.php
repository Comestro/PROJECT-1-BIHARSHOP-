@extends('users.layout')
@section('title')

Gift Page

@endsection
@section('content')

    <!-- Main Content Area -->
    <div class="flex p-5 space-x-6">

        <!-- Sidebar -->
        <div class="w-64 xl:w-1/4 lg:mr-6">
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

                <!-- Navigation Links -->
                <nav class="flex flex-col flex-grow">
                    <a href="#personal-info"
                        class="block py-3 px-4 rounded-md text-center bg-blue-600 text-white font-semibold mb-2 hover:bg-blue-700">Personal
                        Information</a>
                    <a href="#orders" class="block py-3 px-4 rounded-md text-center text-gray-700 mb-2 hover:bg-gray-100">My
                        Orders</a>
                    <a href="#addresses"
                        class="block py-3 px-4 rounded-md text-center text-gray-700 mb-2 hover:bg-gray-100">Saved
                        Addresses</a>
                    <a href="#payment"
                        class="block py-3 px-4 rounded-md text-center text-gray-700 mb-2 hover:bg-gray-100">Payment
                        Methods</a>
                    <a href="{{ route('user.my-coupon') }}"
                        class="block py-3 px-4 rounded-md text-center text-gray-700 mb-2 hover:bg-gray-100">My Coupons</a>
                    <a href="{{ route('user.wishlist') }}"
                        class="block py-3 px-4 rounded-md text-center text-gray-700 mb-2 hover:bg-gray-100">My Wishlist</a>
                    <a href="#logout"
                        class="block py-3 px-4 rounded-md text-center text-red-600 hover:bg-gray-100">Logout</a>
                </nav>
            </aside>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-4">
            <div class="bg-white p-6 rounded-lg shadow-md">

                <div class="w-9/12">
                    <div class="container mx-auto p-5">

                        <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
                            <h1 class="text-2xl font-bold mb-4 text-center">Flipkart Gift Card</h1>

                            <form action="#" method="POST">
                                <div class="mb-4">
                                    <label for="receiverEmail" class="block text-gray-700 text-sm font-bold mb-2">Receiver’s
                                        Email ID *</label>
                                    <input type="email" id="receiverEmail" name="receiverEmail"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        required>
                                </div>

                                <div class="mb-4">
                                    <label for="receiverName" class="block text-gray-700 text-sm font-bold mb-2">Receiver’s
                                        Name *</label>
                                    <input type="text" id="receiverName" name="receiverName"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        required>
                                </div>

                                <div class="mb-4">
                                    <label for="cardValue" class="block text-gray-700 text-sm font-bold mb-2">Card Value in
                                        ₹</label>
                                    <select id="cardValue" name="cardValue"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        <option value="100">100</option>
                                        <option value="500">500</option>
                                        <option value="1000">1000</option>
                                        <option value="5000">5000</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="noOfCards" class="block text-gray-700 text-sm font-bold mb-2">No of
                                        Cards</label>
                                    <input type="number" id="noOfCards" name="noOfCards"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        min="1" value="1">
                                </div>

                                <div class="mb-4">
                                    <label for="gifterName" class="block text-gray-700 text-sm font-bold mb-2">Gifter’s Name
                                        (Optional)</label>
                                    <input type="text" id="gifterName" name="gifterName"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>

                                <div class="mb-4">
                                    <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Write a message
                                        (Optional, 100 characters)</label>
                                    <textarea id="message" name="message"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        rows="3" maxlength="100"></textarea>
                                </div>

                                <div class="flex justify-between items-center">
                                    <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Buy
                                        Gift Card</button>
                                    <button type="button" class="text-blue-500 hover:text-blue-700 font-bold">Buy Another
                                        Gift Card</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
