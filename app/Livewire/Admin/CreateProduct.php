<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $description;
    public $price;
    public $discount_price;
    public $quantity;
    public $sku;
    public $brand;
    public $image;
    public $category_id;
    public $status = true; // Default to active

    // Validation rules
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0|lt:price',
            'quantity' => 'required|integer|min:0',
            'sku' => 'nullable|string|max:100',
            'brand' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id', // Ensure category_id is present and valid
            'status' => 'boolean',
        ];
    }

    // Automatically set slug when name is updated
    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    // Handle the form submission
    public function store()
    {
        $validatedData = $this->validate();

        // Handle file upload
        if ($this->image) {
            $imageName = "P" . time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/image/product', $imageName);
        } else {
            $imageName = null;
        }

        

        // Create the product
        $product = Product::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => $this->price,
            'discount_price' => $this->discount_price,
            'quantity' => $this->quantity,
            'sku' => $this->sku,
            'brand' => $this->brand,
            'image' => $imageName,
            'category_id' => $this->category_id, // Ensure category_id is included
            'status' => $this->status,
        ]);

        // Redirect with success or error message
        if ($product) {
            session()->flash('success', 'Product added successfully.');
            return redirect()->route('product.index');
        } else {
            session()->flash('error', 'Unable to add product.');
        }
    }

    // Render the Livewire view
    public function render()
    {
        return view('livewire.admin.create-product', [
            'categories' => Category::all() // Load categories for dropdown
        ]);
    }
}
