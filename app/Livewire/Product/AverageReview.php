<?php

namespace App\Livewire\Product;

use App\Models\Product;
use App\Models\Review;
use Livewire\Attributes\On;

use Livewire\Component;

class AverageReview extends Component
{
    public $rating = 0;
    public $review;
    public $averageRating;
    public $totalReviews;
    public $totalRating;
    public $product;

    #[On('update_average')]

    public function getData(){
        $this->averageRating = $this->product->reviews()->average('rating');
        $this->totalReviews = $this->product->reviews()->where('review',"<>","")->count();
        $this->totalRating = $this->product->reviews()->where('review',null)->count();
    }
    public function mount(Product $product)
    {
        $this->product = $product;
        // Fetch the average rating and the total number of reviews
       $this->getData();
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
        $this->getData();

        // Clear the form
        $this->reset(['rating', 'review']);
        
        // Add a flash message
        session()->flash('message', 'Review submitted successfully.');
    }
    public function render()
    {
        return view('livewire.product.average-review');
    }
}
