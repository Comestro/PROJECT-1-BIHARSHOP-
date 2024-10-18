<?php

namespace App\Livewire\User;
use App\Models\Membership;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class MembershipPayment extends Component
{
    public $token;

    public function mount($token)
    {
        $this->token = $token->token;
    }


    public function render()
    {
        $data = Membership::where('token',$this->token)->first();
        return view('livewire.user.membership-payment',['data' => $data]);
    }
}
