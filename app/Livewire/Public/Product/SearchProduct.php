<?php

namespace App\Livewire\Public\Product;

use Livewire\Component;
use App\Models\Product;

class SearchProduct extends Component
{
    public $search = "";
    public function showProduct($productId)
    {        
        return redirect()->route('public.show', ['id' => $productId]);
    }
    public function render()
    {
        $products = [];

        if (!empty($this->search)) {
            $products = Product::where('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('brand', 'LIKE', '%' . $this->search . '%')
                ->limit(5)
                ->get();
        }

        return view('livewire.public.product.search-product', ['products' => $products]);
    }
}
