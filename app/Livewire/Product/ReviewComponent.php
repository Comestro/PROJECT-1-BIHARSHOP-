<?php

namespace App\Livewire\Product;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ReviewComponent extends Component
{

    public $product;
    public $rating;

    public $alreadyRated;
    public $review;

    protected $rules = [
        'rating' => 'required|integer|between:1,5',
        'review' => 'required|string|max:500',
    ];

    public function mount(Product $product)
    {
        $this->product = $product;

        if(Review::where('user_id', Auth::id())->where('product_id', $this->product->id)->exists()){
            $this->alreadyRated = true;
        }
        else{
            $this->alreadyRated = false;
        }
    }

    public function submitReview()
    {

        $this->validate();
        
        
        Review::create([
            'product_id' => $this->product->id,
            'user_id' => Auth::id(),
            'rating' => $this->rating,
            'review' => $this->review,
        ]);

        $this->dispatch('Refresh');
        $this->alreadyRated = true;


        session()->flash('message', 'Review submitted successfully.');
        $this->reset('rating', 'review');
    
       

                
    }


    #[On('Refresh')]
    public function render()
    {
       
        return view('livewire.product.review-component');
    }
}
