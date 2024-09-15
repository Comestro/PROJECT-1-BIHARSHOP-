<?php

namespace App\Livewire\Order;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class Cart extends Component
{
    public $orders;
    public function mount(Order $orders){
        $this->orders = $orders;
    }
    public function render()
    {
        return view('livewire.order.cart');
    }
}
