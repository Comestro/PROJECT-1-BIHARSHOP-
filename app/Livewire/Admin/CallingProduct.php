<?php

namespace App\Livewire\Admin;
use App\Models\Product;
use Livewire\Component;

class CallingProduct extends Component
{
    public function render()
    {
        $data['products']=Product::all();
        return view('livewire.admin.calling-product',$data);
    }
    public function toggleStatus($productId)
    {
        $product = Product::find($productId);
        $product->status = !$product->status;
        $product->save();

        session()->flash('success', 'Product status updated successfully.');
    }
   
}
