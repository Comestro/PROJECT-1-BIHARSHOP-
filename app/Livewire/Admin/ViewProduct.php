<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;

class ViewProduct extends Component
{
    public $slug;

    public function mount($slug){
        $this->slug = $slug;
    }
    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();

        if (!$product) {
            return redirect()->route('product.index')->with('error', 'No Product Found');
        }
        return view('livewire.admin.view-product', ['product' =>$product]);
    }
}
