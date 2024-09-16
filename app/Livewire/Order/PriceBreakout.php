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
    public $discountPercentage = 20; // Default discount percentage (store-wide discount)
    public $deliveryFee = 15; // Example delivery fee
    public $total = 0;
    public $promoCode;
    public $discountAmount = 0;
    public $couponPrice = 0; 
    public $isCouponApplied = false;

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
                $this->couponPrice = 0;
            } else {
                $this->isCouponApplied = true;
                $this->couponPrice = $this->calculateCouponDiscount($coupon);
                $user->coupons()->attach($coupon);
                session()->flash('success', 'Promo code applied successfully!');
                $this->errorMessage = '';
                $this->calculateSummary(); // Recalculate to include coupon discount
            }
        } else {
            $this->isCouponApplied = false;
            $this->couponPrice = 0;
            $this->errorMessage = 'Invalid promo code.';
        }
    }

    private function calculateCouponDiscount($coupon)
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

        $this->subtotal = $this->orders->orderItems->sum(function ($item) {
            return $item->products->discount_price * $item->quantity;
        });

        $this->discountAmount = ($this->subtotal * $this->discountPercentage) / 100;

        $this->total = $this->subtotal - $this->discountAmount - $this->couponPrice + $this->deliveryFee;
    }

    public function render()
    {
        return view('livewire.order.price-breakout');
    }
}
