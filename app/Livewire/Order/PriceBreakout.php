<?php

namespace App\Livewire\Order;

use App\Models\Coupon;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class PriceBreakout extends Component
{
    public $orders;
    public $subtotal = 0;
    public $discountPercentage = 20; // Default discount percentage (store-wide discount)
    public $deliveryFee = 15; // Example delivery fee
    public $total = 0;
    public $couponcode;
    public $discountAmount = 0;
    public $isCouponApplied=false;

    public $couponPrice = 0;
    public $errorMessage = '';

    public function mount(Order $orders)
    {
        $this->orders = $orders;
        $this->isCouponApplied = ($this->orders->coupon_code) ? true : false;
        $this->calculateSummary();
        $this->calculateCouponDiscount($this->orders->coupon);
        if($orders->coupon !== NULL){
            $this->couponPrice = $this->orders->coupon->discount_value;
        }
    }



    public function applyCoupon()
    {
        $this->validate([
            'couponcode' => 'required|string',
        ]);

        $CouponinOrder = Order::where('user_id',Auth::id())->where('coupon_code',$this->couponcode)->first();
        $coupon = Coupon::where('code', operator: $this->coupon)->first();

        if ($coupon) {
            if ($CouponinOrder)
            {
                
                $this->errorMessage = 'You have already used this coupon code.';
                $this->isCouponApplied = false;
                $this->couponPrice = 0;
            } 
            else
             {
                $this->isCouponApplied = true;
                $this->couponPrice = $this->calculateCouponDiscount($coupon);
                $CouponinOrder->coupons()->attach($coupon);

                // Store the coupon information in the session to persist after refresh
                session(['appliedCoupon' => $this->couponcode, 'couponPrice' => $this->couponPrice]);

                session()->flash('success', 'coupon code applied successfully!');
                $this->errorMessage = '';
                $this->calculateSummary(); // Recalculate to include coupon discount
            }
        } 
        else 
        {
            $this->isCouponApplied = false;
            $this->couponPrice = 0;
            $this->errorMessage = 'Invalid coupon code.';
            session()->forget(['appliedCoupon', 'couponPrice']); // Remove coupon from session if invalid
        }
    }

    private function calculateCouponDiscount($coupon)
    {
        if ($coupon !== null) {
            $originalPrice = $this->subtotal;
        
            if ($coupon->discount_type === 'fixed') {
                return $coupon->discount_value;
            } elseif ($coupon->discount_type === 'percentage') {
                return ($coupon->discount_value / 100) * $originalPrice;
            }
        } else {
            return null;
        }        
    }
   

    #[On('refreshPriceBreakdown')]
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
