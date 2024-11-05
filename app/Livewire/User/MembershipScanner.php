<?php

namespace App\Livewire\User;
use App\Models\Membership;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MembershipScanner extends Component
{
    // public $token;
    public $transaction_no;
    public $membership;

    // public function mount($token)
    // {
    //     $this->token = $token->token;
    // }

    public function updateTransaction(){

        $membership = Membership::where('user_id',Auth::id())->first();
        // $membership = Membership::where('token',$this->token)->first();
        $membership->transaction_no = $this->transaction_no;
        $data = $membership->save();
        if($data){
            return redirect('/user/membership')->with('success', 'Membership updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Unable to update data.');
       }
    }
    
    public function render()
    {
        return view('livewire.user.membership-scanner');
    }
}
