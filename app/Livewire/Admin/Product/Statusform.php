<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;

class StatusForm extends Component
{
    public $product;
    public $status;
    public $isEditing = false;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->status = $product->status;
    }

    public function edit()
    {
        $this->isEditing = true;
    }

    public function cancel()
    {
        $this->isEditing = false;
        $this->status = $this->product->status;
    }

    public function update()
    {
        $this->validate([
            'status' => 'required',
        ]);

        $this->product->update([
            'status' => $this->status,
        ]);

        $this->isEditing = false;
        session()->flash('message', 'Product status updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.product.status-form');
    }
}
