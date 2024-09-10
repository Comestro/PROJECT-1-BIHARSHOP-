<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\Category;

class InsertProduct extends Component
{

    use WithFileUploads;
    public $name;
    public $slug;
    public $price;
    public $discount_price;
    public $quantity;
    public $sku;
    public $category_id;
    public $brand;
    public $description;
    public $photo;  // For image file upload

    // Method to define validation rules
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
        ];
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

     // Method to handle the form submission
     public function store()
     {
        // Validate inputs based on the rules set in the class
         $validatedData = $this->validate();

        // Debug the validated data to see what's being passed

         if ($this->photo) {
            $imageName = "C" . time() . '.' . $this->photo->getClientOriginalExtension();
            $this->photo->storeAs('public/image/product', $imageName);
        } else {
            $imageName = null;
        }

         // Insert the category into the database
         $product = Product::create([
             'name' => $this->name,
             'description' => $this->description,
             'slug' => $this->slug,
             'price' => $this->price,
             'discount_price' => $this->discount_price,
             'quantity' => $this->quantity,
             'sku' => $this->sku,
             'category_id' => $this->category_id,
             'brand' => $this->brand,
             'image' => $imageName,
         ]);

         // Redirect with success or error message
        if ($product) {
            session()->flash('success', 'Product added successfully.');
            return redirect()->route('product.edit', $product->slug);
        } else {
            session()->flash('error', 'Unable to add product.');
            return redirect()->back();
        }
     }


    public function render()
    {
        $categories = Category::paginate(10);
        return view('livewire.admin.insert-product')->with('categories', $categories);
    }
}
