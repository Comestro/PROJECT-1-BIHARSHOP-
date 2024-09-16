@extends('users.layout')
@section('title', 'my-profile')

@section('content')

<!-- Main Content Area -->
<div class="flex flex-wrap lg:flex-nowrap p-6">
    <!-- Sidebar -->
    <livewire:user.user-sidebar />

    <!-- Main Content -->
    @auth
    <div class="flex-1 w-full sm:px-4 gap-4"> <!-- Adjusted padding here -->
        <div class="bg-white px-5 lg:px-8 py-4 rounded-lg shadow-md"> <!-- Adjusted padding here -->
            <!-- Personal Information Section -->
            <div class="flex justify-between items-center mb-6">
                <span class="text-2xl font-semibold">Personal Information</span>
            </div>

           <livewire:user.edit-user/>


           
                     
            <!-- Mobile Section -->
            <!-- FAQs (hidden on mobile, visible on larger screens) -->
            <div class="hidden sm:block bg-gray-100 p-4 rounded-lg mb-6 mt-5">
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
                    <button
                        class="text-blue-500 hover:underline">Manage Addresses</button>
                </div>

                @if (Auth::user()->addresses->isEmpty())
                <p class="text-gray-700">No addresses found.</p>
                @else
                @foreach (Auth::user()->addresses as $address)
                <p class="text-gray-700">
                    <span class="block">{{ $address->city }}</span>
                    <span class="block">{{ $address->state }}
                        <span class="block">{{ $address->postal_code }}</span>
                </p>
                @endforeach
                @endif
            </div>


            <!-- Password & Security Section -->
            <div class="mb-6">
                <div class="flex justify-between items-center mb-4">
                    {{-- <livewire:user-password-update /> --}}
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
    @endauth
</div>

@endsection