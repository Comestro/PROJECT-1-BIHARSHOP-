<?php

namespace App\Livewire\Order;

use App\Models\Coupon;
use App\Models\Order;
use GuzzleHttp\Promise\Create;
use Livewire\Component;
use Livewire\Volt\Compilers\Mount;




class CouponForm extends Component
{
    public $couponcode;
    public $order;

    public function mount(Order $orders)
    {
        $this->order=$orders;

        
    }


   public function applyCoupon(){

    
    $checkCoupon=Coupon::where('code',$this->couponcode)->first();

    if($checkCoupon){
        $checkCoupon->expiration_date =  new \DateTime($checkCoupon->expiration_date);

        $currentTime = new \DateTime();

        if($currentTime < $checkCoupon->expiration_date)
        {
            $this->order->coupon_code=$checkCoupon->id;
            $this->order->save(); 
            session()->flash('success', 'Coupon applied successfully');           

        }
        else{
            session()->flash('error', 'Coupon expired');
        }
    }
    else{
        session()->flash('error', 'Invaild coupon');
    }
    

   }


    public function render()
    {
        return view('livewire.order.coupon-form');
    }
}
