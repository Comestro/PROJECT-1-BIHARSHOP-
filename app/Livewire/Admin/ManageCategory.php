<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;

class ManageCategory extends Component
{
    public $searchTerm = '';

    public function render()
    {
        // Fetch categories based on the search term
        $categories = Category::where('name', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('cat_description', 'like', '%' . $this->searchTerm . '%')
            ->get();

        return view('livewire.admin.manage-category', [
            'categories' => $categories,
        ]);
    }
}
