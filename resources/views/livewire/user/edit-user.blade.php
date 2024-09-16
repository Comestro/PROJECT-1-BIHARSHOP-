<div><div>
    <!-- Form with Display-Only Fields -->
    <form>
        <div class="flex flex-col gap-4 lg:flex-row lg:space-x-6 mb-6">
            <div class="flex-1 mb-4 lg:mb-0">
                <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" id="firstName" name="firstName"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                    required autocomplete="name" disabled value="{{ Auth::user()->name }}">
            </div>
            <div class="flex-1">
                <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" id="lastName" name="lastName"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                    autocomplete="name" disabled value="">
            </div>
        </div>
        <!-- Trigger modal button -->
        <button type="button" wire:click="openModal" class="text-red-500 hover:underline">Edit</button>
    </form>

    <!-- Modal for Editing Information -->
    @if ($isOpen)
    <div class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <!-- Modal panel -->
            <div
                class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Edit Profile</h3>

                <!-- Modal Form for Editing Profile -->
                <form wire:submit.prevent="updateProfile">
                    <div class="flex flex-col gap-4 mb-6">
                        <!-- First Name Input -->
                        <div class="flex-1 mb-4">
                            <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" id="firstName" name="firstName" wire:model="firstName"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                required autocomplete="name">
                            @error('firstName')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Last Name Input -->
                        <div class="flex-1">
                            <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input type="text" id="lastName" name="lastName" wire:model="lastName"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                autocomplete="name">
                            @error('lastName')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Modal Actions -->
                    <div class="flex justify-end">
                        <button type="button" wire:click="closeModal"
                            class="mr-4 bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-md">Cancel</button>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-md">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    <!-- Flash message for success -->
    @if (session()->has('message'))
    <div class="text-green-500 mt-2">{{ session('message') }}</div>
    @endif
</div>
</div>