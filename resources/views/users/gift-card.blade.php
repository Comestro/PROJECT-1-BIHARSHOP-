@extends('users.layout')
@section('title')
Gift Page
@endsection
@section('content')

<!-- Main Content Area -->
<div class="flex flex-wrap lg:flex-nowrap p-4 lg:p-6 space-y-4 lg:space-y-0 lg:space-x-6">

    <!-- Sidebar -->
    <x-user-navbar/>

    <!-- Main Content -->
    <div class="flex-1 sm:px-4 lg:px-5">
        <div class="bg-white p-4 sm:p-6 rounded-lg shadow-lg">

            <div class="w-full lg:w-9/12 mx-auto">
                <div class=" p-4 lg:p-5">

                    <div class="max-w-full sm:max-w-md mx-auto bg-gray-50 p-6 sm:p-8 rounded-lg shadow-lg border border-gray-200">
                        <h1 class="text-xl sm:text-2xl font-bold mb-6 text-center text-gray-700">BiharShop Gift Card</h1>

                        <form action="#" method="POST">
                            <!-- Grid Layout for Form Fields -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <!-- Receiver Email -->
                                <div class="mb-4">
                                    <label for="receiverEmail" class="block text-gray-600 text-sm font-semibold mb-2">Receiver’s Email ID *</label>
                                    <input type="email" id="receiverEmail" name="receiverEmail" 
                                        class="shadow-sm appearance-none border border-gray-300 rounded-md w-full py-3 px-4 text-gray-700 leading-tight focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                        required>
                                </div>

                                <!-- Receiver Name -->
                                <div class="mb-4">
                                    <label for="receiverName" class="block text-gray-600 text-sm font-semibold mb-2">Receiver’s Name *</label>
                                    <input type="text" id="receiverName" name="receiverName" 
                                        class="shadow-sm appearance-none border border-gray-300 rounded-md w-full py-3 px-4 text-gray-700 leading-tight focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                        required>
                                </div>

                                <!-- Card Value -->
                                <div class="mb-4">
                                    <label for="cardValue" class="block text-gray-600 text-sm font-semibold mb-2">Card Value in ₹</label>
                                    <select id="cardValue" name="cardValue" 
                                        class="shadow-sm appearance-none border border-gray-300 rounded-md w-full py-3 px-4 text-gray-700 leading-tight focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="100">₹100</option>
                                        <option value="500">₹500</option>
                                        <option value="1000">₹1000</option>
                                        <option value="5000">₹5000</option>
                                    </select>
                                </div>

                                <!-- Number of Cards -->
                                <div class="mb-4">
                                    <label for="noOfCards" class="block text-gray-600 text-sm font-semibold mb-2">No of Cards</label>
                                    <input type="number" id="noOfCards" name="noOfCards" 
                                        class="shadow-sm appearance-none border border-gray-300 rounded-md w-full py-3 px-4 text-gray-700 leading-tight focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                        min="1" value="1">
                                </div>

                                <!-- Gifter Name -->
                                <div class="mb-4">
                                    <label for="gifterName" class="block text-gray-600 text-sm font-semibold mb-2">Gifter’s Name (Optional)</label>
                                    <input type="text" id="gifterName" name="gifterName" 
                                        class="shadow-sm appearance-none border border-gray-300 rounded-md w-full py-3 px-4 text-gray-700 leading-tight focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <!-- Message -->
                                <div class="mb-4 lg:col-span-2">
                                    <label for="message" class="block text-gray-600 text-sm font-semibold mb-2">Write a message (Optional, 100 characters)</label>
                                    <textarea id="message" name="message" 
                                        class="shadow-sm appearance-none border border-gray-300 rounded-md w-full py-3 px-4 text-gray-700 leading-tight focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                        rows="3" maxlength="100"></textarea>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                                <button type="submit" 
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-md w-full sm:w-auto focus:outline-none focus:ring-2 focus:ring-blue-500">Buy Gift Card</button>
                                <button type="button" 
                                    class="text-blue-500 hover:text-blue-700 font-semibold py-3 px-6 w-full sm:w-auto">Buy Another Gift Card</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
