@extends('users.layout')

@section('title')
    Membership
@endsection

@section('content')
    <div class="flex items-center justify-center h-[100vh] bg-gradient-to-r from-blue-50 to-indigo-100">

        <div class="max-w-sm mx-auto bg-white border border-yellow-300 rounded-xl shadow-2xl p-6 transform transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-2xl">
            <div class="flex items-center space-x-4">
                <div class="bg-yellow-100 p-4 rounded-full shadow-lg transform transition-all duration-300 ease-in-out hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m9 4V5a2 2 0 00-2-2H5a2 2 0 00-2 2v16l4-4h14a2 2 0 002-2z" />
                    </svg>
                </div>
                <div class="text-left">
                    <h2 class="text-xl font-semibold text-yellow-600">Verification Pending</h2>
                    <p class="text-gray-600 mt-2 text-sm">Your account verification is in progress. Please check back later or contact support for more details.</p>
                </div>
            </div>            
        </div>
    </div>
@endsection
