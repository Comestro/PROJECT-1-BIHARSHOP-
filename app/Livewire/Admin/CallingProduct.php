<?php

namespace App\Livewire\Admin;
use App\Models\Product;
use Livewire\Component;

class CallingProduct extends Component
{
    public function render()
    {
        $data['products']=Product::all();
        return view('livewire.admin.calling-product',$data);
    }
   
}
