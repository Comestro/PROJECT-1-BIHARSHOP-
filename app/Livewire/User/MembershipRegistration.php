<?php

namespace App\Livewire\User;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Str;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class MembershipRegistration extends Component
{
    public $name;
    public $email;
    public $mobile;
    public $password;
    public $confirmed_password;

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required',"unique:memberships,mobile"],
            'password' => ['required', 'string', 'min:8'],
        ];
    }

     public function store()
     {
         $validatedData = $this->validate();
         $uniqueToken = Str::random(40);

        $membership = Membership::create([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'token' => $uniqueToken,
        ]);
        if($membership){
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'isAdmin'=> 0,
                'password' => Hash::make($this->password),
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

