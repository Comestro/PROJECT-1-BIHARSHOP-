<?php

namespace App\Livewire\Admin\Product;

use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\ProductImage;
use Livewire\Component;

class MultipleImages extends Component
{
    use WithFileUploads;

    public $product;
    public $photos = []; // To hold multiple image files
    public $inputs = []; // To dynamically track input fields
    public $i = 1; // To track the number of input fields

    public $isEditing = false;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->inputs = [0]; // Start with one input field
    }

    // Function to add more image inputs
    public function addInput()
    {
        $this->i++;
        array_push($this->inputs, $this->i);
    }

    public function edit()
    {
        $this->isEditing = true;
    }

    public function cancel()
    {
        $this->isEditing = false;
        $this->photos = []; // Reset images array
    }

    public function update()
    {

        // Validate each image in the photos array
        $this->validate([
            'photos.*' => 'nullable|image|max:1024', // Validate each image
        ]);

        // Ensure photos are not empty
        if ($this->photos && is_array($this->photos)) {
            foreach ($this->photos as $index => $photo) {
                // Ensure you're getting different photos each time
                if ($photo) {
                    $imageName = "p" . time() . $index . '.' . $photo->getClientOriginalExtension();
                    $photo->storeAs('public/image/product', $imageName);

                    // Save each image to the product_images table
                    ProductImage::create([
                        'product_id' => $this->product->id,
                        'image_path' => $imageName,
                    ]);
                }
            }
        }

        // Reset editing state and flash success message
        $this->isEditing = false;
        session()->flash('message', 'Product images updated successfully!');
        $this->photos = []; // Clear the photos array after saving
    }




    public function render()
    {
        return view('livewire.admin.product.multiple-images', [
            'productImages' => $this->product->images, // Pass existing images to the view
        ]);
    }
}
