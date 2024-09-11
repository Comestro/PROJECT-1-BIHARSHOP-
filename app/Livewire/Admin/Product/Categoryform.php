<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;

class CategoryForm extends Component
{
    public $product;
    public $categories = []; // Initialize as an empty array
    public $category_id;
    public $isEditing = false;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->categories = Category::all(); // Fetch categories

        // If there are categories, set the category_id, otherwise set it to null
        $this->category_id = $product->category_id ?? null;
    }

    public function edit()
    {
        $this->isEditing = true;
    }

    public function cancel()
    {
        $this->isEditing = false;
        $this->category_id = $this->product->category_id;
    }

    public function update()
    {
        $this->validate([
            'category_id' => 'nullable|exists:categories,id', // Validate that the category exists
        ]);

        $this->product->update([
            'category_id' => $this->category_id,
        ]);

        $this->isEditing = false;
        session()->flash('message', 'Product category updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.product.category-form', [
            'categories' => $this->categories,
        ]);
    }
}
