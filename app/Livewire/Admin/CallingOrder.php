<?php

namespace App\Livewire\Admin;
use App\Models\Order; 
use Livewire\Component;

class CallingOrder extends Component
{
    public $search="";
    public $userId;
    public function mount($userId){
    $this->userId = $userId;
    }
    public function render()
    {
        $data['orders'] = Order::where('order_number', 'LIKE', "%".$this->search."%")->get();
        if($this->userId){
            $data['orders'] = Order::where('order_number', 'LIKE', "%".$this->search."%")
            ->where('user_id',$this->userId)->get();

        }
        return view('livewire.admin.calling-order',$data);
    }
}
