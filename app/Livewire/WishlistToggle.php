<?php

namespace App\Livewire;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistToggle extends Component
{
    public $productId;
    public $inWishlist = false;

    public function mount($productId)
    {
        $this->productId = $productId;

        $this->inWishlist = Wishlist::where('user_id', Auth::id())
                                    ->where('product_id', $productId)
                                    ->exists();
    }

    public function toggleWishlist()
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }

        if ($this->inWishlist) {
            // Remove from wishlist
            Wishlist::where('user_id', Auth::id())
                    ->where('product_id', $this->productId)
                    ->delete();
            $this->inWishlist = false;
        } else {
            // Add to wishlist
            Wishlist::create([
                'user_id' => Auth::id(),
                'product_id' => $this->productId,
            ]);
            $this->inWishlist = true;
        }
    }

    public function render()
    {
        return view('livewire.wishlist-toggle');
    }
}
