<?php
namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;

class StatusForm extends Component
{
    public $product;
    public $status;
    public $isEditing = false;
    
    // Properties for other fields
    public $name;
    public $description;
    public $price;
    public $quantity;
    public $category;
    public $image;
    public $brand;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->status = $product->status;
        $this->image = $product->image;
        
        // Initialize other fields
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->quantity = $product->quantity;
        $this->category = $product->category;
        $this->brand = $product->brand;
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

    // Check if all other fields are filled
    public function allFieldsFilled()
    {
        return $this->name && $this->description && $this->price && $this->quantity && $this->category && $this->image && $this->brand;
    }

    public function render()
    {
        return view('livewire.admin.product.status-form');
    }
}
