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
}
