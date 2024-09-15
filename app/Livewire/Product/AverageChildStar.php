<?php

namespace App\Livewire\Product;

use App\Models\Product;
use App\Models\Review;
use Livewire\Component;

class AverageChildStar extends Component
{
    public $rating = 0;
    public $review;
    public $averageRating;
    public $product;
    public $totalReviews;

    public function mount(Product $product)
    {
        $this->product = $product;
        // Fetch the average rating and the total number of reviews
        $this->averageRating = $this->product->reviews()->average('rating');
        $this->totalReviews = $this->product->reviews()->count();
    }

    public function submitReview()
    {
        // Validation logic here...

        // Save the review
        Review::create([
            'rating' => $this->rating,
            'review' => $this->review,
        ]);

        $this->averageRating = $this->product->reviews()->average('rating');
        $this->totalReviews = $this->product->reviews()->count();

        // Clear the form
        $this->reset(['rating', 'review']);
        
        // Add a flash message
        session()->flash('message', 'Review submitted successfully.');
    }
    public function render()
    {
        return view('livewire.product.average-child-star');
    }
}
