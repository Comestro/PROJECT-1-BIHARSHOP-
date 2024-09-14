<?php

namespace App\Livewire\Product;

use App\Models\Review;
use Livewire\Component;

class ProductStar extends Component
{
    public $rating = 0;
    public $review;
    public $averageRating;
    public $totalReviews;

    public function mount()
    {
        // Fetch the average rating and the total number of reviews
        $this->averageRating = Review::average('rating');
        $this->totalReviews = Review::count();
    }

    public function submitReview()
    {
        // Validation logic here...

        // Save the review
        Review::create([
            'rating' => $this->rating,
            'review' => $this->review,
        ]);

        // Recalculate the average rating and total reviews
        $this->averageRating = Review::average('rating');
        $this->totalReviews = Review::count();

        // Clear the form
        $this->reset(['rating', 'review']);
        
        // Add a flash message
        session()->flash('message', 'Review submitted successfully.');
    }
    public function render()
    {
        return view('livewire.product.product-star');
    }
}
