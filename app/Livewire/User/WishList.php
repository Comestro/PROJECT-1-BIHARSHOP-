<?php

namespace App\Livewire\User;

use App\Models\Wishlist as WishListModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishList extends Component
{
    public $id;
    public function destroy($id){
        WishListModel::find($id)->delete();
        session()->flash('message', 'Product removed from wishlist.');
        return redirect()->back();
    }
    public function render()
    {
        $wishlist=WishListModel::where('user_id',Auth::id())->get();
        return view('livewire.user.wish-list', ['wishlist' => $wishlist]);
    }
}
