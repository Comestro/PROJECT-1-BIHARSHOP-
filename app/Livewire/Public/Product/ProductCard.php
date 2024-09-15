<?php

namespace App\Livewire\Public\Product;

use App\Models\Product;
use Livewire\Component;

class ProductCard extends Component
{
    public $item;
    public function mount(Product $item){
        $this->item = $item;
    }
    public function render()
    {
        return view('livewire.public.product.product-card');
    }
}
