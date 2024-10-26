<div class="w-full mx-auto p-8 bg-white shadow-xl rounded-lg">
    <!-- Membership Form Heading -->

    <div class="flex flex-1 gap-3 lg:flex-row flex-col">

        <div class="md:w-full">
            <h2 class="font-semibold text-xl mb-3">Membership Coding Form</h2>
            <ol class="flex-1 space-y-4">

                <!-- Step 1: Referral Info -->
                <li>
                    <div class="w-full p-4 {{ $step >= 1 ? ($step === 1 ? ' bg-blue-100' : 'text-green-700 bg-green-50') : 'text-gray-900 bg-gray-100' }} border border-{{ $step >= 1 ? ($step === 1 ? 'blue' : 'green') : 'gray' }}-300 rounded-lg"
                        role="alert">
                        <div class="flex items-center justify-between">
                            <h3 class="font-medium">1. Referral Info</h3>
                            @if ($step > 1)
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                </svg>
                            @endif
                        </div>
                        @if ($step == 1)
                            <livewire:user.memberform.referralDetails />
                        @endif
                    </div>
                </li>

                <!-- Step 2: Applicant Info -->
                <li>
                    <div class="w-full p-4 {{ $step >= 2 ? ($step === 2 ? ' bg-blue-100' : 'text-green-700 bg-green-50') : 'text-gray-900 bg-gray-100' }} border border-{{ $step >= 2 ? ($step === 2 ? 'blue' : 'green') : 'gray' }}-300 rounded-lg"
                        role="alert">
                        <div class="flex items-center justify-between">
                            <h3 class="font-medium">2. Applicant Info</h3>
                            @if ($step > 2)
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                </svg>
                            @endif
                        </div>
                        @if ($step === 2)
                            <livewire:user.memberform.applicantDetails />
                        @endif
                    </div>
                </li>

                <!-- Step 3: Personal Info -->
                <li>
                    <div class="w-full p-4 {{ $step >= 3 ? ($step === 3 ? ' bg-blue-100' : 'text-green-700 bg-green-50') : 'text-gray-900 bg-gray-100' }} border border-{{ $step >= 3 ? ($step === 3 ? 'blue' : 'green') : 'gray' }}-300 rounded-lg"
                        role="alert">
                        <div class="flex items-center justify-between">
                            <h3 class="font-medium">3. Personal Info</h3>
                            @if ($step > 3)
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                </svg>
                            @endif
                        </div>
                        @if ($step === 3)
                            <livewire:user.memberform.familyDetails />
                        @endif
                    </div>
                </li>

                <!-- Step 4: Nominee Info -->
                <li>
                    <div class="w-full p-4 {{ $step >= 4 ? ($step === 4 ? 'text-blue-700 bg-blue-100' : 'text-green-700 bg-green-50') : 'text-gray-900 bg-gray-100' }} border border-{{ $step >= 4 ? ($step === 4 ? 'blue' : 'green') : 'gray' }}-300 rounded-lg"
                        role="alert">
                        <div class="flex items-center justify-between">
                            <h3 class="font-medium">4. Nominee Info</h3>
                            @if ($step > 4)
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                </svg>
                            @endif
                        </div>
                        @if ($step === 4)
                        <livewire:user.memberform.nomineeDetails />
                    @endif
                    </div>
                </li>

                <!-- Step 5: Bank Info -->
                <li>
                    <div class="w-full p-4 {{ $step >= 5 ? ($step === 5 ? 'text-blue-700 bg-blue-100' : 'text-green-700 bg-green-50') : 'text-gray-900 bg-gray-100' }} border border-{{ $step >= 5 ? ($step === 5 ? 'blue' : 'green') : 'gray' }}-300 rounded-lg"
                        role="alert">
                        <div class="flex items-center justify-between">
                            <h3 class="font-medium">5. Bank Info</h3>
                            @if ($step > 5)
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                </svg>
                            @endif
                        </div>
                        @if ($step === 5)
                        <livewire:user.memberform.bankDetails />
                    @endif
                    </div>
                </li>

                <!-- Step 6: Upload Passport Image -->
                <li>
                    <div class="w-full p-4 {{ $step >= 6 ? ($step === 6 ? 'text-blue-700 bg-blue-100' : 'text-green-700 bg-green-50') : 'text-gray-900 bg-gray-100' }} border border-{{ $step >= 6 ? ($step === 6 ? 'blue' : 'green') : 'gray' }}-300 rounded-lg"
                        role="alert">
                        <div class="flex items-center justify-between">
                            <h3 class="font-medium">6. Upload Passport Image</h3>
                            @if ($step > 6)
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                </svg>
                            @endif
                        </div>
                        @if ($step === 6)
                    <livewire:user.memberform.uploadApplicantImage />
                @endif
                    </div>
                </li>

            </ol>
        </div>

    </div>
</div>
