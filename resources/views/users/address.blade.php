@extends('users.layout')
@section('title')
    Address Page
@endsection
@section('content')
    <div class="flex flex-wrap lg:flex-nowrap p-6">
        <livewire:user.user-sidebar />
        <div class="flex-1 sm:px-5">
            <div class="bg-white p-4 sm:p-6 rounded-md shadow-lg max-w-full sm:max-w-4xl mx-auto">
                <!-- Title and Add Address Button -->
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                    <h2 class="text-xl sm:text-2xl font-semibold text-gray-800 ">Manage Addresses</h2>
                    <button class="flex items-center text-blue-600 font-medium hover:text-blue-800 mt-4 sm:mt-0">
                        <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTIiIGhlaWdodD0iMTIiIHZpZXdCb3g9IjAgMCAxMiAxMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGZpbGw9IiMyMTc1RkYiIGQ9Ik0xMS4yNSA2Ljc1aC00LjV2NC41aC0xLjV2LTQuNUguNzV2LTEuNWg0LjVWLjc1aDEuNXY0LjVoNC41Ii8+PHBhdGggZD0iTS0zLTNoMTh2MThILTMiLz48L2c+PC9zdmc+" alt="Add Icon" class="h-4 w-4 mr-2">ADD NEW ADDRESS
                    </button>
                </div>

                <!-- Address List -->
                
                <livewire:user.address/>
            </div>
        </div>

    </div>
@endsection
