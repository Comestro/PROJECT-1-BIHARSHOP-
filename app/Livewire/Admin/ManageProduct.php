<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

class ManageProduct extends Component
{
    public $searchTerm = '';

    public function render()
    {
        // Fetch categories based on the search term
        $products = Product::where('name', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('description', 'like', '%' . $this->searchTerm . '%')
            ->get();

        return view('livewire.admin.manage-product', ['products' => $products,]);
    }
}
