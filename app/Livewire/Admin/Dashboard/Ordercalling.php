<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;
use App\Models\OrderItem;
use App\Models\Order;


class Ordercalling extends Component
{
    public $orderItems;
    public function mount()
    {
        $this->orderItems = OrderItem::select('order_items.*')
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->orderByRaw("CASE WHEN orders.status = 'completed' THEN 3 WHEN orders.status = 'processing' THEN 2 WHEN orders.status = 'pending' THEN 1 ELSE 4 END")
            ->orderBy('order_items.created_at', 'asc')
            ->take(10)
            ->get();
    }
    public function render()
    {
        return view('livewire.admin.dashboard.ordercalling');
    }
}
