<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;



class CallingReview extends Component
{
    public $product;

    public function mount(Product $product)
    {
        

        $this->product = $product;
    }
    #[On('Refresh')]
    public function render()
    {

        $reviews = $this->product->reviews()->with('user')->latest()->get();
        return view('livewire.product.calling-review',[
            'reviews' => $reviews
        ]);
    }
}
