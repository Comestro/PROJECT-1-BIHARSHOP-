<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;

class PriceForm extends Component
{
    public $product;
    public $price;
    public $isEditing = false;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->price = $product->price;
    }

    public function edit()
    {
        $this->isEditing = true;
    }

    public function cancel()
    {
        $this->isEditing = false;
        $this->price = $this->product->price;
    }

    public function update()
    {
        $this->validate([
            'price' => 'required|numeric|min:1',
        ]);

        $this->product->update([
            'price' => $this->price,
        ]);

        $this->isEditing = false;
        session()->flash('message', 'Product price updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.product.price-form');
    }
}
