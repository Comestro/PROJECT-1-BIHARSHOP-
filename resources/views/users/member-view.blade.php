@extends('users.layout')
@section('title')
    Membership
@endsection
@section('content')
    <div class="flex flex-wrap  lg:flex-nowrap p-6">
        <livewire:user.user-sidebar />
        {{-- <div class="flex flex-1 h-auto sm:px-5">
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
    </div> --}}

        <div class="w-1/2 mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg h-96 ">
            <!-- Parent Node -->
            <div class="text-center mb-6">
                <div
                    class="inline-block px-8 py-3 bg-blue-600 hover:bg-blue-700 cursor-pointer text-white rounded-full shadow-lg">
                    <h2 class="font-bold text-lg">{{ $member->name }}</h2>
                    <p>Membership ID: {{ $member->membership_id }}</p>
                </div>
            </div>

            <!-- Vertical Connecting Line from Parent Node -->
            <div class="flex justify-center">
                <div class="h-20 w-1 bg-gray-400"></div>
            </div>

            <!-- Horizontal Connecting Line between Child Nodes -->
            <div class="flex justify-center ">
                <div class="w-full h-1 bg-gray-400 relative">
                    <div class="absolute left-1/4 transform -translate-x-1/2">
                        <div class="w-1 h-6 bg-gray-400"></div>
                    </div>
                    <div class="absolute left-3/4 transform -translate-x-1/2">
                        <div class="w-1 h-6 bg-gray-400"></div>
                    </div>
                </div>
            </div>

            <div class="flex justify-between items-center mt-10">
                @if($referals->count()!=0)
                @foreach($referals as $data)
                <div class="flex flex-col items-center">
                    <div
                        class="inline-block px-7 p-4 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-lg cursor-pointer">
                        <h2 class="font-semibold text-md text-center">{{ $data->name }}</h2>
                        <p class=" text-center">Membership ID: {{ $data->membership_id }}</p>
                    </div>
                </div>
                @endforeach
                @else
                <div class="flex mx-auto items-center">
                    <div
                        class="inline-block px-7 p-4 bg-red-500 hover:bg-red-600 text-white rounded-full shadow-lg cursor-pointer">
                        <h2 class="font-semibold text-md text-center">Not Found</h2>
                    </div>
                </div>
                @endif

               
            </div>
        </div>

    </div>
@endsection
