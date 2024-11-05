@extends('users.layout')
@section('title')
    Membership
@endsection
@section('content')
    <div class="flex flex-wrap  lg:flex-nowrap p-6">

        <div class="max-w-sm mx-auto bg-white border border-yellow-300 rounded-lg shadow-md p-6">
            <div class="flex items-center space-x-4">
                <div class="bg-yellow-100 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m9 4V5a2 2 0 00-2-2H5a2 2 0 00-2 2v16l4-4h14a2 2 0 002-2z" />
                    </svg>
                </div>
                <div class="text-left">
                    <h2 class="text-xl font-semibold text-yellow-600">Verification Pending</h2>
                    <p class="text-gray-600 mt-1">Your account verification is in progress. Please check back later or
                        contact support for more details.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
