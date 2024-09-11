<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;

class DescriptionForm extends Component
{
    public $product;
    public $description;
    public $isEditing = false;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->description = $product->description;
    }

    public function edit()
    {
        $this->isEditing = true;
    }

    public function cancel()
    {
        $this->isEditing = false;
        $this->description = $this->product->description;
    }

    public function update()
    {
        $this->validate([
            'description' => 'required|string',
        ]);

        $this->product->update([
            'description' => $this->description,
        ]);

        $this->isEditing = false;
        session()->flash('message', 'Product description updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.product.description-form');
    }
}
