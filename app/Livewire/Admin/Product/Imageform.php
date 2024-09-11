<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;

class ImageForm extends Component
{
    use WithFileUploads;

    public $product;
    public $image;
    public $isEditing = false;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->image = $product->image;
    }

    public function edit()
    {
        $this->isEditing = true;
    }

    public function cancel()
    {
        $this->isEditing = false;
        $this->image = $this->product->image;
    }

    public function update()
    {
        $this->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
        ]);

        if ($this->image) {
            // Store the uploaded image in 'storage/app/public/images' directory
            $imagePath = $this->image->store('images', 'public');
            
            // Update the product's image path in the database
            $this->product->update([
                'image' => $imagePath,
            ]);
        }

        $this->isEditing = false;
        session()->flash('message', 'Product image updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.product.image-form');
    }
}
