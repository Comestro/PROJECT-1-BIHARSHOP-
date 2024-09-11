<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;

class ImageForm extends Component
{
    use WithFileUploads;

    public $product;
    public $photo;
    public $isEditing = false;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->photo = $product->photo; // Ensure this points to the correct attribute in the Product model.
    }

    public function edit()
    {
        $this->isEditing = true;
    }

    public function cancel()
    {
        $this->isEditing = false;
        $this->photo = $this->product->photo;
    }

    public function update()
    {
        $this->validate([
            'photo' => 'nullable|image|max:1024', // Validation rule for image size and type.
        ]);

        if ($this->photo) {
            $imageName = "p" . time() . '.' . $this->photo->getClientOriginalExtension();
            $this->photo->storeAs('public/image/product', $imageName);
        } else {
            $imageName = $this->product->image; // Retain the existing image if no new image is uploaded.
        }

        $this->product->update([
            'image' => $imageName,
        ]);

        $this->isEditing = false;
        session()->flash('message', 'Product image updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.product.image-form');
    }
}
