<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;
use App\Models\User;


class CallingUser extends Component
{
    public $users;
    public function mount()
    {
        $this->users = User::all();
    }
    public function render()

    {
        return view('livewire.admin.dashboard.calling-user');
    }
}
