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
        $this->dispatch("refreshPriceBreakdown");
        $this->dispatch("refresh_cart_counter");

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
        else{
            // Remove item from cart if quantity is zero
            $item->delete();
            $this->orders = $this->orders->refresh(); // Refresh order items to reflect the changes in the database
        }
        $this->dispatch("refresh_cart_counter");
        $this->dispatch("refreshPriceBreakdown");

    }

    // destroy the card or delete the card:
    public function destroy($id){
        $orderItem = OrderItem::find($id);
        $orderItem->delete();
        $this->dispatch('refresh_cart_counter');
        $this->dispatch('refreshPriceBreakdown');
    }

    public function render()
    {
        return view('livewire.order.cart', ['orders' => $this->orders]);
    }
}
