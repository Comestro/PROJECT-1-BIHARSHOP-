<?php

namespace App\Livewire\Admin\Membership;
use App\Models\Membership;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Storage;
use Livewire\Component;

class ViewMembership extends Component
{
    use WithFileUploads;
    public $membershipId;
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
    public $image;
    public $pancard;
    public $aadhar_card;
    public $photo;
    public $id;
    public $existingImage;


//     protected $rules = [
//         'name' => 'required|string|max:255',
//         'date_of_birth' => 'required|string|max:255',
//         'nationality' => 'required|string|max:255',
//         'marital_status' => 'required|string|max:255',
//         'religion' => 'required|string|max:255',
//         'father_name' => 'required|string|max:255',
//         'mother_name' => 'required|string|max:255',
//         'home_address' => 'required|string|max:255',
//         'mobile' => 'required|string|max:255',
//         'city' => 'required|string|max:255',
//         'state' => 'required|string|max:255',
//         'pincode' => 'required|numeric',
//         'email' => 'required|email',
//         'nominee_name' => 'required|string|max:255',
//         'nominee_relation' => 'required|string|max:255',
//         'bank_name' => 'required|string|max:255',
//         'account_no' => 'required|string|max:255',
//         'ifsc' => 'required|string|max:255',
//         'pancard' => 'required|string|max:255',
//         'aadhar_card' => 'required|string|max:255',
// ];

    public function mount($id){
        $this->id = $id;
    }


    public function updateMembership()
    {
        $this->validate();

        $membership = Membership::find($this->id);
        $membership->name = $this->name;
        $membership->date_of_birth = $this->date_of_birth;
        $membership->referalId = $this->referalId;
        $membership->nationality = $this->nationality;
        $membership->marital_status = $this->marital_status;
        $membership->religion = $this->religion;
        $membership->father_name = $this->father_name;
        $membership->mother_name = $this->mother_name;
        $membership->home_address = $this->home_address;
        $membership->city = $this->city;
        $membership->pincode = $this->pincode;
        $membership->state = $this->state;
        $membership->mobile = $this->mobile;
        $membership->whatsapp = $this->whatsapp;
        $membership->email = $this->email;
        $membership->nominee_name = $this->nominee_name;
        $membership->nominee_relation = $this->nominee_relation;
        $membership->bank_name = $this->bank_name;
        $membership->branch_name = $this->branch_name;
        $membership->account_no = $this->account_no;
        $membership->ifsc = $this->ifsc;
        $membership->pancard = $this->pancard;
        $membership->aadhar_card = $this->aadhar_card;

        if ($this->image) {
            // Delete old image
            if ($this->existingImage) {
                Storage::delete('public/image/membership/' . $this->existingImage);
            }

            // Store new image
            $imagePath = $this->image->store('image/membership', 'public');
            $membership->image = basename($imagePath);
        }
        $membership->save();

        session()->flash('message', 'Membership updated successfully.');
    }


    

    public function render()
    {
        $membership = Membership::find($this->id);
        // $this->name = $membership->name;
        // $this->date_of_birth = $membership->date_of_birth;
        // $this->referal_id = $membership->referal_id;
        // $this->nationality = $membership->nationality;
        // $this->marital_status = $membership->marital_status;
        // $this->religion = $membership->religion;
        // $this->father_name = $membership->father_name;
        // $this->mother_name = $membership->mother_name;
        // $this->home_address = $membership->home_address;
        // $this->city = $membership->city;
        // $this->pincode = $membership->pincode;
        // $this->state = $membership->state;
        // $this->mobile = $membership->mobile;
        // $this->whatsapp = $membership->whatsapp;
        // $this->email = $membership->email;
        // $this->nominee_name = $membership->nominee_name;
        // $this->nominee_relation = $membership->nominee_relation;
        // $this->bank_name = $membership->bank_name;
        // $this->branch_name = $membership->branch_name;
        // $this->account_no = $membership->account_no;
        // $this->ifsc = $membership->ifsc;
        // $this->pancard = $membership->pancard;
        // $this->aadhar_card = $membership->aadhar_card;
        // $this->existingImage = $membership->image;
        return view('livewire.admin.membership.view-membership',$membership);
    }
}
