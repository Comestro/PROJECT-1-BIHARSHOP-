<div wire:click="addAddress" class="max-w-2xl mx-auto p-8 bg-white shadow-xl rounded-lg mt-10">
    <!-- Add a New Address -->
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Add a New Address</h2>

    <!-- Current Location Button -->
    <button
        class="w-full bg-gradient-to-r from-blue-500 to-indigo-500 text-white py-3 rounded-lg flex items-center justify-center mb-6 hover:from-blue-600 hover:to-indigo-600 shadow-md">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
            class="w-6 h-6 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 2C8.13 2 5 5.13 5 9c0 1.73.56 3.32 1.51 4.58l-2.2 4.76a1 1 0 00.89 1.45h13.8a1 1 0 00.89-1.45l-2.2-4.76A7.978 7.978 0 0019 9c0-3.87-3.13-7-7-7z" />
        </svg>
        Use my current location
    </button>

    <!-- Form Fields -->
    <form wire:submit.prevent="store" method="POST">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
            <input type="text" wire:model="name" name="name" placeholder="Full Name"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
            @error('name')
                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
            @enderror

            <input type="tel" wire:model="phone" name="phone" placeholder="10-digit mobile number"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
            @error('phone')
                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
            @enderror

            <input type="text" placeholder="Area" wire:model="area" name="area"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

            <input type="text" placeholder="Landmark" wire:model="landmark" name="landmark"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
            @error('landmark')
                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
            @enderror

            <textarea placeholder="Address (Area and Street)" rows="3" wire:model="address_line" name="address_line"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required></textarea>
            @error('address_line')
                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
            @enderror

            <input type="text" placeholder="City/District/Town" wire:model="city" name="city"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>

            <select wire:model="state" name="state"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
                <option value="">Select State</option>
                <option value="Bihar">Bihar</option>
            </select>
            @error('state')
                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
            @enderror

            <input type="number" placeholder="Pincode" wire:model="postal_code" name="postal_code"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
            @error('postal_code')
                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
            @enderror

            <input type="text" placeholder="Alternate Phone (Optional)" wire:model="alt_phone" name="alt_phone"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Address Type -->
        <div class="flex items-center space-x-6 mb-6">
            <label class="flex items-center space-x-3">
                <input type="radio" wire:model="address_type" name="address_type" value="Home"
                    class="w-5 h-5 text-blue-500 focus:ring-blue-500">
                <span class="text-lg">Home</span>
            </label>
            <label class="flex items-center space-x-3">
                <input type="radio" wire:model="address_type" name="address_type" value="Work"
                    class="w-5 h-5 text-blue-500 focus:ring-blue-500">
                <span class="text-lg">Work</span>
            </label>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-between space-x-4">
            <button type="submit"
                class="w-full bg-gradient-to-r from-blue-500 to-indigo-500 text-white py-3 rounded-lg hover:from-blue-600 hover:to-indigo-600 shadow-lg">
                Save Address
            </button>
        </div>
    </form>
</div>
