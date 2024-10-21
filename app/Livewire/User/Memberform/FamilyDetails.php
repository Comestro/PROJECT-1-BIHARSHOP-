<?php

namespace App\Livewire\User\Memberform;

use App\Models\Membership;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FamilyDetails extends Component
{
    public $father_name;
    public $mother_name;
    public $home_address;
    public $city;
    public $state;
    public $pincode;
    public $mobile;
    public $whatsapp;
    public $email;

    public function mount(){
        $referralMember = Membership::where("user_id", Auth::id())->first();
        if($referralMember){
            $this->father_name = $referralMember->father_name;
            $this->mother_name = $referralMember->mother_name;
            $this->home_address = $referralMember->home_address;
            $this->city = $referralMember->city;
            $this->state = $referralMember->state;
            $this->pincode = $referralMember->pincode;
            $this->mobile = $referralMember->mobile;
            $this->whatsapp = $referralMember->whatsapp;
            $this->email = $referralMember->email;
        }

    }
    public function save(){
        $this->validate([
            'father_name' => 'required',
           'mother_name' => 'required',
            'home_address' => 'required',
            'city' => 'required',
           'state' => 'required',
            'pincode' => 'required',
           'mobile' => 'required',
            'whatsapp' => 'required',
            'email' => 'required|email',
        ]);

        // TODO: Save the family details to the database
        $referralMember = Membership::where("user_id", Auth::id())->first();
        $referralMember->father_name = $this->father_name;
        $referralMember->mother_name = $this->mother_name;
        $referralMember->home_address = $this->home_address;
        $referralMember->city = $this->city;
        $referralMember->pincode = $this->pincode;
        $referralMember->state = $this->state;
        $referralMember->mobile = $this->mobile;
        $referralMember->whatsapp = $this->whatsapp;
        $referralMember->email = $this->email;
        $referralMember->save();

        $this->dispatch("showNextStep");
        $this->reset(['father_name','mother_name','home_address','city','state','pincode','mobile','whatsapp','email']);
    }

    public function render()
    {
        return <<<'HTML'
        <div>
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Family Information</h3>
        <form wire:submit.prevent="save" method="post">

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
            <input type="text" wire:model="father_name" name="father_name" placeholder="Father's Name"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>

            <input type="text" wire:model="mother_name" name="mother_name" placeholder="Mother's Name"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>
        <textarea placeholder="Home Address" wire:model="home_address" name="home_address" rows="2"
            class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 mb-6"
            required></textarea>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
            <input type="text" wire:model="city" name="city" placeholder="City"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>

            <select wire:model="state" name="state"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
                <option value="">Select State</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
            </select>

            <input type="number" wire:model="pincode" name="pincode" placeholder="Pincode"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>

            <input type="tel" name="mobile" wire:model="mobile" placeholder="Mobile"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>

            <input type="tel" wire:model="whatsapp" name="whatsapp" placeholder="WhatsApp (Optional)"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

            <input type="email" name="email" wire:model="email" placeholder="Email"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>
        <input type="submit" value="Next" class="bg-green-500 text-white px-3 py-2">
        </form>

        </div>
        HTML;
    }
}
