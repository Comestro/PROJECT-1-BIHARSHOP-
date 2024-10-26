<?php

namespace App\Livewire\User\Memberform;

use App\Models\Membership;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NomineeDetails extends Component
{
    public $nominee_name;
    public $nominee_relation;

    public function mount(){
        $referralMember = Membership::where("user_id", Auth::id())->first();
        if($referralMember){
            $this->nominee_name = $referralMember->nominee_name;
            $this->nominee_relation = $referralMember->nominee_relation;
        }
    }
    public function save(){
        $this->validate([
            'nominee_name' => 'required|string',
            'nominee_relation' => 'required|string',
        ]);
        // save to database
        $referralMember = Membership::where("user_id", Auth::id())->first();
        $referralMember->nominee_name = $this->nominee_name;
        $referralMember->nominee_relation = $this->nominee_relation;
        $referralMember->save();
        $this->dispatch('showNextStep');
        $this->reset(['nominee_name', 'nominee_relation']);
    }

    public function render()
    {
        return <<<'HTML'
        <div>
        <form wire:submit.prevent="save" method="post" class="mt-3">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <input type="text" wire:model="nominee_name" name="nominee_name" placeholder="Nominee Name"
                    class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>

                <select type="text" wire:model="nominee_relation" name="nominee_relation"
                    placeholder="Relation with Nominee"
                    class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Relation</option>
                    <option value="Father">Father</option>
                    <option value="Mother">Mother</option>
                    <option value="Brother">Brother</option>
                    <option value="Sister">Sister</option>
                    <option value="Son">Son</option>
                    <option value="Daughter">Daughter</option>
                    <option value="Grandfather">Grandfather</option>
                    <option value="Grandmother">Grandmother</option>
                    <option value="Uncle">Uncle</option>
                    <option value="Aunt">Aunt</option>
                    <option value="Nephew">Nephew</option>
                    <option value="Niece">Niece</option>
                    <option value="Cousin">Cousin</option>
                    <option value="Wife">Wife</option>
                    <option value="Friend">Friend</option>
                </select>

                <div class="mb-3 flex-1 col-span-2">
                    <input type="submit" class="bg-teal-600 rounded-lg float-end px-3 py-2 text-white hover:cursor-pointer" value="Submit & Next Step">
                </div>
            </div>
        </form>
        </div>
        HTML;
    }
}
