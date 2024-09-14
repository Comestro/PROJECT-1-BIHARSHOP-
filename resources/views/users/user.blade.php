@extends('users.layout')
@section('title', 'my-profile')

@section('content')

    <!-- Main Content Area -->
    <div class="flex flex-wrap lg:flex-nowrap p-6">
        <!-- Sidebar -->
      <x-user-navbar/>

        <!-- Main Content -->
        <div class="flex-1 w-full sm:px-4 gap-4"> <!-- Adjusted padding here -->
            <div class="bg-white px-5 lg:px-8 py-4 rounded-lg shadow-md"> <!-- Adjusted padding here -->
                <!-- Personal Information Section -->
                <div class="flex justify-between items-center mb-6">
                    <span class="text-2xl font-semibold">Personal Information</span>
                    <button class="text-blue-500 hover:underline">Edit</button>
                </div>
                <form>
                    <div class="flex flex-col gap-4 lg:flex-row lg:space-x-6 mb-6">
                        <div class="flex-1 mb-4 lg:mb-0">
                            <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" id="firstName" name="firstName"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                required autocomplete="name" value="Saurav">
                        </div>
                        <div class="flex-1">
                            <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input type="text" id="lastName" name="lastName"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                autocomplete="name" value="Itachi">
                        </div>
                    </div>

                    <!-- Gender -->
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
                </form>

                <!-- Email Section -->
                <div class="mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-semibold">Email Address</span>
                        <button  class="text-blue-500 hover:underline">Edit</button>
                    </div>
                    <form>
                        <input type="email" name="email"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                            autocomplete="email" required value="">
                    </form>
                </div>

                <!-- Mobile Section -->
                <div class="mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-semibold">Mobile Number</span>
                        <button class="text-blue-500 hover:underline">Edit</button>
                    </div>
                    <form>
                        <input type="tel" name="mobileNumber"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                            autocomplete="tel" required value="+919117442498">
                    </form>
                </div>

                <!-- FAQs (hidden on mobile, visible on larger screens) -->
                <div class="hidden sm:block bg-gray-100 p-4 rounded-lg mb-6">
                    <div class="text-lg font-semibold mb-2">FAQs</div>
                    <div class="space-y-4">
                        <div>
                            <h4 class="text-md font-medium text-gray-900">What happens when I update my email address (or
                                mobile number)?</h4>
                            <p class="text-gray-700">Your login email id (or mobile number) changes, likewise. You'll
                                receive all account-related communication on your updated email address (or mobile
                                number).</p>
                        </div>
                        <div>
                            <h4 class="text-md font-medium text-gray-900">When will my BiharShop account be updated with
                                the new email address (or mobile number)?</h4>
                            <p class="text-gray-700">It happens as soon as you confirm the verification code sent to
                                your email (or mobile) and save the changes.</p>
                        </div>
                    </div>
                </div>

                <!-- Address Section -->
                <div class="mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-semibold">Address</span>
                        <button wire:navigate onclick="location.href='{{ route('user.address') }}'" class="text-blue-500 hover:underline">Manage Addresses</button>
                    </div>
                    <p class="text-gray-700">
                        <span class="block">Noida</span>
                        <span>UP, India</span>
                    </p>
                </div>

                <!-- Password & Security Section -->
                <div class="mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-semibold">Password & Security</span>
                        <button class="text-blue-500 hover:underline">Edit</button>
                    </div>
                </div>

                <!-- Deactivate Account Section -->
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-semibold">Deactivate Account</span>
                        <button class="text-blue-500 hover:underline">Deactivate</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
