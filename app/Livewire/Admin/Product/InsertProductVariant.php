<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\ProductVariant;
use App\Models\Product;

class InsertProductVariant extends Component
{ 
    public $product_id;
    public $price;
    public $stock;
    public $isModalOpen = false;
    public $confirmingDelete = false;

    public $product;

    public function mount(Product $product)
    {
        $this->product = $product->id;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);


        $validatedData['product_id'] = $this->product;
        $ProductVariant = ProductVariant::create($validatedData);
        $this->dispatch('refresh');
        $this->reset('price',"stock");

    }

    public function render()
    {
        return view('livewire.admin.product.insert-product-variant', [
            'productVariant' => ProductVariant::all()
        ]);
    }
}    

