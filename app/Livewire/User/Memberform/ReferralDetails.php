<?php

namespace App\Livewire\User\Memberform;

use App\Models\Membership;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReferralDetails extends Component
{
    public $referral_id;
    public $referred_by;
    public $isValidated = false;


    public function mount(){

        $referralMember = Membership::where("user_id", Auth::id())->first();
        if(($referralMember->user_id == Auth::id()) && (Auth::user()->isAdmin == 1)){
            $this->dispatch('showNextStep');
        }
    }

    public function updatedReferralId($value){

        // reset before updating
        $this->reset(["referred_by", "isValidated"]);

        $referralMember = Membership::where("membership_id", $value)->first();


        $this->validate([
            'referral_id' => ['required', "exists:memberships,membership_id"],
        ]);

        $this->referred_by = $referralMember->name;
        $this->isValidated = true;
    }

    public function save(){

        $this->validate([
            'referral_id' => ['required', "exists:memberships,membership_id"],
        ]);

        $referralMember = Membership::where("membership_id", $this->referral_id)->first();
        $user = auth()->user();
        $user->membership->referal_id = $referralMember->id;
        $user->membership->save();
        $this->reset(["referral_id", "referred_by", "isValidated"]);
        $this->dispatch('showNextStep');

    }
    public function render()
    {
        return <<<'HTML'
        <div>
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Membership Referal Details</h3>
        <form wire:submit.prevent="save" class="grid grid-cols-1 gap-6 mb-6">
            <div class="flex flex-1 flex-col">
            <input type="text" wire:model.live="referral_id" name="referal_id" placeholder="Referal ID"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('referral_id')
                <p class="text-sm mt-1 text-red-500 font-semibold">{{ $message }}</p>
            @enderror
            </div>
            <div class="flex flex-1">
            <input type="text" value="{{$referred_by}}" readonly class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            @if($isValidated)
            <div class="flex flex-1 justify-end">
                <input type="submit" class="bg-green-600 text-white px-3 py-2" value="Next">
            </div>
            @endif
        </div>
        </form>
        HTML;
    }
}
