<?php

namespace App\Livewire\Public;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class CartCounter extends Component
{
    public $cartItemCount = 0;

    // You can use the mount method to initialize the item count
    public function mount()
    {
        $this->updateCartCount();
    }

    // This function updates the cart item count
    #[On('refresh_cart_counter')]
    public function updateCartCount()
    {
        $order = Order::where('user_id',Auth::id())->with('orderItems')->first();

        $this->cartItemCount = $order->orderItems->count(); // Update with your logic
    }

    public function render()
    {
        return view('livewire.public.cart-counter');
    }

}
