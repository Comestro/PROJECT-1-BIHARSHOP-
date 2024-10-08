<?php

namespace App\Livewire\Admin\Membership;

use Livewire\Component;

use App\Models\Membership;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Storage;
use Str;

class ManageMembership extends Component

{

    use WithFileUploads;
    public $searchTerm = '';
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
    public $existingImage;
    public $isModalOpen = false;
    public $confirmingDelete = false;


    protected $rules = [
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
    ];

    public function render()
    {
        // Fetch categories based on the search term
        $memberships = Membership::where('name', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('membership_id', 'like', '%' . $this->searchTerm . '%')
            ->get();

        return view('livewire.admin.membership.manage-membership', [
            'memberships' => $memberships,
        ]);
    }

    public function openModal($membershipId)
    {
        $this->membershipId = $membershipId;
        $membership = Membership::find($this->membershipId);
        $this->name = $membership->name;
        $this->existingImage = $membership->image;
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->reset(['image', 'existingImage']);
    }

    public function updateMembership()
    {
        $this->validate();

        $membership = Membership::find($this->membershipId);
        $membership->name = $this->name;
        $membership->cat_slug = $this->slug;
        $membership->cat_description = $this->description;

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

        $this->closeModal();

        session()->flash('message', 'Membership updated successfully.');
    }

    public function deleteMembership()
    {
        if ($this->confirmingDelete) {
            $membership = Membership::find($this->membershipId);

            // Delete image
            if ($membership->image) {
                Storage::delete('public/image/membership/' . $membership->image);
            }

            // Delete category
            $membership->delete();

            $this->confirmingDelete = false;
            session()->flash('message', 'Membership deleted successfully.');
        }
    }

    public function confirmDelete($membershipId)
    {
        $this->membershipId = $membershipId;
        $this->confirmingDelete = true;
    }
}

