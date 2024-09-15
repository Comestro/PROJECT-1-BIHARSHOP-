@extends('public.layout')

@section('title')
cart
@endsection

@section('content')

<div class="container mx-auto  py-8 px-[5%]">
    <div class="flex flex-col lg:flex-row gap-8 ">

        <!-- Cart Items Section -->
        <livewire:order.cart />


        <!-- Order Summary Section -->
        <div class="w-full lg:w-1/3">
            <div class="bg-white p-6 rounded-lg space-y-3 md:space-y-4 shadow-md">
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