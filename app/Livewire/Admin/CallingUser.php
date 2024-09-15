<?php

namespace App\Livewire\Admin;
use App\Models\User; 
use Livewire\Component;

class CallingUser extends Component
{
    public $search="";
    public function render()
    {
        
        $data['users'] = User::where('name', 'LIKE', "%".$this->search."%")->get();
        return view('livewire.admin.calling-user', $data);
    }
}
