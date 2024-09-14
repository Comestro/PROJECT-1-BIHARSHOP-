<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\ProductVariant;
use App\Models\Product;

use Livewire\Attributes\On;


class CallingProductVariant extends Component

{
    public $product_id;
    public $price;
    public $stock;
    public $isModalOpen = false;
    public $confirmingDelete = false;
    public $product;

    protected $rules = [
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
        'product_id' => 'required',
    ];

    #[On('refresh')]

    public function mount(Product $product){
        $this->product = $product;
    }
    public function render()
    {
        $productVariants = ProductVariant::where('product_id',$this->product->id)->get();
        return view('livewire.admin.product.calling-product-variant')->with('productVariants', $productVariants);
    }  

    public function openModal($productVariantId)
    {
        $this->productVariantId = $productVariantId;
        $productVariant = ProductVariant::find($this->productVariantId);

        if ($productVariant) {
            $this->price = $productVariant->price;
            $this->stock = $productVariant->stock;
            $this->isModalOpen = true;
        }
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    // public function updateAttribute()
    // {
    //     $this->validate();

    //     $productVariant = ProductVariant::find($this->productVariantId);
    //     $productVariant->product_id = $this->product_id;
    //     $productVariant->save();

    //     $this->closeModal();

    //     session()->flash('message', 'Attribute updated successfully.');
    // }

    public function deleteAttribute()
    {
        if ($this->confirmingDelete) {
            $productVariant = ProductVariant::find($this->productVariantId);

            $productVariant->delete();

            $this->confirmingDelete = false;
            session()->flash('message', 'Attribute deleted successfully.');
        }
    }

    public function confirmDelete($productVariantId)
    {
        $this->productVariantId = $productVariantId;
        $this->confirmingDelete = true;
    }

    public function toggleStatus($productVariantId)
        {
            $productVariant = ProductVariant::find($productVariantId);
            $productVariant->status = !$attribute->status;
            $productVariant->save();

            session()->flash('success', 'Variant status updated successfully.');
        }
        

    
}

