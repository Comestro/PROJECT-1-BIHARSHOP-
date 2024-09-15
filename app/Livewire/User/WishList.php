<?php

namespace App\Livewire\User;

use App\Models\Wishlist as WishListModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishList extends Component
{
    public function render()
    {
        $wishlist=WishListModel::where('user_id',Auth::id())->get();
        return view('livewire.user.wish-list', ['wishlist' => $wishlist]);
    }
}
