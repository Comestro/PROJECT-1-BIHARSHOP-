<?php

namespace App\Livewire\User\Memberform;

use App\Models\Membership;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ApplicantDetails extends Component
{
    public $name;
    public $date_of_birth;
    public $nationality;
    public $marital_status;
    public $religion;

    public $isValidated = false;

    public function mount()
    {
        $user = Auth::user();
        $membership = Membership::where('user_id', $user->id)->first();
        $this->name = $membership->name;
        $this->date_of_birth = $membership->date_of_birth;
        $this->nationality = $membership->nationality;
        $this->marital_status = $membership->marital_status;
        $this->religion = $membership->religion;
    }

    public function updated($propertyName)
    {
        $this->validateFields();
    }

    protected function validateFields()
    {
        // Check if all fields are filled
        $this->isValidated = !empty($this->name) && 
                             !empty($this->date_of_birth) && 
                             !empty($this->nationality) && 
                             !empty($this->marital_status) && 
                             !empty($this->religion);
    }

    public function save()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'nationality' => ['required', 'string'],
            'marital_status' => ['required', 'string'],
            'religion' => ['required', 'string'],
        ]);

        $user = Auth::user();
        $membership = Membership::where('user_id', $user->id)->first();
        $membership->name = $this->name;
        $membership->date_of_birth = $this->date_of_birth;
        $membership->nationality = $this->nationality;
        $membership->marital_status = $this->marital_status;
        $membership->religion = $this->religion;
        $membership->save();

        $this->dispatch('showNextStep');
        $this->reset(["name", "religion", "date_of_birth", "marital_status", "nationality"]);
        $this->isValidated = false; // Reset validation status after submission
    }

    public function render()
    {
        return <<<'HTML'
        <div>
            <h3 class="text-xl font-semibold text-gray-700 mb-4">Applicant Details</h3>
            <form wire:submit.prevent="save" class="grid grid-cols-1 gap-6 mb-6">
                <div class="grid grid-cols-1 gap-6 mb-6">
                    <input type="text" wire:model.live="name" name="name" placeholder="First Name"
                        class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    @error('name')
                        <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                    @enderror

                    <input type="date" wire:model.live="date_of_birth" name="date_of_birth" placeholder="Date of Birth"
                        class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required id="date_of_birth">
                    @error('date_of_birth')
                        <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                    @enderror

                    <select wire:model.live="nationality" name="nationality"
                        class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="">Nationality</option>
                        <option value="Indian">Indian</option>
                        <option value="NRI">NRI</option>
                        <option value="Others">Others</option>
                    </select>
                    @error('nationality')
                        <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                    @enderror

                    <select wire:model.live="marital_status" name="marital_status"
                        class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="">Marital Status</option>
                        <option value="married">Married</option>
                        <option value="unmarried">Unmarried</option>
                        <option value="single">Single</option>
                    </select>
                    @error('marital_status')
                        <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                    @enderror

                    <select wire:model.live="religion" name="religion"
                        class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 col-span-2"
                        required>
                        <option value="">Religion</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Muslim">Muslim</option>
                        <option value="Sikh">Sikh</option>
                        <option value="Bodh">Bodh</option>
                        <option value="Christian">Christian</option>
                    </select>
                    @error('religion')
                        <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                    @enderror

                    <div class="flex flex-1 col-span-2 justify-end">
                        <input type="submit" @if(!$isValidated) disabled @endif class="disabled:bg-green-400 disabled:cursor-not-allowed bg-green-600 text-white px-3 py-2 rounded-lg" value="Submit & Next Step">
                    </div>
                </div>
            </form>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const today = new Date();
                    const minDate = new Date(today.setFullYear(today.getFullYear() - 12)).toISOString().split('T')[0];
                    document.getElementById('date_of_birth').setAttribute('max', minDate);
                });
            </script>
        </div>
        HTML;
    }
}
