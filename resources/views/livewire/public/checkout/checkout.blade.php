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
              
                @if ($selectedAddress)
                    <button class="text-blue-500 hover:underline" wire:click="changeAddressToggle">Change</button>
                @endif
               
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
                                <div class="flex items-center bg-white p-5 space-y-3 space-x-4">
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

               
            </div>

            <!-- Button to Add a New Address -->
            <button wire:click="toggleAddress" class="mt-2 text-blue-500 text-center">+ Add a new address</button>
            @if ($showAddress == true)
                <!-- Your existing form to add a new address goes here -->
                      <!-- Form Fields -->
        <form wire:submit.prevent="store" method="POST">
            <div class="grid grid-cols-2 gap-4 mb-4">
                <input type="text" wire:model="name" name="name" placeholder="Name"
                    class="col-span-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('name')
                    <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                @enderror

                <input type="tel" wire:model="phone" name="phone" placeholder="10-digit mobile number"
                    class="col-span-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('phone')
                    <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                @enderror
                <input type="text" placeholder="Area" wire:model="area" name="area"
                    class="col-span-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                <input type="text" placeholder="Landmark" wire:model="landmark" name="landmark"
                    class="col-span-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('landmark')
                    <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                @enderror

                <textarea placeholder="Address (Area and Street)" rows="3" wire:model="address_line" name="address_line"
                    class="col-span-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required></textarea>
                @error('address_line')
                    <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                @enderror

                <input type="text" placeholder="City/District/Town" wire:model="city" name="city"
                    class="col-span-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>

                <select wire:model="state" name="state"
                    class="col-span-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Select</option >
                    <option value="Bihar">Bihar</option >
                </select>
                @error('state')
                    <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                @enderror

                <input type="number" placeholder="Pincode" wire:model="postal_code" name="postal_code"
                    class="col-span-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('postal_code')
                    <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                @enderror


                <input type="text" placeholder="Alternate Phone (Optional)" wire:model="alt_phone" name="alt_phone"
                    class="col-span-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex items-center space-x-4 mb-4">
                <label class="flex items-center space-x-2">
                    <input type="radio" wire:model="address_type" name="address_type" value="Home"
                        class="w-4 h-4 text-blue-500 focus:ring-blue-500">
                    <span>Home</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="radio" wire:model="address_type" name="address_type" value="Work"
                        class="w-4 h-4 text-blue-500 focus:ring-blue-500">
                    <span>Work</span>
                </label>
            </div>

            <div class="flex space-x-4">
                <button type="submit"
                    class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">SAVE</button>
                {{-- <button type="button"
                    class="w-full bg-gray-200 text-gray-600 py-2 rounded-lg hover:bg-gray-300">CANCEL</button> --}}
            </div>
        </form>
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
