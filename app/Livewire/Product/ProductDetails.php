<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class ProductDetails extends Component
{
    public $product;

    public function mount(Product $product)
    {
        
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.product.product-details');
    }
}
