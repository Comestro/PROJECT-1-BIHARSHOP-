<div class="bg-gray-100 flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg w-full text-center animate-pop-up">
        <div class="flex justify-center">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4"></path>
                </svg>
            </div>
        </div>

        <h2 class="text-2xl font-semibold mt-4 text-gray-800 animate-slide-in-up">Payment Successful!</h2>
        <p class="text-gray-600 mt-2 animate-slide-in-up">Thank you for your purchase. Your transaction was successful.
        </p>

        <div class="mt-6 flex justify-center space-x-4 animate-slide-in-up">
            <a href="{{route('user.my-order')}}">
            <button
                class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300 ease-in-out">
                View Order
            </button>
        </a>
            <a href="{{route('index')}}">
            <button
                class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-300 ease-in-out">
                Go to Homepage
            </button>
        </a>
        </div>
    </div>
</div>
