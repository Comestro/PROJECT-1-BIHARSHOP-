<?php

namespace App\Livewire\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\Membership;
use Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class MemberEdit extends Component
{

    public $step = 1;

    #[On('showNextStep')]
    public function nextStep()
    {
        $this->step++;
    }
    public function prevStep()
    {
        $this->step--;
    }
    public function render()
    {
        $user = Auth::user();
        $membership = Membership::where('user_id',$user->id)->first();

        return view('livewire.user.member-edit',['member' => $membership]);
    }

    public function mount(){
        $user = Auth::user();

          // testing
        if($user->membership == NULL){
            $uniqueToken = Str::random(40);
            $membership = Membership::create([
                'referal_id' => null,
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'mobile' => Auth::user()->mobile,
                'token' => $uniqueToken,
                'user_id' => Auth::user()->id
            ]);
        }
        else{
            $membership = Membership::where('user_id',$user->id)->first();
        }
    
        if ($membership && ($membership->referal_id || $user->isAdmin)) {
            $this->step = 2;
        } 

        if($membership->name && $membership->date_of_birth && $membership->nationality && $membership->marital_status && $membership->religion){
            $this->step = 3;
        }
        if($membership->father_name && $membership->mother_name && $membership->home_address && $membership->city && $membership->state && $membership->pincode && $membership->mobile  && $membership->email){
            $this->step = 4;
        }

        if($membership->nominee_name && $membership->nominee_relation){
            $this->step = 5;
        }
        if($membership->bank_name && $membership->branch_name && $membership->ifsc && $membership->pancard && $membership->aadhar_card){
            $this->step = 6;
        }
        if($membership->image){
            return redirect('/user/membership-payment/' . $membership->token)->with('success', 'Data added successfully.');
        }
    }

}
