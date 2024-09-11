<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;

class DiscountPriceForm extends Component
{
    public $product;
    public $discount_price;
    public $isEditing = false;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->discount_price = $product->discount_price;
    }

    public function edit()
    {
        $this->isEditing = true;
    }

    public function cancel()
    {
        $this->isEditing = false;
        $this->discount_price = $this->product->discount_price;
    }

    public function update()
    {
        $this->validate([
            'discount_price' => 'nullable|numeric|min:0',
        ]);

        $this->product->update([
            'discount_price' => $this->discount_price,
        ]);

        $this->isEditing = false;
        session()->flash('message', 'Product Discount Price updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.product.discount-price-form');
    }
}
