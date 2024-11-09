<?php

namespace App\Livewire\User\Memberform;

use App\Models\Membership;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Validate;
use Livewire\Component;

class BankDetails extends Component
{
    public $bank_name;
    public $branch_name;
    public $ifsc_code;
    public $error_message = '';
    public $isValidated = false;

    #[Validate]
    public $account_no;
    #[Validate]
    public $pancard;
    #[Validate]
    public $aadhar_card;

    public function rules()
    {
        return [
            'bank_name' => 'required',
            'branch_name' => 'required',
            'account_no' => 'required|digits_between:9,18',
            'ifsc_code' => 'required',
            'pancard' => ['required', 'regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/'], // PAN card validation
            'aadhar_card' => 'required|regex:/^\d{4}-\d{4}-\d{4}$/',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateFields();
        
        if ($propertyName === 'ifsc_code') {
            if ($this->validateIfscCode($this->ifsc_code)) {
                $this->fetchBankDetails($this->ifsc_code);
            } else {
                $this->error_message = "Invalid IFSC Code. Please enter a valid code.";
                $this->bank_name = '';
                $this->branch_name = '';
            }
        }
    }

    protected function validateFields()
    {
        // Check if all required fields are filled correctly
        $this->isValidated = $this->bank_name && $this->branch_name && 
                             $this->account_no && $this->ifsc_code &&
                             preg_match('/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/', $this->pancard) &&
                             preg_match('/^\d{4}-\d{4}-\d{4}$/', $this->aadhar_card);
    }

    public function validateIfscCode($ifsc_code)
    {
        $ifsc_pattern = "/^[A-Z]{4}0[A-Z0-9]{6}$/";
        return preg_match($ifsc_pattern, $ifsc_code);
    }

    public function fetchBankDetails($ifsc_code)
    {
        $response = Http::get("https://ifsc.razorpay.com/{$ifsc_code}");

        if ($response->successful()) {
            $data = $response->json();
            $this->bank_name = $data['BANK'] ?? 'N/A';
            $this->branch_name = $data['BRANCH'] ?? 'N/A';
            $this->error_message = ''; // Clear error message if the response is valid
        } else {
            $this->error_message = 'Failed to fetch bank details. Please check the IFSC code.';
        }
    }

    public function save()
    {
        $this->validate();

        $user = Auth::user();
        $user->membership->bank_name = $this->bank_name;
        $user->membership->branch_name = $this->branch_name;
        $user->membership->account_no = $this->account_no;
        $user->membership->ifsc = $this->ifsc_code;
        $user->membership->pancard = $this->pancard;
        $user->membership->aadhar_card = $this->aadhar_card;
        $user->membership->save();

        $this->dispatch('showNextStep');
        $this->reset(["bank_name", "branch_name", "ifsc_code", "account_no", "pancard", "aadhar_card"]);
        $this->isValidated = false; // Reset validation status after submission
    }

    public function render()
    {
        return <<<'HTML'
        <div>
            <h3 class="text-xl font-semibold text-gray-700 mb-4">Bank Details</h3>
            <form wire:submit.prevent="save" method="post">
                <div class="grid grid-cols-1 gap-6 mb-6">
                    <div class="flex flex-1 flex-col">
                        <input wire:model.blur="ifsc_code" type="text" placeholder="IFSC Code"
                               class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required/>
                        <div wire:loading wire:target="ifsc_code" class="flex flex-col items-center mt-24 pl-48 justify-center w-full h-full">
                        <svg class="w-8 h-8 text-gray-500 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                        </svg>
                        <!-- <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Uploading...</p> -->
                    </div>

                    <div wire:loading.remove wire:target="ifsc_code" class="w-full h-full flex items-center justify-start">
                    @if($bank_name && $branch_name)
                            <!-- <p class="text-green-700 text-sm font-semibold">{{ $bank_name }} ({{$branch_name}})</p> -->
                    @endif
                    </div>
                        <!-- @if($error_message)
                            <p class="text-red-600">{{ $error_message }}</p>
                        @endif
                        @if($bank_name && $branch_name)
                            <p class="text-green-700 text-sm font-semibold">{{ $bank_name }} ({{$branch_name}})</p>
                        @endif -->
                    </div>

                    <div class="flex flex-1 flex-col">
                        <input wire:model.blur="account_no" type="number" placeholder="Account Number"
                               class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required/>
                        @error("account_no")
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-1 flex-col">
                        <input wire:model.blur="pancard" type="text" placeholder="PAN Card Number"
                               class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required/>
                        @error("pancard")
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-1 flex-col">
                        <input wire:model.blur="aadhar_card" type="text" placeholder="Aadhar Card Number"
                               class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" maxlength="14" id="aadhar_card_input" required/>
                        @error("aadhar_card")
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="px-4 py-2 float-end bg-green-600 text-white rounded-lg disabled:bg-green-400 disabled:cursor-not-allowed" @if(!$isValidated) disabled @endif>Save & Next Step</button>
                <br>
                <br>
            </form>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const aadharInput = document.getElementById('aadhar_card_input');

                    aadharInput.addEventListener('input', function (e) {
                        // Remove non-digit characters
                        let value = e.target.value.replace(/\D/g, '');

                        // Add dashes after every 4 digits
                        const formattedValue = value.replace(/(\d{4})(?=\d)/g, '$1-');
                        e.target.value = formattedValue;

                        // Update Livewire property
                        @this.set('aadhar_card', formattedValue);
                    });
                });
            </script>
        </div>
        HTML;
    }
}