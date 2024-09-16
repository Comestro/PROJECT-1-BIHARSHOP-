<div class="bg-white p-4 sm:p-6 rounded-md shadow-lg max-w-full  sm:max-w-4xl mx-auto "> <!-- Title and Add Address Button -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
        <h2 class="text-xl sm:text-2xl font-semibold text-gray-800 ">Manage Addresses</h2>
        <button wire:click="toggleAddress" class="flex items-center text-blue-600 font-medium hover:text-blue-800 mt-4 sm:mt-0">
            <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTIiIGhlaWdodD0iMTIiIHZpZXdCb3g9IjAgMCAxMiAxMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGZpbGw9IiMyMTc1RkYiIGQ9Ik0xMS4yNSA2Ljc1aC00LjV2NC41aC0xLjV2LTQuNUguNzV2LTEuNWg0LjVWLjc1aDEuNXY0LjVoNC41Ii8+PHBhdGggZD0iTS0zLTNoMTh2MThILTMiLz48L2c+PC9zdmc+" alt="Add Icon" class="h-4 w-4 mr-2">ADD NEW ADDRESS
        </button>
    </div>

    <div class="space-y-4 sm:space-y-6">
        @foreach($addresses as $address)
        <div class="border border-gray-300 p-4 sm:p-6 rounded-lg shadow-sm bg-white">
            <div class="flex justify-between items-center">
                <a href="#"
                    class="text-xs sm:text-sm font-medium text-gray-500 bg-slate-100 px-2 sm:px-3 py-1 rounded-md hover:bg-slate-200 transition">
                    {{$address->address_type}}
                </a>
                <img class="h-5 sm:h-6 w-5 sm:w-6 cursor-pointer"
                    src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjE2IiB2aWV3Qm94PSIwIDAgNCAxNiI+CiAgICA8ZyBmaWxsPSIjODc4Nzg3IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPgogICAgICAgIDxjaXJjbGUgY3g9IjIiIGN5PSIyIiByPSIyIi8+CiAgICAgICAgPGNpcmNsZSBjeD0iMiIgY3k9IjgiIHI9IjIiLz4KICAgICAgICA8Y2lyY2xlIGN4PSIyIiBjeT0iMTQiIHI9IjIiLz4KICAgIDwvZz4KPC9zdmc+Cg=="
                    alt="Address Icon">
            </div>

            <div class="mt-4">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between">
                    <div>
                        <p class="text-lg font-bold text-gray-900">{{$address->name}}</p>
                        <p class="text-gray-600 text-md">{{$address->phone}}, {{$address->alt_phone}}</p>
                    </div>
                </div>

                <p class="text-gray-600 mt-4 text-sm sm:text-md leading-relaxed">
                    {{$address->landmark}}, {{$address->area}}, {{$address->address_line}}, {{$address->city}}, {{$address->state}}-<span
                        class="font-semibold">{{$address->postal_code}}</span>
                </p>
            </div>
        </div>
        @endforeach

        <!-- Add more addresses similarly -->
        @if ($showAddress==true)
        <div class="max-w-3xl mx-auto p-6 bg-white  items-start shadow-lg rounded-lg mt-10">
            <!-- Add a New Address -->
            <h2 class="text-xl font-semibold mb-4">ADD A NEW ADDRESS</h2>

            <!-- Current Location Button -->
            <button
                class="w-full bg-blue-500 text-white py-2 rounded-lg flex items-center justify-center mb-4 hover:bg-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 2C8.13 2 5 5.13 5 9c0 1.73.56 3.32 1.51 4.58l-2.2 4.76a1 1 0 00.89 1.45h13.8a1 1 0 00.89-1.45l-2.2-4.76A7.978 7.978 0 0019 9c0-3.87-3.13-7-7-7z" />
                </svg>
                Use my current location
            </button>

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
                        <option value="">Select</option>
                        <option value="Bihar">Bihar</option>
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
        </div>
        @endif
    </div>


</div>