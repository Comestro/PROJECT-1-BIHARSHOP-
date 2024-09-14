<?php

namespace App\Livewire\Admin;
use App\Models\Product;
use Livewire\Component;

class CallingProduct extends Component
{
    public $isOpen = false;
    public $productId;
    public $search="";



    public function render()
{
    $products = Product::where('name', 'LIKE', "%".$this->search."%")->get();
    return view('livewire.admin.calling-product', ['products' => $products]);
}


    public function toggleStatus($productId)
    {
        $product = Product::find($productId);
        if ($product) {
            $product->status = !$product->status;
            $product->save();

            $this->render();

            session()->flash('success', 'Product status updated successfully.');
        }
    }

    public function openModal($productId)
    {
        $this->productId = $productId;
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->productId = null;
    }

    public function delete()
    {
        if ($this->productId) {
            Product::findOrFail($this->productId)->delete();

            $this->closeModal();
            session()->flash('message', 'Product deleted successfully.');
        }
    }
}
