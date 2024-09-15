<?php

namespace App\Livewire\Admin;
use App\Models\Order; 
use Livewire\Component;

class CallingOrder extends Component
{
    public $search="";
    public function render()
    {
        $data['orders'] = Order::where('order_number', 'LIKE', "%".$this->search."%")->get();
        return view('livewire.admin.calling-order',$data);
    }
}
