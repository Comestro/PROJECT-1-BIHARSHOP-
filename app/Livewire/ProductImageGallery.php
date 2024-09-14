<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductImageGallery extends Component
{
    public $mainImage = "";
    public $product;

    public function mount(Product $product){
        $this->product = $product;
        $this->mainImage = $product->image;
    }

    public function updateMainImage($imagePath){
        $this->mainImage = $imagePath;
    }
    public function render()
    {
        return view('livewire.product-image-gallery');
    }
}
