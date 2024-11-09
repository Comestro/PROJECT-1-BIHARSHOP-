<?php

namespace App\Livewire\User\Memberform;

use App\Models\Membership;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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

    public $isValidated = false;

    public function mount()
    {
        $referralMember = Membership::where("user_id", Auth::id())->first();
        if ($referralMember) {
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

    public function updated($propertyName)
    {
        $this->validateFields();
    }

    protected function validateFields()
    {
        $this->isValidated = !empty($this->father_name) &&
                             !empty($this->mother_name) &&
                             !empty($this->home_address) &&
                             !empty($this->city) &&
                             !empty($this->state) &&
                             !empty($this->pincode) &&
                             !empty($this->mobile) &&
                             !empty($this->email);
    }

    public function updatedPincode($value)
    {
        $this->reset(['city', 'state']); // Reset previous values
        if (strlen($value) > 0) {
            $this->fetchLocationByPincode($value);
        }
    }

    private function fetchLocationByPincode($pincode)
    {
        $response = Http::get("https://api.postalpincode.in/pincode/{$pincode}");

        if ($response->successful() && $response->json()[0]['PostOffice']) {
            $this->city = $response->json()[0]['PostOffice'][0]['District'];
            $this->state = $response->json()[0]['PostOffice'][0]['State'];
        } else {
            // Optionally, you can handle errors or reset city/state
            $this->city = null;
            $this->state = null;
        }
    }

    public function save()
    {
        $this->validate([
            'father_name' => 'required',
            'mother_name' => 'required',
            'home_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
        ]);

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
        $this->reset(['father_name', 'mother_name', 'home_address', 'city', 'state', 'pincode', 'mobile', 'whatsapp', 'email']);
    }

    public function render()
    {
        return <<<'HTML'
        <div>
            <form wire:submit.prevent="save" method="post" class="mt-3">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                    <input type="text" wire:model.live="father_name" name="father_name" placeholder="Father's Name"
                        class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>

                    <input type="text" wire:model.live="mother_name" name="mother_name" placeholder="Mother's Name"
                        class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <textarea placeholder="Home Address" wire:model.live="home_address" name="home_address" rows="2"
                    class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 mb-6"
                    required></textarea>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                    <div class="flex flex-col">
                        <input type="number" wire:model.live="pincode" name="pincode" placeholder="Pincode"
                            class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <div wire:loading wire:target="pincode" class="flex flex-col items-center mt-24 pl-48 justify-center w-full h-full">
                        <svg class="w-8 h-8 text-gray-500 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                        </svg>
                        <!-- <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Uploading...</p> -->
                    </div>

                    <div wire:loading.remove wire:target="pincode" class="w-full h-full flex items-center justify-start">
                    @if($city && $state)
                            <p class="text-green-700 text-sm font-semibold">{{ $city }} ({{$state}})</p>
                        @endif
                    </div>
                       
                    </div>

                    <input type="tel" name="mobile" wire:model.live="mobile" placeholder="Mobile"
                    class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required maxlength="10" pattern="[0-9]{10}">


                    <input type="tel" wire:model.live="whatsapp" name="whatsapp" placeholder="WhatsApp (Optional)"
                        class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <input type="email" name="email" wire:model.live="email" placeholder="Email"
                        class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <input type="submit" value="Submit & Next Step" class="bg-green-700 disabled:cursor-not-allowed disabled:bg-green-500 hover:cursor-pointer rounded-lg float-end text-white px-3 py-2" @if(!$isValidated) disabled @endif>
                <br>
                <br>
            </form>
        </div>
        HTML;
    }
}