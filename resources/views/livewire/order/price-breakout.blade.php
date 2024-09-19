<div>
    <!-- Apply Promo Code Form -->

    @if ($errorMessage)
        <div class="bg-red-500 text-white p-2">
            {{ $errorMessage }}
        </div>
    @endif

    @if (session()->has('success'))
        <div class="bg-green-500 text-white p-2">
            {{ session('success') }}
        </div>
    @endif

    <h3 class="text-xl font-bold mb-6">Order Summary</h3>

    <!-- Subtotal -->
    <div class="flex justify-between">
        <span>Subtotal</span>
        <span>₹{{ number_format($subtotal, 2) }}</span>
    </div>

    <!-- Discount -->
    <div class="flex justify-between">
        <span>Discount</span>
        <span class="text-green-500">- ₹{{ number_format($discountAmount, 2) }}</span>
    </div>

    <!-- Promo Code Applied -->

    @if ($isCouponApplied)
        <div class="flex justify-between">
            <span>Promo Code  <span class="font-semibold text-green-600">({{$orders->coupon->code }})</span> Applied</span>
            @if ($orders->coupon->discount_type == 'percentage')
            <span>₹{{ number_format($couponPrice, 2) }} ({{$orders->coupon->discount_value}}%)</span>
            @else
                <span class="text-green-600 font-semibold">₹{{ number_format($couponPrice, 2) }}</span>
            @endif
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
