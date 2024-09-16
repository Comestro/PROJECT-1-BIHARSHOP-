<?php

namespace App\Livewire\Order;

use App\Models\Order;
use Livewire\Attributes\On;
use Livewire\Component;

class PriceBreakout extends Component
{
        public $orders;
        public $subtotal = 0;
        public $discountPercentage = 20; // Example discount percentage
        public $deliveryFee = 15; // Example delivery fee
        public $total = 0;

        public function mount(Order $orders)
        { 
            $this->orders = $orders;

            $this->calculateSummary();
        }

        #[On("refreshPriceBreakdown")]

        public function calculateSummary()
        {
            $this->subtotal = $this->orders->orderItems->sum(function($item) {
                return $item->products->discount_price * $item->quantity;
            });

            $discountAmount = ($this->subtotal * $this->discountPercentage) / 100;
            $this->total = $this->subtotal - $discountAmount + $this->deliveryFee;
        }
    public function render()
    {
        return view('livewire.order.price-breakout');
    }
}
