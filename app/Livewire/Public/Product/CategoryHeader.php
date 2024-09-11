<?php

namespace App\Livewire\Public\Product;

use Livewire\Component;
use App\Models\Category;

class CategoryHeader extends Component
{
    public function render()
    {
        return view('livewire.public.product.category-header', [
            'categories' => Category::all() // Load categories for dropdown
        ]);
    }
}
