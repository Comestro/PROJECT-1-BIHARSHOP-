<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Address;
class CallingAddress extends Component
{
    public function render()
    {
        $data['addresses']=Address::all();
        return view('livewire.admin.calling-address',$data);
    }
}
