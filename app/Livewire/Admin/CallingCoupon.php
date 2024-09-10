<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;
class CallingCoupon extends Component
{
    public function render()
    {
        $data['coupons'] = Coupon::all();
        return view('livewire.admin.calling-coupon', $data)
            ->layout('livewire.layouts.base'); // Verify this path
    }
    
    public function toggleStatus($couponId)
    {
        $coupon = Coupon::find($couponId);
        $coupon->status = !$coupon->status;
        $coupon->save();
    
        session()->flash('success', 'Coupon status updated successfully.');
    }
}
