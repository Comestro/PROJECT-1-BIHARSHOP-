<div>
    <!-- Form with Display-Only Fields -->
    <form class="space-y-6">
        <div class="flex justify-end">
            <button type="button" wire:click="openModal" class="text-blue-500 hover:text-blue-600 font-medium ">Edit</button>
        </div>

        <div class="flex flex-col lg:flex-row lg:space-x-6 space-y-4 lg:space-y-0">
            <div class="flex-1 mb-4">
                <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" id="firstName" name="firstName" wire:model="firstName"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                       required autocomplete="name">
                @error('firstName') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1">
                <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" id="lastName" name="lastName"
                    class="mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 focus:ring-opacity-50 disabled:bg-gray-100"
                    autocomplete="name" disabled value="">
            </div>
        </div>
        <div class="mb-6">
            <span class="block text-sm font-medium text-gray-700 mb-2">Your Gender</span>
            <div class="flex space-x-4">
                <label for="Male" class="flex items-center">
                    <input type="radio" id="Male" name="gender"
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <span class="ml-2 text-gray-700">Male</span>
                </label>
                <label for="Female" class="flex items-center">
                    <input type="radio" id="Female" name="gender"
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <span class="ml-2 text-gray-700">Female</span>
                </label>
            </div>
        </div>
        <div class="mb-6">
            <div class="flex justify-between items-center mb-4">
                <span class="text-lg font-semibold">Email Address</span>
            </div>
            <input type="email" name="email"
                class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                autocomplete="email" disabled required value="{{ Auth::user()->email }}">
        </div>
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

                            <!-- Email Input -->
                            <div class="flex-1 mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" id="email" name="email" wire:model="email"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                    required autocomplete="email">
                                @error('email')
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
