<?php

namespace App\Livewire\Public;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PublicHeader extends Component
{
    public $dropdownVisible = false;

    public function showDropdown()
    {
        $this->dropdownVisible = true;
    }

    public function hideDropdown()
    {
        $this->dropdownVisible = false;
    }
    public function render()
    {
       
        $data['countWishlist']=Wishlist::where('user_id',Auth::id())->count();
       
        return view('livewire.public.public-header',$data);
    }
}
