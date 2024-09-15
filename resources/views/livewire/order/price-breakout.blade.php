<div>
    <h3 class="text-xl font-bold mb-6">Order Summary</h3>

    <!-- Subtotal -->
    <div class="flex justify-between mb-2">
        <span>Subtotal</span>
        <span>₹{{ number_format($subtotal, 2) }}</span>
    </div>

    <!-- Discount -->
    <div class="flex justify-between mb-2">
        <span>Discount ({{ $discountPercentage }}%)</span>
        <span class="text-green-500">- ₹{{ number_format(($subtotal * $discountPercentage) / 100, 2) }}</span>
    </div>

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
