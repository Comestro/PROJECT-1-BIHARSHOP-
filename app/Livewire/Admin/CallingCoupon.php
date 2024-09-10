<?php

namespace App\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class CallingCoupon extends Component
{

    public $search = "";
    public function render()
    {
        $data['coupons'] = Coupon::where('code','LIKE',"%".$this->search."%")->get();
        return view('livewire.admin.calling-coupon',$data);
    }
    public function toggleStatus($couponId)
        {
            $coupon = Coupon::find($couponId);
            $coupon->status = !$coupon->status;
            $coupon->save();

            session()->flash('success', 'Coupon status updated successfully.');
        }
    
}
