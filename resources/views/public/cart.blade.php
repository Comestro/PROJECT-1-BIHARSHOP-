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

                <livewire:order.price-breakout />
                
                <div class="mb-6">
                    <input type="text" placeholder="Add promo code" class="w-full p-2 border border-gray-300 rounded">
                    <button class="w-full mt-2 bg-black text-white py-2 rounded">Apply</button>
                </div>

                <button class="w-full bg-black text-white py-3 rounded-lg font-bold">Go to Checkout</button>
            </div>
        </div>

    </div>
</div>

@endsection