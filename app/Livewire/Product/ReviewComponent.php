<?php

namespace App\Livewire\Product;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReviewComponent extends Component
{

    public $product;
    public $rating;
    public $review;

    protected $rules = [
        'rating' => 'required|integer|between:1,5',
        'review' => 'required|string|max:500',
    ];

    public function mount(Product $product)
    {
        $this->product = $product;
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


        session()->flash('message', 'Review submitted successfully.');
        $this->reset('rating', 'review');
    }


    public function render()
    {
        $reviews = $this->product->reviews()->with('user')->latest()->get();
        return view('livewire.product.review-component', [
            'reviews' => $reviews
        ]);
    }
}
