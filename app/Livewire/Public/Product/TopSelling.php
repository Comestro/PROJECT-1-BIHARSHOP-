<?php

namespace App\Livewire\Public\Product;

use Livewire\Component;
use App\Models\Product;

class TopSelling extends Component
{
    public function render()
    {
        $data['topSelling'] = Product::where('status',true)->limit(4)->get();
        return view('livewire.public.product.top-selling',$data);
    }
}
