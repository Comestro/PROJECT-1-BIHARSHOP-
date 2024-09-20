<div class="w-full md:px-[5%] p-4 bg-slate-100 shadow-lg rounded-lg mt-10 md:mt-0 flex flex-col lg:flex-row">
    <div class="w-full lg:w-2/3 px-0 lg:px-10">
        <!-- Login Section -->
        <div class="mb-4 bg-white px-5 py-2 border-slate-200 border ">
            <div class="flex justify-between gap-3  items-center">
                <div class="flex items-center space-x-2">
                    <span
                        class="bg-zinc-800 self-start text-white rounded-full w-6 h-6 flex justify-center items-center">1</span>
                </div>
                <div class="flex-1 flex flex-col">
                    <h3 class="text-md font-semibold flex gap-1 items-center">LOGIN
                        <svg class="w-6 h-6 text-green-500 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.6" d="M5 11.917 9.724 16.5 19 7.5" />
                        </svg>

                    </h3>
                    <p class="font-semibold text-black text-sm">{{ $order->user->name }}
                        <span class="text-sm text-gray-400">{{ $order->user->email }}</span>
                    </p>
                </div>

                <button class=" border border-grey-900 text-gray-900 bg-white text-lg  px-5 py-1">Change</button>
            </div>

        </div>

        <!-- Delivery Address Section -->
        <div class="">
            <div
                class="flex justify-between bg-white border-slate-200 border  px-5 py-2 {{ !$selectedAddress ? 'bg-gray-700  text-white' : '' }} items-center">
                <div class="flex items-start gap-3">
                    <span
                        class="bg-zinc-800 text-white rounded-full w-6 h-6 mt-2 flex justify-center items-center">2</span>
                    <div class="flex flex-1 flex-col">
                        <h3 class="text-md font-semibold flex items-center gap-2">DELIVERY ADDRESS

                            @if ($selectedAddress)
                                <svg class="w-6 h-6 text-green-500 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.6" d="M5 11.917 9.724 16.5 19 7.5" />
                                </svg>
                            @endif
                        </h3>
                        @if ($selectedAddress)
                            <div class="">
                                <div>
                                    <p class="font-semibold mb-1">{{ $selectedAddress->name }}<span
                                            class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded ml-2">{{ $selectedAddress->address_type }}</span>
                                        {{ $selectedAddress->phone }}
                                    </p>
                                    <p class="text-sm text-gray-600">{{ $selectedAddress->area }},
                                        {{ $selectedAddress->address_line }}, {{ $selectedAddress->landmark }},
                                        {{ $selectedAddress->street }}, {{ $selectedAddress->city }},
                                        {{ $selectedAddress->state }} - <span
                                            class="font-semibold">{{ $selectedAddress->postal_code }}</span>
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                @if ($selectedAddress)
                    <button class=" border border-grey-900 text-gray-900 text-lg bg-white  px-5 py-1"
                        wire:click="changeAddressToggle">Change</button>
                @endif

            </div>
            <div class="py-1e relative">
                <!-- Show the selected address if it exists -->
                @if (!$selectedAddress)
                    <!-- Show the address selection form if no address is selected -->
                    <form wire:submit.prevent="updateAddressId" class="bg-white ">
                        @foreach ($address as $add)
                            <label for="add{{ $add->id }}"
                                class="p-3 flex items-center cursor-pointer justify-between {{ $addressId == $add->id ? 'bg-blue-100' : 'bg-white' }} transition-colors duration-200 space-x-4">
                                <div class="flex gap-3 items-center">
                                    <input type="radio" wire:model.live="addressId" value="{{ $add->id }}"
                                        id="add{{ $add->id }}" name="address"
                                        class="w-4 h-4 text-slate-500 focus:ring-slate-500">
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

                                <div class="mt-4 ml-10 flex justify-start">
                                    @if ($addressId == $add->id)
                                        <input type="submit" value="deliver Here"
                                            class="px-4 py-3 cursor-pointer bg-zinc-800 text-slate-100 text-xl uppercase">
                                    @endif
                                </div>
                                <!-- Conditionally render the submit button below the selected address -->


                            </label>
                        @endforeach
                    </form>
                @endif

                <div role="status" wire:loading class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
                    <svg aria-hidden="true" class="size-12 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="currentColor" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentFill" />
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

            <!-- Button to Add a New Address -->

            @if (!$selectedAddress)
                <div
                    class="flex {{ $showAddress ? 'bg-gray-700  text-white' : 'bg-white text-gray-900' }}  mt-3 border-slate-200 border   font-semibold px-4 py-3 items-center">
                    <button wire:click="toggleAddress" class="">+ Add a new address</button>
                </div>
            @endif
            @if ($showAddress == true && !$selectedAddress)
                <div class="p-5 bg-white">
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
                                    <input type="radio" wire:model="address_type" name="address_type"
                                        value="Home" class="w-4 h-4 text-slate-500 focus:ring-slate-500">
                                    <span>Home</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="radio" wire:model="address_type" name="address_type"
                                        value="Work" class="w-4 h-4 text-slate-500 focus:ring-slate-500">
                                    <span>Work</span>
                                </label>
                            </div>
                        </div>

                        <div class="flex space-x-4">
                            <button type="submit"
                                class="w-full bg-zinc-950 text-white py-2 rounded-lg hover:bg-zinc-800">SAVE</button>
                        </div>
                    </form>
                </div>
            @endif
            @if ($selectedAddress && !$showAddress)
                <div x-data="{ showPayment: false, showSummary: true }">
                    <livewire:order.order-summary />
                    <div class="my-1 mt-3 border border-slate-200 px-5 py-2 bg-white " x-show="!showSummary">
                        <div class="flex justify-between items-center">
                            <div class="flex flex-1 items-center justify-between space-x-2">
                                <span class=" rounded-full w-6 h-6 flex justify-center text-slate-100 bg-zinc-800 items-center">3</span>
                                <div class="flex flex-col flex-1">
                                    <h3 class="text-md font-semibold flex items-center gap-2">ORDER SUMMARY
                                        <svg class="w-6 h-6 text-green-500 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.6" d="M5 11.917 9.724 16.5 19 7.5" />
                                </svg>
                                    </h3>

                                    <div class=" rounded-lg">
                                        <div class=" flex flex-col gap-5 divide-y">
                                            {{ $order->orderItems->count() }} Items
                                        </div>
                                    </div>
                                </div>
                                <div class="" @click="showPayment = false, showSummary = true">
                                    <button
                                        class="border border-grey-900 text-gray-900 text-lg bg-white  px-5 py-1">Change</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show="showPayment">
                        <livewire:order.payment :orders="$order" />
                    </div>

                </div>
            @endif
        </div>

    </div>

    <div class="w-full lg:w-1/3">
        <div class="bg-white p-6 border border-slate-200">
            <livewire:order.price-breakout :orders="$order" />
        </div>

    </div>

    <!-- Sidebar for Order Summary -->


</div>
