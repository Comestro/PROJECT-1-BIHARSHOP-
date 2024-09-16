<div>
    <!-- Apply Promo Code Form -->
    <input type="text" wire:model="promoCode" placeholder="Enter promo code" class="w-full p-2 border border-gray-300 rounded">
    <button wire:click="applyPromoCode" class="w-full mt-2 bg-black text-white py-2 rounded hover:bg-gray-800 transition-colors">Apply</button>

    @if($errorMessage)
        <div class="bg-red-500 text-white p-2 mt-2">
            {{ $errorMessage }}
        </div>
    @endif

    @if(session()->has('success'))
        <div class="bg-green-500 text-white p-2 mt-2">
            {{ session('success') }}
        </div>
    @endif

    <h3 class="text-xl font-bold mb-6">Order Summary</h3>

    <!-- Subtotal -->
    <div class="flex justify-between mb-2">
        <span>Subtotal</span>
        <span>₹{{ number_format($subtotal, 2) }}</span>
    </div>

    <!-- Discount -->
    <div class="flex justify-between mb-2">
        <span>Discount</span>
        <span class="text-green-500">- ₹{{ number_format($discountAmount, 2) }}</span>
    </div>

    <!-- Promo Code Applied -->
    @if($isCouponApplied)
        <div class="flex justify-between mb-4">
            <span>Promo Code Applied</span>
            <span>₹{{ number_format($couponPrice, 2) }}</span>
        </div>
    @endif

    <!-- Delivery Fee -->
    <div class="flex justify-between mb-4">
        <span>Delivery Fee</span>
        <span>₹{{ number_format($deliveryFee, 2) }}</span>
    </div>

    <!-- Total -->
    <div class="flex justify-between font-bold text-xl mb-6">
        <span>Total</span>
        <span>₹{{ number_format($total, 2) }}</span>
    </div>
</div>
