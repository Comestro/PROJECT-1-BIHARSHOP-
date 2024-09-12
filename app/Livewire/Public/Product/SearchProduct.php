<?php

namespace App\Livewire\Public\Product;

use Livewire\Component;
use App\Models\Product;

class SearchProduct extends Component
{
    public $search ="";
    public function render()
   
    {
        $data['products'] =Product::where('name', 'LIKE', '%' . $this->search . '%')
        ->orWhere('brand', 'like', '%' . $this->search . '%')
        ->get();
        return view('livewire.public.product.search-product', $data);
    }
}
