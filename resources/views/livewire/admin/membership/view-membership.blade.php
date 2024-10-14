<div class="w-full mx-auto p-8 bg-white shadow-xl rounded-lg">
    <!-- Membership Form Heading -->
    <h2 class="text-2xl font-bold text-gray-800 mb-6">View Membership Form</h2>

    <!-- Form Fields -->
    <form wire:submit.prevent="updateMembership" >
        @csrf
        <!-- Applicant Details Section -->
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Membership Referal Details</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
            <input type="text" wire:model="referal_id" name="referal_id" placeholder="Referal ID"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
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

            <input type="tel" name="mobile" placeholder="Mobile"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>

            <input type="tel" wire:model="whatsapp" name="whatsapp" placeholder="WhatsApp (Optional)"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

            <input type="email" name="email" placeholder="Email"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <!-- Nominee Section -->
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Nominee Information</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
            <input type="text" wire:model="nominee_name" name="nominee_name" placeholder="Nominee Name"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>

            <input type="text" wire:model="nominee_relation" name="nominee_relation"
                placeholder="Relation with Nominee"
                class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
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
            <div wire:loading wire:target="image"
                class="flex flex-col items-center mt-24 pl-48 justify-center w-full h-full">
                <svg class="w-8 h-8 text-gray-500 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                </svg>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Uploading...</p>
            </div>


            <!-- Image preview -->
            <div wire:loading.remove wire:target="image" class="w-full h-full flex items-center justify-center">
                @if ($image)
                    <img src="{{ $photo->temporaryUrl() }}" class="object-cover">
                @else
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Image
                            Preview</span></p>
                @endif
            </div>
            @if ($image)
                <div class="mt-2">
                    <img src="{{ $image->temporaryUrl() }}" alt="Preview"
                        class="w-32 h-32 object-cover border border-gray-300">
                </div>
            @elseif($existingImage)
                <div class="mt-2">
                    <img src="{{ asset('storage/image/membership/' . $existingImage) }}" alt="Current Image"
                        class="w-32 h-32 object-cover border border-gray-300">
                </div>
            @endif

        </div>
        @error('image')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror

        <!-- Terms and Conditions -->


        <!-- Submit Button -->
        <div class="flex justify-between space-x-4">
            <button type="submit"
                class="w-full bg-gradient-to-r from-blue-500 to-indigo-500 text-white py-3 rounded-lg hover:from-blue-600 hover:to-indigo-600 shadow-lg">
                Submit Application
            </button>
        </div>
    </form>
</div>
