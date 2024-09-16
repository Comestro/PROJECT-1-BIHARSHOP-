<?php

namespace App\Livewire\Public\Product;

use Livewire\Component;
use App\Models\Category;

class CategoryHeader extends Component
{
    public function render()
    {
        return view('livewire.public.product.category-header', [
            'categories' => Category::where('status', 1)->get() // Load categories for dropdown
        ]);
    }
}
