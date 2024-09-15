<?php

namespace App\Livewire\Order;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class Cart extends Component
{
    public function render()
    {
        $orders = Order::where('user_id',Auth::id())->with('orderItems')->first();
        return view('livewire.order.cart')->with('orders', $orders);
    }
}
