<?php

namespace App\Livewire\Order;

use App\Models\Coupon;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PriceBreakout extends Component
{
    public $orders;
    public $subtotal = 0;
    public $discountPercentage = 20; // Default discount percentage
    public $deliveryFee = 15; // Example delivery fee
    public $total = 0;
    public $promoCode;
    public $discountAmount = 0;
    public $isCouponApplied = false;

    public $couponPrice = 0; // Fixed typo here from couponPirce to couponPrice
    public $errorMessage = '';

    public function mount(Order $orders)
    {
        $this->orders = $orders;
        $this->calculateSummary();
    }

    public function applyPromoCode()
    {
        $this->validate([
            'promoCode' => 'required|string',
        ]);

        $user = Auth::user();
        $coupon = Coupon::where('code', $this->promoCode)->first();

        if ($coupon) {
            if ($user->coupons->contains($coupon)) {
                $this->errorMessage = 'You have already used this promo code.';
                $this->isCouponApplied = false;
                $this->couponPrice = 0; // Reset coupon discount if already applied
            } else {
                $this->isCouponApplied = true;
                $this->couponPrice = $this->calculateDiscount($coupon); // Store the coupon discount separately
                $user->coupons()->attach($coupon);
                session()->flash('success', 'Promo code applied successfully!');
                $this->errorMessage = '';
                $this->calculateSummary(); // Recalculate the summary to include the discount
            }
        } else {
            $this->isCouponApplied = false;
            $this->couponPrice = 0; // Reset coupon price on invalid coupon
            $this->errorMessage = 'Invalid promo code.';
        }
    }

    private function calculateDiscount($coupon)
    {
        $originalPrice = $this->subtotal;

        if ($coupon->discount_type === 'fixed') {
            return $coupon->discount_value;
        } elseif ($coupon->discount_type === 'percentage') {
            return ($coupon->discount_value / 100) * $originalPrice;
        }

        return 0;
    }

    public function calculateSummary()
    {
        // Calculate subtotal based on order items
        $this->subtotal = $this->orders->orderItems->sum(function ($item) {
            return $item->products->discount_price * $item->quantity;
        });

        // Calculate general store discount
        $this->discountAmount = ($this->subtotal * $this->discountPercentage) / 100;

        // Calculate total by applying both general and coupon discounts
        $this->total = $this->subtotal - $this->discountAmount - $this->couponPrice + $this->deliveryFee;
    }

    public function render()
    {
        return view('livewire.order.price-breakout');
    }
}
