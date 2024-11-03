<?php

namespace App\Livewire\User;

use App\Models\Wishlist as WishListModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishList extends Component
{
    public $selectedCategory = null; // Selected category for filtering
    public $categories = []; // Property to hold categories


    public function destroy($id)
    {
        WishListModel::find($id)->delete();
        session()->flash('message', 'Product removed from wishlist.');
        return redirect()->back();
    }

    public function categories(){
        $wishlistSet = WishlistModel::with('product.category')->where('user_id',Auth::id())->get();
        return $wishlistSet->groupBy(function ($item){
            return $item->product->category->name ?? 'Uncategorized';
        });
    }

    public function render()
    {
        $wishlist = WishListModel::with('product.category')
            ->where('user_id', Auth::id())
            ->get();

            $groupedWishlist = $this->categories();
        return view('livewire.user.wish-list', [
            'groupedWishlist' => $groupedWishlist,
            'categories' => $this->categories,
        ]);
    }

   
}
