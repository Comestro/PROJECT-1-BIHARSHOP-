<?php

namespace App\Livewire\Order;

use Livewire\Component;
use App\Models\OrderItem;  // Import OrderItem model (assuming the items are stored in this model)
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{
    public $orders;

    public function mount(Order $orders)
    {
        // Ensure that the authenticated user's order is loaded
        $this->orders = $orders->load('orderItems'); // Load the relationship with order items
    }

    public function incrementQuantity($itemId)
    {
        $item = OrderItem::find($itemId);
        if ($item) {
            $item->quantity++;
            $item->save();

            // Refresh order items
            $this->orders = $this->orders->refresh();
        }
    }

    public function decrementQuantity($itemId)
    {
        $item = OrderItem::find($itemId);
        if ($item && $item->quantity > 1) {
            $item->quantity--;
            $item->save();

            // Refresh order items
            $this->orders = $this->orders->refresh();
        }
    }

    public function render()
    {
        return view('livewire.order.cart', ['orders' => $this->orders]);
    }
}
