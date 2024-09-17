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
        $user = auth()->user();        
        $orders = Order::with(['orderItems.products'])
            ->where('isOrdered', 1)
            ->where('user_id', $user->id)
            ->whereHas('orderItems.products', function ($query) {
                if (!empty($this->searchTerm)) {
                    $query->where('name', 'like', '%' . $this->searchTerm . '%');
                }
            })
            ->paginate(10); 
        return view('livewire.order.my-order', [
            'orders' => $orders,
        ]);
    }
}
