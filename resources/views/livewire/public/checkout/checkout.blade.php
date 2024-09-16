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
                <p class="font-semibold">{{ $order->user->name }} <span class="text-sm text-gray-500">{{ $order->user->email }}</span></p>
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
                <!-- Show the selected address if it exists -->
                @if ($selectedAddress)
                    <div class="my-5">
                        <div>
                            <p class="font-semibold">{{ $selectedAddress->name }}<span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded ml-2">{{ $selectedAddress->address_type }}</span></p>
                            <p class="text-sm text-gray-600">{{ $selectedAddress->phone }}</p>
                            <p class="text-sm text-gray-600">{{ $selectedAddress->area }}, {{ $selectedAddress->address_line }}, {{ $selectedAddress->landmark }}, {{ $selectedAddress->street }}, {{ $selectedAddress->city }}, {{ $selectedAddress->state }} - <span class="font-semibold">{{ $selectedAddress->postal_code }}</span></p>
                        </div>
                    </div>
                @else
                    <!-- Show the address selection form if no address is selected -->
                    <form wire:submit.prevent="updateAddressId">
                        @foreach ($address as $add)
                            <div class="my-5">
                                <div class="flex items-center space-y-3 space-x-4">
                                    <input type="radio" wire:model.live="addressId" value="{{ $add->id }}" name="address" class="w-4 h-4 text-blue-500 focus:ring-blue-500">
                                    <div>
                                        <p class="font-semibold">{{ $add->name }}<span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded ml-2">{{ $add->address_type }}</span></p>
                                        <p class="text-sm text-gray-600">{{ $add->phone }}</p>
                                        <p class="text-sm text-gray-600">{{ $add->area }}, {{ $add->address_line }}, {{ $add->landmark }}, {{ $add->street }}, {{ $add->city }}, {{ $add->state }} - <span class="font-semibold">{{ $add->postal_code }}</span></p>
                                    </div>
                                </div>
                                
                                <!-- Conditionally render the submit button below the selected address -->
                                @if ($addressId == $add->id)
                                    <div class="mt-4">
                                        <input type="submit" value="Submit" class="px-4 py-2 bg-blue-500 text-white rounded">
                                    </div>
                                @endif

                                <div class="border border-slate-100 border-b-0 mt-1 mx-3"></div>
                            </div>
                        @endforeach
                    </form>
                @endif

                @if (session()->has('message'))
                    <div class="text-red-500">
                        {{ session('message') }}
                    </div>
                @endif
            </div>

            <!-- Button to Add a New Address -->
            <button wire:click="toggleAddress" class="mt-2 text-blue-500 text-center">+ Add a new address</button>
            @if ($showAddress == true)
                <!-- Your existing form to add a new address goes here -->
            @endif
        </div>

        <!-- Order Summary and Payment Options go here -->

    </div>
    <div class="w-full lg:w-1/3">
        <div class="bg-white p-6 rounded-lg space-y-3 md:space-y-4 shadow-md">
            <livewire:order.price-breakout />
            <button class="w-full bg-black text-white py-3 rounded-lg font-bold">Proceed to Payment</button>
        </div>
    </div>
</div>
