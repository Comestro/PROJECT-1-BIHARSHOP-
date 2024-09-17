<?php

namespace App\Livewire\Order;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderSummary extends Component
{
    public function render()
    {
        $order = Order::where('user_id',Auth::id())->where('isOrdered',0)->where('payment_status','unpaid')->where('status','pending')->first();
        return view('livewire.order.order-summary',['orderItems' => $order->orderItems]);
    }
}
