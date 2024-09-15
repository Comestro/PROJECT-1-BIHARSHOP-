@extends('users.layout')
@section('title')
    Address Page
@endsection
@section('content')
    <div class="flex flex-wrap lg:flex-nowrap p-6">
    <livewire:user.user-sidebar/>
    <div class="flex-1 sm:px-5">
            <div class="bg-white p-4 sm:p-6 rounded-md shadow-lg max-w-full sm:max-w-4xl mx-auto">
                <!-- Title and Add Address Button -->
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                    <h2 class="text-xl sm:text-2xl font-semibold text-gray-800 ">Manage Addresses</h2>
                    <button class="flex items-center text-blue-600 font-medium hover:text-blue-800 mt-4 sm:mt-0">
                        <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTIiIGhlaWdodD0iMTIiIHZpZXdCb3g9IjAgMCAxMiAxMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGZpbGw9IiMyMTc1RkYiIGQ9Ik0xMS4yNSA2Ljc1aC00LjV2NC41aC0xLjV2LTQuNUguNzV2LTEuNWg0LjVWLjc1aDEuNXY0LjVoNC41Ii8+PHBhdGggZD0iTS0zLTNoMTh2MThILTMiLz48L2c+PC9zdmc+"
                            alt="Add Icon" class="h-4 w-4 mr-2">
                        ADD NEW ADDRESS
                    </button>
                </div>
        
                <!-- Address List -->
                <div class="space-y-4 sm:space-y-6">
                    <div class="border border-gray-300 p-4 sm:p-6 rounded-lg shadow-sm bg-white">
                        <div class="flex justify-between items-center">
                            <a href="#"
                                class="text-xs sm:text-sm font-medium text-gray-500 bg-slate-100 px-2 sm:px-3 py-1 rounded-md hover:bg-slate-200 transition">
                                Home
                            </a>
                            <img class="h-5 sm:h-6 w-5 sm:w-6 cursor-pointer"
                                src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjE2IiB2aWV3Qm94PSIwIDAgNCAxNiI+CiAgICA8ZyBmaWxsPSIjODc4Nzg3IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPgogICAgICAgIDxjaXJjbGUgY3g9IjIiIGN5PSIyIiByPSIyIi8+CiAgICAgICAgPGNpcmNsZSBjeD0iMiIgY3k9IjgiIHI9IjIiLz4KICAgICAgICA8Y2lyY2xlIGN4PSIyIiBjeT0iMTQiIHI9IjIiLz4KICAgIDwvZz4KPC9zdmc+Cg=="
                                alt="Address Icon">
                        </div>
        
                        <div class="mt-4">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between">
                                <div>
                                    <p class="text-lg font-bold text-gray-900">Saurav Kumar</p>
                                    <p class="text-gray-600 text-md">9117442498</p>
                                </div>
                            </div>
        
                            <p class="text-gray-600 mt-4 text-sm sm:text-md leading-relaxed">
                                Purnea, Prabhat colony, donor chowk, Durga mandir, Purnia, Bihar - <span class="font-semibold">854304</span>
                            </p>
                        </div>
                    </div>
        
                    <!-- Add more addresses similarly -->
                </div>
            </div>
        </div>
        
    </div>
@endsection
