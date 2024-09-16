<div class="">
    <!-- Promo Code Input -->
    <div class="mb-4">
        <input 
            type="text" 
            wire:model="promoCode" 
            placeholder="Enter promo code"
            class="w-full p-2 border border-gray-300 rounded"
        >
    </div>
    
    <div class="mb-4">
        <button 
            wire:click="applyPromoCode" 
            class="w-full mt-2 bg-black text-white py-2 rounded hover:bg-gray-800 transition-colors">
            Apply
        </button>
    </div>

    <!-- Success or Error Message -->
    @if (session()->has('success'))
        <div class="mb-4 p-3 bg-green-50 text-green-700 border border-green-200 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if ($errorMessage)
        <div class="mb-4 p-3 bg-red-50 text-red-700 border border-red-200 rounded-lg">
            {{ $errorMessage }}
        </div>
    @endif

    <!-- Discount Display -->
    @if ($isCouponApplied)
        <div class="mt-6 p-4 bg-white border border-gray-300 rounded-lg shadow-sm">
            <p class="text-sm text-gray-600">Discount Applied:</p>
            <p class="text-lg font-bold text-gray-800">₹{{ number_format($discountAmount, 2) }}</p>
        </div>
    @endif
</div>
