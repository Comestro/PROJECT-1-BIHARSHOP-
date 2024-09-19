<?php

namespace App\Livewire\Public\Product;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;

class SearchProduct extends Component
{
    public $search = '';
    public $products = [];

    public function updatedSearch()
    {
        if (!empty($this->search)) {
            $this->products = Product::where(function ($query) {
                // Search by name, brand, or category
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('brand', 'like', '%' . $this->search . '%')
                      ->orWhereHas('category', function ($query) {
                          $query->where('name', 'like', '%' . $this->search . '%')
                                ->orWhereHas('parentCategory', function ($parentQuery) {
                                    $parentQuery->where('name', 'like', '%' . $this->search . '%');
                                });
                      });
            })
            ->with('category') // Eager load category for performance
            ->limit(5)
            ->get();
        } else {
            $this->products = [];
        }
    }

    public function searchProduct()
    {
        // Redirect to the first product's detail page if a match is found
        if (!empty($this->products)) {
            return $this->showProduct($this->products->first()->slug);
        }
    }

    public function showProduct($productSlug)
    {
        // Redirect to the product detail page using the product's slug
        return redirect()->route('public.show', ['slug' => $productSlug]);
    }

    public function render()
    {
        return view('livewire.public.product.search-product', [
            'products' => $this->products,
        ]);
    }
}
