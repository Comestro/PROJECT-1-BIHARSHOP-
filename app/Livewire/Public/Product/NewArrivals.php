<?php

namespace App\Livewire\Public\Product;

use App\Models\Product;
use Livewire\Component;

class NewArrivals extends Component
{
    public function render()
    {
        return view('livewire.public.product.new-arrivals', data: ['newArrivals' => Product::latest()->where('status',1)->limit(4)->get()]);
    }
}
