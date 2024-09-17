<div
    class="w-full mx-auto p-6 bg-white shadow-lg rounded-lg mt-10 flex flex-col lg:flex-row space-y-6 lg:space-y-0 lg:space-x-6">
    <div class="w-full lg:w-2/3 px-4 lg:px-10">
        <!-- Login Section -->
        <div class="mb-4">
            <div class="flex justify-between bg-slate-100 p-2 items-center border-b pb-2">
                <div class="flex items-center space-x-2">
                    <span class="bg-zinc-800 text-white rounded-full w-6 h-6 flex justify-center items-center">1</span>
                    <h3 class="text-lg font-semibold">LOGIN</h3>
                </div>
                <button class="font-semibold hover:underline">CHANGE</button>
            </div>
            <div class="mt-2">
                <p class="font-semibold">{{ $order->user->name }} <span
                        class="text-sm text-gray-500">{{ $order->user->email }}</span></p>
            </div>
        </div>

        <!-- Delivery Address Section -->
        <div class="mb-4">
            <div class="flex justify-between bg-slate-100 items-center p-2 border-b pb-2">
                <div class="flex items-center  space-x-4">
                    <span class="bg-zinc-800 text-white rounded-full w-6 h-6 flex justify-center items-center">2</span>
                    <h3 class="text-lg font-semibold">DELIVERY ADDRESS</h3>
                </div>
                @if ($selectedAddress)
                    <button class="font-semibold hover:underline" wire:click="changeAddressToggle">Change</button>
                @endif

            </div>
            <div class="mt-2 bg-gray-50 px-3 py-2 ">
                <!-- Show the selected address if it exists -->
                @if ($selectedAddress)
                    <div class="my-5">
                        <div>
                            <p class="font-semibold">{{ $selectedAddress->name }}<span
                                    class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded ml-2">{{ $selectedAddress->address_type }}</span>
                            </p>
                            <p class="text-sm text-gray-600">{{ $selectedAddress->phone }}</p>
                            <p class="text-sm text-gray-600">{{ $selectedAddress->area }},
                                {{ $selectedAddress->address_line }}, {{ $selectedAddress->landmark }},
                                {{ $selectedAddress->street }}, {{ $selectedAddress->city }},
                                {{ $selectedAddress->state }} - <span
                                    class="font-semibold">{{ $selectedAddress->postal_code }}</span></p>
                        </div>
                    </div>

             @else
            <!-- Show the address selection form if no address is selected -->
            <form wire:submit.prevent="updateAddressId">
                @foreach ($address as $add)
                    <div class="my-5">
                        <div class="flex items-center bg-white p-5 space-y-3 space-x-4">
                            <input type="radio" wire:model.live="addressId" value="{{ $add->id }}"
                                name="address" class="w-4 h-4 text-blue-500 focus:ring-blue-500">
                            <div>
                                <p class="font-semibold">{{ $add->name }}<span
                                        class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded ml-2">{{ $add->address_type }}</span>
                                </p>
                                <p class="text-sm text-gray-600">{{ $add->phone }}</p>
                                <p class="text-sm text-gray-600">{{ $add->area }},
                                    {{ $add->address_line }}, {{ $add->landmark }}, {{ $add->street }},
                                    {{ $add->city }}, {{ $add->state }} - <span
                                        class="font-semibold">{{ $add->postal_code }}</span></p>
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

                    <!-- Conditionally render the submit button below the selected address -->
                    @if ($addressId == $add->id)
                        <div class="mt-4">
                            <input type="submit" value="Select Address"
                                class="px-3 py-2 bg-black text-sm text-white rounded">
                        </div>
                    @endif
                @endforeach
            </form>
            @endif
        </div>

        <!-- Button to Add a New Address -->
        <button wire:click="toggleAddress" class="mt-2 text-slate-500 text-center">+ Add a new address</button>
        @if ($showAddress == true)
            <!-- Form to add a new address -->
            <form wire:submit.prevent="store" method="POST">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <input type="text" wire:model="name" name="name" placeholder="Name"
                        class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-slate-500"
                        required>
                    @error('name')
                        <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                    @enderror

                    <input type="tel" wire:model="phone" name="phone" placeholder="10-digit mobile number"
                        class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-slate-500"
                        required>
                    @error('phone')
                        <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                    @enderror

                    <input type="text" placeholder="Area" wire:model="area" name="area"
                        class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-slate-500">

                    <input type="text" placeholder="Landmark" wire:model="landmark" name="landmark"
                        class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-slate-500"
                        required>
                    @error('landmark')
                        <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                    @enderror

                    <textarea placeholder="Address (Area and Street)" rows="3" wire:model="address_line" name="address_line"
                        class="col-span-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-slate-500"
                        required></textarea>
                    @error('address_line')
                        <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                    @enderror

                    <input type="text" placeholder="City/District/Town" wire:model="city" name="city"
                        class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-slate-500"
                        required>

                    <select wire:model="state" name="state"
                        class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-slate-500"
                        required>
                        <option value="">Select</option>
                        <option value="Bihar">Bihar</option>
                    </select>
                    @error('state')
                        <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                    @enderror

                    <input type="number" placeholder="Pincode" wire:model="postal_code" name="postal_code"
                        class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-slate-500"
                        required>
                    @error('postal_code')
                        <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                    @enderror

                    <input type="text" placeholder="Alternate Phone (Optional)" wire:model="alt_phone"
                        name="alt_phone"
                        class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-slate-500">
                </div>

                <div class="flex items-center space-x-4 mb-4">
                    <label class="flex items-center space-x-2">
                        <input type="radio" wire:model="address_type" name="address_type" value="Home"
                            class="w-4 h-4  focus:ring-slate-500">
                        <span>Home</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" wire:model="address_type" name="address_type" value="Work"
                            class="w-4 h-4  focus:ring-slate-500">
                        <span>Work</span>
                    </label>
                </div>  

                <div class="flex space-x-4">
                    <button type="submit"
                        class="w-full bg-zinc-950 text-white py-2 rounded-lg hover:bg-zinc-800">SAVE</button>
                </div>
            </form>
            @endif
            <livewire:order.order-summary />
            <livewire:order.payment :orders="$order" />
    </div>



    <!-- Order Summary and Payment Options go here -->
</div>

<div class="w-full lg:w-1/3">
    <div class="bg-white p-6 rounded-lg space-y-3 md:space-y-4 shadow-md">
        <livewire:order.price-breakout :orders="$order" />
        <livewire:order.payment :orders="$order" />
    </div>
    <div class="flex gap-2 mt-6 justify-center">
      <div class="mt-1">
      <svg  xmlns="http://www.w3.org/2000/svg" fill="none" class="w-10" viewBox="0 0 24 24" stroke-width="1.5" stroke="gray" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
        </svg>
      </div>
       <div class="flex flex-col font-bold text-lg">
       <p class="text-balance text-zinc-400">Safe and Secure Payment.easy return</p>
       <p class="text-balance text-zinc-400">100% Authentic products</p>
       </div>

    </div>
</div>

<!-- Sidebar for Order Summary -->


</div>
