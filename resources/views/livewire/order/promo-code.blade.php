<div class="p-6 max-w-md mx-auto bg-gray-100 rounded-lg border border-gray-300 shadow-md">
    @if ($isAuthenticated)
        <!-- Promo Code Input -->
        <div class="mb-6">
            <input 
                type="text" 
                wire:model="promoCode" 
                placeholder="Enter promo code"
                class="w-full p-3 border border-gray-400 rounded-lg text-gray-700 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out"
            >
        </div>
        <div class="mb-6">
            <button 
                wire:click="applyPromoCode" 
                class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-150 ease-in-out"
            >
                Apply
            </button>
        </div>
    @else
        <!-- Redirecting message -->
        <p class="text-center text-gray-600">Please <a href="{{ route('login') }}" class="text-blue-500 hover:underline">log in</a> to apply a promo code.</p>
    @endif

    <!-- Success or Error Message -->
    @if (session()->has('success'))
        <div class="mb-6 p-3 bg-green-50 text-green-700 border border-green-200 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if ($errorMessage)
        <div class="mb-6 p-3 bg-red-50 text-red-700 border border-red-200 rounded-lg">
            {{ $errorMessage }}
        </div>
    @endif

    <!-- Discount Display -->
    @if ($isCouponApplied)
        <div class="mt-6 p-3 bg-white border border-gray-300 rounded-lg shadow-sm">
            <p class="text-sm text-gray-600">Discount Applied:</p>
            <p class="text-lg font-bold text-gray-800">${{ number_format($discountAmount, 2) }}</p>
        </div>
    @endif
</div>
