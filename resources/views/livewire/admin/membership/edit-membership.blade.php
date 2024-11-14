<div class="w-full mx-auto p-8 bg-white shadow-xl rounded-lg">
    <!-- Membership Form Heading -->
    <h2 class="text-2xl font-bold text-gray-800 mb-6">View Membership Form</h2>

    <!-- Form Fields -->
    <form wire:submit.prevent="updateMembership">
        @csrf
        <!-- Applicant Details Section -->
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Membership Referal Details</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
            <input type="text" wire:model="referal_id" name="referal_id" placeholder="Referal ID"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
            @error('referal_id')
                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
            @enderror

            <input type="text" placeholder="Referred By"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                readonly>
        </div>
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Applicant Details</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
            <input type="text" wire:model.live="name" name="name" placeholder="First Name"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
            @error('name')
                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
            @enderror

            <input type="date" wire:model.live="date_of_birth" name="date_of_birth" placeholder="Date of Birth"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
            @error('date_of_birth')
                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
            @enderror

            <select wire:model="nationality" name="nationality"
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

            <select wire:model="marital_status" name="marital_status"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
                <option value="">Marital Status</option>
                <option value="married">Married</option>
                <option value="unmarried">Unmarried</option>
                <option value="single">single</option>
            </select>
            @error('marital_status')
                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
            @enderror

            <select wire:model="religion" name="religion"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
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

        </div>

        <!-- Family Information Section -->
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Family Information</h3>
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

            <input type="tel" wire:model="mobile" placeholder="Mobile"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>

            <input type="tel" wire:model="whatsapp" name="whatsapp" placeholder="WhatsApp (Optional)"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

            <input type="email" wire:model="email" placeholder="Email"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <!-- Nominee Section -->
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Nominee Information</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
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

        </div>

        <!-- Bank Details Section -->
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Bank Details</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
            <input type="text" wire:model="bank_name" name="bank_name" placeholder="Bank Name"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
            <input type="text" wire:model="branch_name" name="branch_name" placeholder="Branch Name"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>

            <input type="number" wire:model="account_no" name="account_no" placeholder="Account Number"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>

            <input type="text" wire:model="ifsc" name="ifsc" placeholder="IFSC Code"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>

            <input type="text" wire:model="pancard" name="pancard" placeholder="PAN Card Number"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

            <input type="text" wire:model="aadhar_card" name="aadhar_card" placeholder="Aadhar Card Number"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Applicant Image Section -->
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Upload Applicant Image</h3>
        <div class="flex items-center justify-center w-full p-4">
            <label for="dropzone-file"
                class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                            upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                        (MAX. 800x400px)</p>
                </div>
                <input id="dropzone-file" wire:model="photo" type="file" class="hidden" />
            </label>
            <div wire:loading wire:target="photo"
                class="flex flex-col items-center mt-24 pl-48 justify-center w-full h-full">
                <svg class="w-8 h-8 text-gray-500 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4">
                    </circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                </svg>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Uploading...</p>
            </div>


            <!-- Image preview -->
            <div wire:loading.remove wire:target="photo" class="w-full h-full flex items-center justify-center">
                @if ($photo)
                    <img src="{{ $photo->temporaryUrl() }}" class="object-cover w-32 h-32">
                @elseif($currentImage)
                    <div class="mt-2">
                        <img src="{{ asset('storage/image/membership/' . $currentImage) }}" alt="Current Image"
                            class="w-auto h-32 object-cover">
                    </div>
                @else
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Image
                            Preview</span></p>
                @endif
            </div>
            {{-- @if ($photo)
                <div class="mt-2">
                    <img src="{{ $photo->temporaryUrl() }}" alt="Preview"
                        class="w-32 h-32 object-cover border border-gray-300">
                </div>
            @elseif($currentImage)
                <div class="mt-2">
                    <img src="{{ asset('storage/image/membership/' . $currentImage) }}" alt="Current Image"
                        class="w-auto h-32 object-cover border border-gray-300">
                </div>
            @endif --}}

        </div>
        @error('image')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror

        <!-- Terms and Conditions -->
        {{-- <td class="px-4 py-4  whitespace-nowrap text-sm text-gray-500">
            <button wire:model="status"
                class="relative inline-flex items-center h-6 rounded-full w-11 transition-colors duration-200 focus:outline-none
            {{ $member->status ? 'bg-green-500' : 'bg-red-500' }}">
                <span class="sr-only">{{ $member->status ? 'Deactivate' : 'Activate' }}</span>
                <span
                    class="inline-block w-5 h-5 transform bg-white rounded-full transition-transform duration-200 ease-in-out
                {{ $member->status ? 'translate-x-5' : 'translate-x-0' }}"></span>
            </button>
        </td> --}}



        @if ($isVerified == 1)
            <div class="my-4">
                <label class="flex items-center space-x-3">
                    <span class="text-sm text-green-600 font-semibold">Already Verified</span>
                </label>
            </div>
        @else
        {{-- <div class="my-4">
            <label class="flex items-center space-x-3">
                <span class="text-sm text-blue-600 font-semibold">Verification Pending</span>
            </label>
        </div> --}}

            <div class="my-4">
                <label class="flex items-center space-x-3">
                    <input type="checkbox" wire:model="isVerified" required name="terms"
                        class="w-5 h-5 text-blue-500 focus:ring-blue-500" required>
                    <span class="text-sm">Verify Membership Details</span>
                </label>
            </div>
        @endif

        @if ($isPaid == 1)
            <div class="my-4">
                <label class="flex items-center space-x-3">
                    <span class="text-sm text-green-600 font-semibold">Payment Already Done</span>
                </label>
            </div>
        @else
        {{-- <div class="my-4">
            <label class="flex items-center space-x-3">
                <span class="text-sm text-blue-600 font-semibold">Payment Verification Pending</span>
            </label>
        </div> --}}
            <div class="my-4">
                <label class="flex items-center space-x-3">
                    <input type="checkbox" wire:model="isPaid" required name="terms"
                        class="w-5 h-5 text-blue-500 focus:ring-blue-500" required>
                    <span class="text-sm">Approve Payment Details</span>
                </label>
            </div>
        @endif

        @if ($membership_id)
            <div class="my-4">
                <label class="flex items-center gap-5 ">
                    <span class="text-sm text-green-600 font-semibold">Already Generated Id </span>
                    <input type="text" wire:model="membership_id" name="membership_id" 
                    class=" p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
                </label>
            </div>
        @else
        {{-- <div class="my-4">
            <label class="flex items-center space-x-3">
                <span class="text-sm text-blue-600 font-semibold">Membership Not Generated </span>
            </label>
        </div> --}}
            <div class="my-4">
                <label class="flex items-center space-x-3">
                    <input type="checkbox" wire:model="membership_id" required name="terms"
                        class="w-5 h-5 text-blue-500 focus:ring-blue-500" required>
                    <span class="text-sm">Generate Membership Id</span>
                </label>
            </div>
        @endif

        <input type="text" wire:model="transaction_no" name="transaction_no" placeholder="Transaction No."
            class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2">


        <!-- Submit Button -->
        <div class="flex justify-between space-x-4">
            <button type="submit"
                class="w-full bg-gradient-to-r from-blue-500 to-indigo-500 text-white py-3 rounded-lg hover:from-blue-600 hover:to-indigo-600 shadow-lg">
                Update Details
            </button>
        </div>
    </form>
</div>
