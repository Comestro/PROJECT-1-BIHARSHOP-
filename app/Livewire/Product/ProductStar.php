<?php

namespace App\Livewire\Product;

use App\Models\Product;
use App\Models\Review;
use Livewire\Component;
use Livewire\Attributes\On;


class ProductStar extends Component
{
    public $rating = 0;
    public $review;
    public $product;
    public $averageRating;
    public $totalReviews;

    #[On('update_average_product')]
    public function mount(Product $product)
    {
        // Fetch the average rating and the total number of reviews
        $this->averageRating = $this->product->reviews()->average('rating');
        $this->totalReviews = $this->product->reviews()->count();
        $this->product = $product;
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
        $this->averageRating = $this->product->reviews()->average('rating');
        $this->totalReviews = $this->product->reviews()->count();

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
