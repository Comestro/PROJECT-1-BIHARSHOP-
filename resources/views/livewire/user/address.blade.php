<div class="bg-white p-4 sm:p-6 rounded-lg shadow-lg w-full sm:max-w-4xl mx-auto">
    <!-- Title and Add Address Button -->
    <div class="flex flex-col sm:flex-row justify-between  items-center mb-6">
        <h2 class="text-xl sm:text-2xl font-semibold text-gray-800">Manage Addresses</h2>
        <button wire:click="toggleAddress" class="flex items-center text-blue-600 font-medium hover:text-blue-800 mt-4 sm:mt-0 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            Add New Address
        </button>
    </div>

    <!-- Address List -->
    <div class="space-y-4 sm:space-y-6">
        @foreach($addresses as $address)
        <div class="border border-gray-300 p-4 sm:p-6 rounded-lg shadow-sm bg-white">
            <div class="flex justify-between items-center">
                <a href="#"
                   class="text-xs sm:text-sm font-medium text-gray-500 bg-slate-100 px-2 sm:px-3 py-1 rounded-md hover:bg-slate-200 transition">
                   {{$address->address_type}}
                </a>
                
                <!-- Delete Button -->
                <button wire:click="deleteAddress({{ $address->id }})" class="text-red-500 hover:text-red-700 font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                      </svg>
                      
                </button>
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

        <!-- Add New Address Form -->
        @if ($showAddress)
        <div class="max-w-3xl mx-auto p-6 bg-gray-50 shadow-lg rounded-lg mt-8">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Add a New Address</h2>

            <!-- Current Location Button -->
            <button class="w-full bg-blue-500 text-white py-2 rounded-lg flex items-center justify-center mb-4 hover:bg-blue-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 2C8.13 2 5 5.13 5 9c0 1.73.56 3.32 1.51 4.58l-2.2 4.76a1 1 0 00.89 1.45h13.8a1 1 0 00.89-1.45l-2.2-4.76A7.978 7.978 0 0019 9c0-3.87-3.13-7-7-7z" />
                </svg>
                Use My Current Location
            </button>

            <!-- Address Form -->
            <form wire:submit.prevent="store" method="POST" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <input type="text" wire:model="name" name="name" placeholder="Name" class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror

                <input type="tel" wire:model="phone" name="phone" placeholder="10-digit Mobile Number" class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror

                <input type="text" wire:model="area" name="area" placeholder="Area" class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                <input type="text" wire:model="landmark" name="landmark" placeholder="Landmark" class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                @error('landmark') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror

                <textarea wire:model="address_line" name="address_line" placeholder="Address (Area and Street)" rows="3" class="col-span-2 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required></textarea>
                @error('address_line') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror

                <input type="text" wire:model="city" name="city" placeholder="City/District/Town" class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>

                <select wire:model="state" name="state" class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Select State</option>
                    <option value="Bihar">Bihar</option>
                </select>
                @error('state') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror

                <input type="number" wire:model="postal_code" name="postal_code" placeholder="Pincode" class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                @error('postal_code') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror

                <input type="text" wire:model="alt_phone" name="alt_phone" placeholder="Alternate Phone (Optional)" class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">

                <!-- Address Type -->
                <div class="col-span-2 mt-4">
                    <label class="flex items-center space-x-2">
                        <input type="radio" wire:model="address_type" name="address_type" value="Home" class="w-4 h-4 text-blue-500 focus:ring-blue-500">
                        <span>Home</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" wire:model="address_type" name="address_type" value="Work" class="w-4 h-4 text-blue-500 focus:ring-blue-500">
                        <span>Work</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="col-span-2 bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">Save Address</button>
            </form>
        </div>
        @endif
    </div>
</div>
