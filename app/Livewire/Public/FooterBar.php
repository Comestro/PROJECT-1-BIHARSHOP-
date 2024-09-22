<?php

namespace App\Livewire\Public;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class FooterBar extends Component
{
    public $cartCount = 0;

    // You can use the mount method to initialize the item count
    public function mount()
    {
        $this->updateCartCount();
    }

    // This function updates the cart item count
    #[On('refresh_cart_counter')]
    public function updateCartCount()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $order = Order::where('user_id', Auth::id())->with('orderItems')->first();

            // Set cartItemCount to the count of orderItems or 0 if no order is found
            $this->cartCount = $order ? $order->orderItems->count() : 0;
        } else {
            // If no user is authenticated, set cartItemCount to 0
            $this->cartCount = 0;
        }
    }
    public function render()
    {
       
        return view('livewire.public.footer-bar');
    }
}
