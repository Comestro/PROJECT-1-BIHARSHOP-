<?php

namespace App\Livewire\User;
use App\Models\Membership;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class MembershipPayment extends Component
{
    public $token;
    public $terms_and_condition;

    public function mount($token)
    {
        $this->token = $token->token;
    }

    public function updateTerms(){
        $membership = Membership::where('token',$this->token)->first();
        $membership->terms_and_condition = $this->terms_and_condition;
        $data = $membership->save();
        if($data){
            return redirect('/user/membership-scanner/'.$this->token)->with('success', 'Membership updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Unable to update data.');
       }
    }


    public function render()
    {
        $data = Membership::where('token',$this->token)->first();
        return view('livewire.user.membership-payment',['data' => $data]);
    }
}
