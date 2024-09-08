@extends('public.layout')

@section('title')
cart
@endsection

@section('content')

<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row gap-8">

        <!-- Cart Items Section -->
        <div class="flex-1">
            <h2 class="text-4xl font-bold mb-6">Your Cart</h2>

            <!-- Cart Item -->
            <div class="flex items-center justify-between bg-white p-4 lg:py-10 rounded-lg shadow-md mb-4">
                <div class="flex items-center">
                    <img src="https://via.placeholder.com/80" alt="Product Image" class="w-20 h-20 object-cover rounded-lg">
                    <div class="ml-4">
                        <p class="font-semibold">Gradient Graphic T-shirt</p>
                        <p class="text-sm text-gray-500">Size: Large</p>
                        <p class="text-sm text-gray-500">Color: White</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <p class="font-bold mr-4">$145</p>
                    <div class="flex items-center">
                        <button class="px-2 py-1 bg-gray-200 rounded">-</button>
                        <span class="mx-2">1</span>
                        <button class="px-2 py-1 bg-gray-200 rounded">+</button>
                    </div>
                </div>
            </div>

            <!-- Cart Item -->
            <div class="flex items-center justify-between bg-white p-4 lg:py-10 rounded-lg shadow-md mb-4">
                <div class="flex items-center">
                    <img src="https://via.placeholder.com/80" alt="Product Image" class="w-20 h-20 object-cover rounded-lg">
                    <div class="ml-4">
                        <p class="font-semibold">Checkered Shirt</p>
                        <p class="text-sm text-gray-500">Size: Medium</p>
                        <p class="text-sm text-gray-500">Color: Red</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <p class="font-bold mr-4">$180</p>
                    <div class="flex items-center">
                        <button class="px-2 py-1 bg-gray-200 rounded">-</button>
                        <span class="mx-2">1</span>
                        <button class="px-2 py-1 bg-gray-200 rounded">+</button>
                    </div>
                </div>
            </div>

            <!-- Cart Item -->
            <div class="flex items-center justify-between bg-white p-4 lg:py-10 rounded-lg shadow-md mb-4">
                <div class="flex items-center">
                    <img src="https://via.placeholder.com/80" alt="Product Image" class="w-20 h-20 object-cover rounded-lg">
                    <div class="ml-4">
                        <p class="font-semibold">Skinny Fit Jeans</p>
                        <p class="text-sm text-gray-500">Size: Large</p>
                        <p class="text-sm text-gray-500">Color: Blue</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <p class="font-bold mr-4">$240</p>
                    <div class="flex items-center">
                        <button class="px-2 py-1 bg-gray-200 rounded">-</button>
                        <span class="mx-2">1</span>
                        <button class="px-2 py-1 bg-gray-200 rounded">+</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Summary Section -->
        <div class="w-full lg:w-1/3">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-6">Order Summary</h3>
                <div class="flex justify-between mb-2">
                    <span>Subtotal</span>
                    <span>$565</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span>Discount (20%)</span>
                    <span class="text-red-500">-$113</span>
                </div>
                <div class="flex justify-between mb-4">
                    <span>Delivery Fee</span>
                    <span>$15</span>
                </div>
                <div class="flex justify-between font-bold text-xl mb-6">
                    <span>Total</span>
                    <span>$467</span>
                </div>

                <!-- Promo Code Input -->
                <div class="mb-6">
                    <input type="text" placeholder="Add promo code" class="w-full p-2 border border-gray-300 rounded">
                    <button class="w-full mt-2 bg-black text-white py-2 rounded">Apply</button>
                </div>

                <!-- Checkout Button -->
                <button class="w-full bg-black text-white py-3 rounded-lg font-bold">Go to Checkout</button>
            </div>
        </div>

    </div>
</div>

@endsection