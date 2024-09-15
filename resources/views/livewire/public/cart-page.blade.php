<div class="min-h-screen flex flex-col">
    <div class="w-full py-8 px-[5%] ">
        <h2 class="text-4xl font-semobold mb-6">Your Cart</h2>
        <hr class="mb-3">
    </div>
    <div class="flex flex-col lg:flex-row gap-8 ">

        <div class=" w-full mx-auto  py-8 px-[5%]">
            <div class="flex flex-col lg:flex-row gap-8 ">
                <!-- Cart Items Section -->
                @guest
                    <!-- Not Logged In Message -->
                    <div class="w-full lg:w-full bg-white p-6 justify-center flex flex-col items-center rounded-lg shadow-md">
                        <h3 class="text-2xl font-bold mb-4">Missing Cart items?</h3>
                        <p>Login to see the items you added previously</p>
                        <a href="{{ route('login') }}" class="mt-4 inline-block bg-black text-white py-2 px-4 rounded">Login</a>
                    </div>
                @else
                    <div class="flex flex-col w-full gap-4 lg:w-2/3">
                        <!-- Check if order has data -->
                        @if ($order && $order->orderItems->count())
                            <!-- Cart Items Section -->
                            <livewire:order.cart :orders="$order" />
                        @else
                            <!-- Empty Cart Message -->
                            <div class="w-full bg-white p-6 rounded-lg shadow-md">
                                <h3 class="text-2xl font-bold mb-4">Your cart is empty!</h3>
                                <p>It looks like you haven't added any items to your cart yet.</p>
                                <a href="{{ route('index') }}"
                                    class="mt-4 inline-block bg-black text-white py-2 px-4 rounded">Go to
                                    Shop</a>
                            </div>
                        @endif
                    </div>

                    <!-- Order Summary Section -->
                    @if ($order && $order->orderItems->count())
                        <div class="w-full lg:w-1/3">
                            <div class="bg-white p-6 rounded-lg space-y-3 md:space-y-4 shadow-md ">

                                <livewire:order.price-breakout :orders="$order" />

                                <div class="mb-6">
                                    <input type="text" placeholder="Add promo code"
                                        class="w-full p-2 border border-gray-300 rounded">
                                    <button class="w-full mt-2 bg-black text-white py-2 rounded">Apply</button>
                                </div>


                                <button class="w-full bg-black text-white py-3 rounded-lg font-bold">Go to Checkout</button>
                            </div>
                            <!-- Check if user is authenticated -->
                        </div>
                    @endif
                @endguest

                <!-- Order Summary Section -->

            </div>
        </div>
    </div>
</div>
