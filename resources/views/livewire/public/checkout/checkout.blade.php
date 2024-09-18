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
                <button class="hover:underline bg-black text-white text-sm rounded-md px-3 py-1.5">Change</button>
            </div>
            <div class="mt-2 p-2 bg-slate-50 py-3">
                <p class="font-semibold ">{{ $order->user->name }} <span
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
                <button class=" hover:underline bg-black text-white text-sm rounded-md px-3 py-1.5" wire:click="changeAddressToggle">Change</button>
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
                                class="font-semibold">{{ $selectedAddress->postal_code }}</span>
                        </p>
                    </div>
                </div>
                @else
                <!-- Show the address selection form if no address is selected -->
                <form wire:submit.prevent="updateAddressId">
                    @foreach ($address as $add)
                    <div class="my-5">
                        <div class="flex items-center bg-white p-5 space-y-3 space-x-4">
                            <input type="radio" wire:model.live="addressId" value="{{ $add->id }}"
                                name="address" class="w-4 h-4 text-slate-500 focus:ring-slate-500">
                            <div>
                                <p class="font-semibold">{{ $add->name }}<span
                                        class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded ml-2">{{ $add->address_type }}</span>
                                </p>
                                <p class="text-sm text-gray-600">{{ $add->phone }}</p>
                                <p class="text-sm text-gray-600">{{ $add->area }},
                                    {{ $add->address_line }}, {{ $add->landmark }}, {{ $add->street }},
                                    {{ $add->city }}, {{ $add->state }} - <span
                                        class="font-semibold">{{ $add->postal_code }}</span>
                                </p>
                            </div>
                        </div>

                        <!-- Conditionally render the submit button below the selected address -->
                        @if ($addressId == $add->id)
                        <div class="mt-4">
                            <input type="submit" value="deliver Here"
                                class="px-4 py-1.5 bg-zinc-800 text-slate-100 rounded">
                        </div>
                        @endif

                        <div class="border border-slate-100 border-b-0 mt-1 mx-3"></div>
                    </div>
                    @endforeach
                </form>
                @endif
            </div>

            <!-- Button to Add a New Address -->
            <button wire:click="toggleAddress" class="mt-2 text-slate-500 text-center mb-4">+ Add a new address</button>
            @if ($showAddress == true)
            <!-- Form to add a new address -->
            <div class="p-2">
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

                    <div class="flex items-center space-x-4  mb-2">
                        <div class="flex items-center space-x-4 mb-2">
                            <label class="flex items-center space-x-2">
                                <input type="radio" wire:model="address_type" name="address_type" value="Home" class="custom-radio">
                                <span>Home</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" wire:model="address_type" name="address_type" value="Work" class="custom-radio">
                                <span>Work</span>
                            </label>
                        </div>



                        <!-- Add custom CSS -->
                        <style>
                            /* Hide the default radio button */
                            .custom-radio {
                                position: absolute;
                                opacity: 0;
                                cursor: pointer;
                            }

                            /* Create a custom radio button */
                            .flex.items-center {
                                position: relative;
                            }

                            /* Style for the custom radio button circle */
                            .custom-radio+span::before {
                                content: "";
                                display: inline-block;
                                width: 16px;
                                height: 16px;
                                border-radius: 50%;
                                border: 2px solid #000;
                                /* Black border */
                                background-color: #fff;
                                /* White background */
                                margin-right: 8px;
                                box-sizing: border-box;
                                transition: background-color 0.3s ease;
                            }

                            /* Style for the selected radio button */
                            .custom-radio:checked+span::before {
                                background-color: #000;
                                /* Black fill when selected */
                            }
                        </style>
                    </div>

                    <div class="flex space-x-4">
                        <button type="submit"
                            class="w-full bg-zinc-950 text-white py-2 rounded-lg hover:bg-zinc-800">SAVE</button>
                    </div>
                </form>
            </div>
            @endif
            @if($selectedAddress)
            <livewire:order.order-summary />
            <livewire:order.payment :orders="$order" />
            @endif
        </div>



        <!-- Order Summary and Payment Options go here -->
    </div>

    <div class="w-full lg:w-1/3">
        <div class="bg-white p-6 rounded-lg space-y-3 md:space-y-4 shadow-md">
            <livewire:order.price-breakout :orders="$order" />
            {{-- <livewire:order.payment :orders="$order" /> --}}
        </div>

    </div>

    <!-- Sidebar for Order Summary -->


</div>