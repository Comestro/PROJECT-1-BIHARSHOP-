<?php

namespace App\Livewire\Order;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;

class MyOrder extends Component
{
    use WithPagination;

    public $searchTerm = '';

    public function render()
    {
    
        $orders = Order::with(['orderItems.products'])
            ->whereHas('orderItems.products', function ($query) {
                if (!empty($this->searchTerm)) {
                    $query->where('name', 'like', '%' . $this->searchTerm . '%');
                }
            })
            ->paginate(10); // Adjust pagination as needed

        return view('livewire.order.my-order', [
            'orders' => $orders,
        ]);
    }
}
