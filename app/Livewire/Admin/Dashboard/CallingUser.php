<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;
use App\Models\User;


class CallingUser extends Component
{
    public $users;
    public function mount()
    {
        $this->users = User::orderby("id")->limit(5)->get();
    }
    public function render()

    {
        return view('livewire.admin.dashboard.calling-user');
    }
}
