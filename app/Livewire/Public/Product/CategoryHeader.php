<?php

namespace App\Livewire\Public\Product;

use Livewire\Component;
use App\Models\Category;
use phpDocumentor\Reflection\Types\Null_;

class CategoryHeader extends Component
{
    public function render()
    {
        return view('livewire.public.product.category-header', [
            'categories' => Category::where('status', 1)->where('parent_category_id',null)->get() // Load categories for dropdown
        ]);
    }
}
