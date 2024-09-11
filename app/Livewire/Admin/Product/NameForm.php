<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;

class NameForm extends Component
{
    public $product;
    public $name;
    public $isEditing = false;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->name = $product->name;
    }

    public function edit()
    {
        $this->isEditing = true;
    }

    public function cancel()
    {
        $this->isEditing = false;
        $this->name = $this->product->name;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->product->update([
            'name' => $this->name,
        ]);

        $this->isEditing = false;
        session()->flash('message', 'Product name updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.product.name-form');
    }
}
