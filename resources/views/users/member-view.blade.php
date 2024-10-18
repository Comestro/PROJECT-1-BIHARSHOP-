@extends('users.layout')
@section('title')
    Membership
@endsection
@section('content')

<div class="flex flex-wrap  lg:flex-nowrap p-6">
    <livewire:user.user-sidebar />
    <div class="flex flex-1 h-auto sm:px-5">
        <div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
            <h1 class="text-3xl font-bold mb-6 text-center">Membership Information</h1>
    
            <!-- Full Name -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Full Name</label>
                <div class="bg-gray-100 p-2 rounded-lg border border-gray-300">
                    {{ $member->name }}
                </div>
            </div>
    
            <!-- Email Address -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Email Address</label>
                <div class="bg-gray-100 p-2 rounded-lg border border-gray-300">
                    {{ $member->email }}
                </div>
            </div>
    
            <!-- Phone Number -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Phone Number</label>
                <div class="bg-gray-100 p-2 rounded-lg border border-gray-300">
                    {{ $member->mobile }}
                </div>
            </div>
    
            <!-- Address -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Address</label>
                <div class="bg-gray-100 p-2 rounded-lg border border-gray-300">
                    {{ $member->home_address }}
                </div>
            </div>
    
            <!-- Membership Type -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Membership ID</label>
                <div class="bg-gray-100 p-2 rounded-lg border border-gray-300">
                    {{ $member->membership_id }}
                </div>
            </div>
    
            <!-- Join Date -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Join Date</label>
                <div class="bg-gray-100 p-2 rounded-lg border border-gray-300">
                    {{ $member->updated_at }}
                </div>
            </div>
    
        </div>
    </div>

</div>

    
@endsection
