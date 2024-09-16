<?php

namespace App\Livewire\Public;

use App\Models\Order;
use Livewire\Attributes\On;
use Livewire\Component;

class CartPage extends Component
{
    public $order;

    public function mount($order){
        $this->order = $order;
    }
    #[On('refresh_cart_counter')]
    public function render()
    {
        return view('livewire.public.cart-page');
    }
}
