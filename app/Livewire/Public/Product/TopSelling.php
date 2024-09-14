<?php

namespace App\Livewire\Public\Product;

use Livewire\Component;
use App\Models\Product;

class TopSelling extends Component
{
    public function render()
    {
        
        return view('livewire.public.product.top-selling', ['topSelling' => Product::latest()->where('status',1)->limit(4)->get()]);
    }
}
