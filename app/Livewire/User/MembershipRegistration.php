<?php

namespace App\Livewire\User;
use App\Models\Membership as AddMembership;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Str;

use Livewire\Component;

class MembershipRegistration extends Component
{
    public $name;
    public $email;
    public $phone;
    public $password;

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required',"unique:memberships,mobile"],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

     public function store()
     {
         $validatedData = $this->validate();
         $uniqueToken = Str::random(40);

        $membership = Membership::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'token' => $uniqueToken,
        ]);
        if($membership){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'isAdmin'=> 0,
                'password' => Hash::make($request->password),
            ]);

            if($user){
                Auth::login($user);
                    $membership->update([
                        'user_id' => $user->id
                    ]);
                return redirect('user/membership')->with('success', 'Registration successful!');
            }
        }
        else{
            return redirect()->route('login')->with('error', 'Unable to login. Please try again.');
        }
     }
 

    public function render()
    {
        return view('livewire.user.membership-registration');
    }
}

