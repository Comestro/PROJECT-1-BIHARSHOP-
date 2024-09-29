<div class="h-screen bg-gradient-to-r from-blue-50 to-gray-100 flex items-center justify-center">
    <div class="bg-white p-10 rounded-xl shadow-2xl max-w-lg w-full text-center animate-pop-up mb-24 transform scale-105 hover:scale-110 transition-transform duration-500">
        <div class="flex justify-center mb-6">
            <div class="w-20 h-20 bg-gradient-to-r from-green-100 to-green-200 rounded-full flex items-center justify-center shadow-md">
                <svg class="w-14 h-14 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4"></path>
                </svg>
            </div>
        </div>

        <h2 class="text-3xl font-bold mt-4 text-gray-800 animate-slide-in-up">🎉 Payment Successful!</h2>
        <p class="text-gray-600 mt-3 text-lg animate-slide-in-up">
            Thank you for your purchase! Your transaction was completed successfully.
        </p>

        <div class="mt-8 flex justify-center space-x-6 animate-slide-in-up">
            <a href="{{ route('user.my-order') }}">
                <button
                    class="px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg shadow-lg hover:bg-green-700 transition duration-300 ease-in-out transform hover:scale-105">
                    View Order
                </button>
            </a>
            <a href="{{ route('index') }}">
                <button
                    class="px-6 py-3 bg-gradient-to-r from-gray-500 to-gray-600 text-white rounded-lg shadow-lg hover:bg-gray-700 transition duration-300 ease-in-out transform hover:scale-105">
                    Go to Homepage
                </button>
            </a>
        </div>
    </div>
</div>
