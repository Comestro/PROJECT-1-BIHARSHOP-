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
        // $memberships = Membership::where('terms_and_condition',1)->where('name', 'like', '%' . $this->searchTerm . '%')
        //     ->orWhere('membership_id', 'like', '%' . $this->searchTerm . '%')
        //     ->get();

        $memberships = Membership::where('terms_and_condition', 1)->where(function ($query) {
        $query->where('name', 'like', '%' . $this->searchTerm . '%')
              ->orWhere('membership_id', 'like', '%' . $this->searchTerm . '%');
    })
    ->get();

        return view('livewire.admin.membership.manage-membership', [
            'memberships' => $memberships,
        ]);
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

