<?php

namespace App\Livewire\User;

use App\Models\Membership as AddMembership;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Str;

use Livewire\Component;

class Membership extends Component

{
    use WithFileUploads;
    public $referal_id;
    public $name;
    public $date_of_birth;
    public $nationality;
    public $marital_status;
    public $religion;
    public $father_name;
    public $mother_name;
    public $home_address;
    public $city;
    public $state;
    public $pincode;
    public $mobile;
    public $whatsapp;
    public $email;
    public $nominee_name;
    public $nominee_relation;
    public $bank_name;
    public $branch_name;
    public $account_no;
    public $ifsc;
    public $user_id;
    public $pancard;
    public $aadhar_card;
    public $photo;

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'marital_status' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'home_address' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'pincode' => 'required|numeric',
            'email' => 'required|email',
            'nominee_name' => 'required|string|max:255',
            'nominee_relation' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'account_no' => 'required|string|max:255',
            'ifsc' => 'required|string|max:255',
            'pancard' => 'required|string|max:255',
            'aadhar_card' => 'required|string|max:255',
        ]);

        
        if ($this->photo) {
            $imageName = "M" . time() . '.' . $this->photo->getClientOriginalExtension();
            $this->photo->storeAs("/image/membership", $imageName, "public");
        } else {
            $imageName = null;
        }

        $uniqueToken = Str::random(40);

        $data = AddMembership::create([
            'name' => $this->name,
            'date_of_birth' => $this->date_of_birth,
            'referal_id' => $this->referal_id,
            'nationality' => $this->nationality,
            'marital_status' => $this->marital_status,
            'religion' => $this->religion,
            'father_name' => $this->father_name,
            'mother_name' => $this->mother_name,
            'home_address' => $this->home_address,
            'city' => $this->city,
            'pincode' => $this->pincode,
            'state' => $this->state,
            'mobile' => $this->mobile,
            'whatsapp' => $this->whatsapp,
            'email' => $this->email,
            'nominee_name' => $this->nominee_name,
            'nominee_relation' => $this->nominee_relation,
            'bank_name' => $this->bank_name,
            'branch_name' => $this->branch_name,
            'account_no' => $this->account_no,
            'ifsc' => $this->ifsc,
            'pancard' => $this->pancard,
            'aadhar_card' => $this->aadhar_card,
            'image' => $imageName,
            'user_id' => Auth::id(),
            'token' => $uniqueToken,
        ]);
        
        if ($data) {
            return redirect('/user/membership-payment/' . $uniqueToken)->with('success', 'Data added successfully.');
        } else {
            return redirect()->back()->with('error', 'Unable to add data.');
        }
    }


    // Fetch addresses and render view
    // public function render()
    // {
    //     $this->addresses = AddAddress::where('user_id', Auth::id())->get();
    //     return view('livewire.user.address', ['addresses' => $this->addresses]);
    // }

    public function render()
    {
        return view('livewire.user.membership');
    }
}

