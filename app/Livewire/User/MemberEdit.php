<?php

namespace App\Livewire\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\Membership;
use Str;

use Livewire\Component;

class MemberEdit extends Component
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
    public $token;
    public $user_id;
    public $pancard;
    public $aadhar_card;
    public $existingImage;
    public $image;

    public function update()
    {
        // $validatedData = $this->validate([
        //     'name' => 'required|string|max:255',
        //     'date_of_birth' => 'required|string|max:255',
        //     'nationality' => 'required|string|max:255',
        //     'marital_status' => 'required|string|max:255',
        //     'religion' => 'required|string|max:255',
        //     'father_name' => 'required|string|max:255',
        //     'mother_name' => 'required|string|max:255',
        //     'home_address' => 'required|string|max:255',
        //     'mobile' => 'required|string|max:255',
        //     'city' => 'required|string|max:255',
        //     'state' => 'required|string|max:255',
        //     'pincode' => 'required|numeric',
        //     'email' => 'required|email',
        //     'nominee_name' => 'required|string|max:255',
        //     'nominee_relation' => 'required|string|max:255',
        //     'bank_name' => 'required|string|max:255',
        //     'account_no' => 'required|string|max:255',
        //     'ifsc' => 'required|string|max:255',
        //     'pancard' => 'required|string|max:255',
        //     'aadhar_card' => 'required|string|max:255',
        // ]);

        // dd('bnjm');

        
        // if ($this->photo) {
        //     $imageName = "M" . time() . '.' . $this->photo->getClientOriginalExtension();
        //     $this->photo->storeAs('public/image/membership', $imageName);
        // } else {
        //     $imageName = null;
        // }

       

        $user = Auth::user();

        $membership = Membership::where('user_id',$user->id)->first();
        if ($this->image) {
            // Delete old image
            if ($this->existingImage) {
                Storage::delete('public/image/membership/' . $this->existingImage);
            }

            // Store new image
            $imageName = $this->image->store('image/membership', 'public');
            $membership->image = basename($imageName);
        }
        $data = $membership->update([
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
            // 'image' => $imageName,
        ]);

        $uniqueToken = $membership->token;        
        if ($data) {
            return redirect('/user/membership-payment/' . $uniqueToken)->with('success', 'Data added successfully.');
        } else {
            return redirect()->back()->with('error', 'Unable to add data.');
        }
    }

    public function render()
    {
        $user = Auth::user();
        $membership = Membership::where('user_id',$user->id)->first();
        $this->name = $membership->name;
        $this->date_of_birth = $membership->date_of_birth;
        $this->referal_id = $membership->referal_id;
        $this->nationality = $membership->nationality;
        $this->marital_status = $membership->marital_status;
        $this->religion = $membership->religion;
        $this->father_name = $membership->father_name;
        $this->mother_name = $membership->mother_name;
        $this->home_address = $membership->home_address;
        $this->city = $membership->city;
        $this->pincode = $membership->pincode;
        $this->state = $membership->state;
        $this->mobile = $membership->mobile;
        $this->whatsapp = $membership->whatsapp;
        $this->email = $membership->email;
        $this->nominee_name = $membership->nominee_name;
        $this->nominee_relation = $membership->nominee_relation;
        $this->bank_name = $membership->bank_name;
        $this->branch_name = $membership->branch_name;
        $this->account_no = $membership->account_no;
        $this->ifsc = $membership->ifsc;
        $this->pancard = $membership->pancard;
        $this->aadhar_card = $membership->aadhar_card;
        $this->image = $membership->image;
        
        return view('livewire.user.member-edit',['member' => $membership]);
    }


    // public function render()
    // {
        

    //     $user = Auth::user();
    //     if (!$user) {
    //         return redirect()->route('login');
    //     }

    //     $member = Membership::where('user_id',$user->id)->first();
    //     return view('livewire.user.member-edit',['member' => $member]);
    // }
}