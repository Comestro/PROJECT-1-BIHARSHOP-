<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;

class BrandForm extends Component
{
    public $product;
    public $brand;
    public $isEditing = false;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->brand = $product->brand;
    }

    public function edit()
    {
        $this->isEditing = true;
    }

    public function cancel()
    {
        $this->isEditing = false;
        $this->brand = $this->product->brand;
    }

    public function update()
    {
        $this->validate([
            'brand' => 'nullable|string|max:255',
        ]);

        $this->product->update([
            'brand' => $this->brand,
        ]);

        $this->isEditing = false;
        session()->flash('message', 'Product brand updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.product.brand-form');
    }
}
