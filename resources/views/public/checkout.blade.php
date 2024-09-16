@extends('public.layout')

@section('title')
    checkout
@endsection

@section('content')
    <div class="w-full mx-auto p-6 bg-white shadow-lg rounded-lg mt-10 flex">
        <div class="w-full lg:w-2/3 px-10">
            <!-- Login Section -->
            <div class="mb-4">
                <div class="flex justify-between items-center border-b pb-2">
                    <div class="flex items-center space-x-2">
                        <span class="bg-blue-500 text-white rounded-full w-6 h-6 flex justify-center items-center">1</span>
                        <h3 class="text-lg font-semibold">LOGIN</h3>
                    </div>
                    <button class="text-blue-500 hover:underline">CHANGE</button>
                </div>
                <div class="mt-2">
                    <p class="font-semibold">Roni Saha <span class="text-sm text-gray-500">+919128528958</span></p>
                </div>
            </div>

            <!-- Delivery Address Section -->
            <div class="mb-4">
                <div class="flex justify-between items-center border-b pb-2">
                    <div class="flex items-center space-x-2">
                        <span class="bg-blue-500 text-white rounded-full w-6 h-6 flex justify-center items-center">2</span>
                        <h3 class="text-lg font-semibold">DELIVERY ADDRESS</h3>
                    </div>
                    <button class="text-blue-500 hover:underline">EDIT</button>
                </div>
                <div class="mt-2 bg-gray-50 p-4 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <input type="radio" name="address" class="w-4 h-4 text-blue-500 focus:ring-blue-500">
                        <div>
                            <p class="font-semibold">Roni Saha <span
                                    class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded ml-2">HOME</span></p>
                            <p class="text-sm text-gray-600">9128528958</p>
                            <p class="text-sm text-gray-600">Near Mayor House, Shivnagar, Station Road, Khushkibagh, Purnia,
                                Bihar - <span class="font-semibold">854305</span></p>
                        </div>
                    </div>
                    <button class="mt-4 w-full bg-orange-500 text-white py-2 rounded-lg hover:bg-orange-600">DELIVER
                        HERE</button>
                </div>
                <a href="#" class="mt-2 text-blue-500 hover:underline inline-block">+ Add a new address</a>
            </div>

            <!-- Order Summary -->
            <div class="mb-4">
                <div class="flex items-center space-x-2 border-b pb-2">
                    <span class="bg-gray-300 text-gray-700 rounded-full w-6 h-6 flex justify-center items-center">3</span>
                    <h3 class="text-lg font-semibold">ORDER SUMMARY</h3>
                </div>
                <div class="mt-2">
                    <!-- Order items go here -->
                    <p class="text-gray-500">No items to show.</p>
                </div>
            </div>

            <!-- Payment Options -->
            <div>
                <div class="flex items-center space-x-2 border-b pb-2">
                    <span class="bg-gray-300 text-gray-700 rounded-full w-6 h-6 flex justify-center items-center">4</span>
                    <h3 class="text-lg font-semibold">PAYMENT OPTIONS</h3>
                </div>
                <div class="mt-2">
                    <!-- Payment options go here -->
                    <p class="text-gray-500">No payment options available.</p>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/3">
            <div class="bg-white p-6 rounded-lg space-y-3 md:space-y-4 shadow-md">

                <livewire:order.price-breakout />
                <livewire:order.payment />

           

            </div>
        </div>
    </div>
@endsection



