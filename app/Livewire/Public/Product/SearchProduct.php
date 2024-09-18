<?php

namespace App\Livewire\Public\Product;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;

class SearchProduct extends Component
{
    public $search = '';
    public $products = [];

    public function updatedSearch()
    {
        if (!empty($this->search)) {
            $this->products = Product::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('brand', 'like', '%' . $this->search . '%')
                ->with('category') // Eager load category
                ->limit(5)
                ->get();
        } else {
            $this->products = [];
        }
    }

    public function showProduct($productSlug)
    {
        // Redirect using the product's slug
        return redirect()->route('public.show', ['slug' => $productSlug]);
    }

    public function render()
    {
        return view('livewire.public.product.search-product', [
            'products' => $this->products,
        ]);
    }

}
