<?php

namespace App\Livewire\Admin\Product;

use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\ProductImage;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class MultipleImages extends Component
{
    use WithFileUploads;

    public $product;
    public $photo; // Single image upload
    public $isEditing = true; // Always in editing mode

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    // Function to delete an image from the database and storage
    public function deleteImage($imageId)
    {
        $image = ProductImage::find($imageId);

        if ($image) {
            // Remove the image from storage
            Storage::delete('public/image/product/' . $image->image_path);
            // Delete the image record from the database
            $image->delete();
            session()->flash('message', 'Image deleted successfully.');
        }
    }

    // Update product images one by one
    public function update()
    {
        // Validate the uploaded image
        $this->validate([
            'photo' => 'nullable|image|max:1024', // Validate the image
        ]);

        // Ensure photo is not empty
        if ($this->photo) {
            $imageName = "p" . time() . '.' . $this->photo->getClientOriginalExtension();
            $this->photo->storeAs('public/image/product', $imageName);

            // Save the image to the product_images table
            ProductImage::create([
                'product_id' => $this->product->id,
                'image_path' => $imageName,
            ]);

            // Flash success message and reset the photo input
            session()->flash('message', 'Product image uploaded successfully!');
            $this->photo = null; // Clear the input after saving
        }
    }

    public function render()
    {
        return view('livewire.admin.product.multiple-images', [
            'productImages' => $this->product->images, // Pass existing images to the view
        ]);
    }
}
