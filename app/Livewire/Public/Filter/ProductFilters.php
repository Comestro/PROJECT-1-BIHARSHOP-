<?php

namespace App\Livewire\Public\Filter;

use App\Models\Category;
use Livewire\Component;

class ProductFilters extends Component
{
    public $category;

    public function mount(Category $category){
        $this->category = $category;
    }
    public function render()
    {
        return view('livewire.public.filter.product-filters');
    }
}
