@extends('public.layout')

@section('title')
cart
@endsection

@section('content')

<div class="container mx-auto  py-8 px-[5%]">
    <div class="flex flex-col lg:flex-row gap-8 ">

        <!-- Cart Items Section -->
        <div class="flex-1">
            <h2 class="text-4xl font-bold mb-6">Your Cart</h2>


            <!-- Cart Item -->
      

            <!-- Cart Item -->
            <div class="flex items-center justify-between bg-white p-5 lg:py-10 rounded-lg shadow-md mb-4">

                <div class="flex items-center">

                    <img src="https://via.placeholder.com/80" alt="Product Image" class="w-20 h-20 object-cover rounded-lg">
                    <div class="ml-4">
                        <p class="font-semibold">Gradient Graphic T-shirt</p>
                        <p class="text-sm text-gray-500">Size: Large</p>
                        <p class="text-sm text-gray-500">Color: White</p>
                    </div>
                </div>
                <div class="flex flex-col gap-10 ">
                    <div class="flex justify-end ">
                        <a href="" class="text-red-600 text-xs"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </a>
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
            </div>

            <!-- Cart Item -->
            <div class="flex items-center justify-between bg-white p-5 lg:py-10 rounded-lg shadow-md mb-4">

                <div class="flex items-center">

                    <img src="https://via.placeholder.com/80" alt="Product Image" class="w-20 h-20 object-cover rounded-lg">
                    <div class="ml-4">
                        <p class="font-semibold">Gradient Graphic T-shirt</p>
                        <p class="text-sm text-gray-500">Size: Large</p>
                        <p class="text-sm text-gray-500">Color: White</p>
                    </div>
                </div>
                <div class="flex flex-col gap-10 ">
                    <div class="flex justify-end ">
                        <a href="" class="text-red-600 text-xs"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </a>
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
            </div>

            <!-- Cart Item -->
            <div class="flex items-center justify-between bg-white p-5 lg:py-10 rounded-lg shadow-md mb-4">

                <div class="flex items-center">

                    <img src="https://via.placeholder.com/80" alt="Product Image" class="w-20 h-20 object-cover rounded-lg">
                    <div class="ml-4">
                        <p class="font-semibold">Gradient Graphic T-shirt</p>
                        <p class="text-sm text-gray-500">Size: Large</p>
                        <p class="text-sm text-gray-500">Color: White</p>
                    </div>
                </div>
                <div class="flex flex-col gap-10 ">
                    <div class="flex justify-end ">
                        <a href="" class="text-red-600 text-xs"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </a>
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
            </div>

        </div>

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