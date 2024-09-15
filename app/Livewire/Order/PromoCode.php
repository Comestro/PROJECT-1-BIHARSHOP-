<?php

namespace App\Livewire\Order;

use App\Models\Coupon; 
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PromoCode extends Component
{
    public $promoCode;           
    public $isCouponApplied = false; 
    public $errorMessage;       
    public $discountAmount = 0; 

    public function mount()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
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
                $this->discountAmount = 0;
            } else {
                $this->isCouponApplied = true; 
                $this->discountAmount = $this->calculateDiscount($coupon);
                $user->coupons()->attach($coupon);
                session()->flash('success', 'Promo code applied successfully!');
            }
        } else {
            $this->isCouponApplied = false; 
            $this->discountAmount = 0;
            $this->errorMessage = 'Invalid promo code.';
        }
    }

    private function calculateDiscount($coupon)
    {
        $originalPrice = 100; 
        if ($coupon->discount_type === 'fixed') {
            return $coupon->discount_value;
        } elseif ($coupon->discount_type === 'percentage') {
            return ($coupon->discount_value / 100) * $originalPrice;
        }
        return 0;
    }

    public function render()
    {
        return view('livewire.order.promo-code', [
            'isAuthenticated' => Auth::check(),
        ]);
    }
}
