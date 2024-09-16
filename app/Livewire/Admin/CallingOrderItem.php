<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrderItem;

class ManageOrderItem extends Component
{
    public $orderItem;

    public function mount($id)
    {
        $this->orderItem = OrderItem::find($id);

        if (!$this->orderItem) {
            // Optionally handle the case where the order item is not found
            session()->flash('error', 'Order item not found.');
            return redirect()->route('orderItems.index');
        }
    }

    public function render()
    {
        return view('livewire.manage-order-item');
    }
}
