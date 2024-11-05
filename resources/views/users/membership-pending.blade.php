@extends('users.layout')

@section('title')
    Membership Verification
@endsection

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-50 to-indigo-100 p-6">

        <div
            class="max-w-lg w-full mx-auto bg-white border border-yellow-300 rounded-xl shadow-2xl p-6 md:p-8 transform transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-xl">
            <div class="flex flex-col md:flex-row items-center space-y-6 md:space-y-0 md:space-x-6">
                <div
                    class="bg-yellow-200 p-5 rounded-full shadow-lg transform transition-all duration-300 ease-in-out hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-yellow-500" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m9 4V5a2 2 0 00-2-2H5a2 2 0 00-2 2v16l4-4h14a2 2 0 002-2z" />
                    </svg>
                </div>
                <div class="text-left">
                    <h2 class="text-2xl md:text-3xl font-bold text-yellow-600">Verification Pending</h2>
                    <p class="text-gray-600 text-sm md:text-base mt-2">
                        Your account is currently under review. We are verifying your details and will notify you once the
                        process is complete.
                    </p>
                    <p class="text-gray-600 text-sm md:text-base mt-2">
                        In the meantime, feel free to contact our support team if you need assistance or have any questions.
                    </p>
                    <div class="mt-6 flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">                        
                        <a href="/"
                            class="bg-yellow-500 text-white py-3 px-8 rounded-full shadow-md transform transition-all duration-300 hover:scale-105 hover:bg-yellow-600 text-center w-full md:w-auto">
                            Go to Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
