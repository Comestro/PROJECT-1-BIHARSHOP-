<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;

class SkuForm extends Component
{
    public $product;
    public $sku;
    public $isEditing = false;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->sku = $product->sku;
    }

    public function edit()
    {
        $this->isEditing = true;
    }

    public function cancel()
    {
        $this->isEditing = false;
        $this->sku = $this->product->sku;
    }

    public function update()
    {
        $this->validate([
            'sku' => 'required|string',
        ]);

        $this->product->update([
            'sku' => $this->sku,
        ]);

        $this->isEditing = false;
        session()->flash('message', 'Product sku updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.product.sku-form');
    }
}
