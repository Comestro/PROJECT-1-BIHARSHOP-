<div class="flex flex-col bg-gradient-to-b from-indigo-100 to-blue-50 items-center justify-center w-full min-h-screen py-8 px-4">

    <!-- Card Container with gradient shadow effect -->
    <div class="bg-white rounded-3xl shadow-2xl flex flex-col lg:flex-row items-center justify-center w-full max-w-7xl space-y-6 lg:space-y-0 lg:space-x-6 p-8">

        <!-- Scanner Image Section with shadow and hover effect -->
        <div class="bg-gradient-to-br from-purple-200 via-indigo-300 to-blue-200 p-4 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-500 ease-in-out transform hover:scale-105">
            <img src="{{ asset('/assets/scanner.jpeg') }}" alt="Scanner Image" class="w-[380px] h-[380px] object-cover  rounded-xl shadow-lg border-4 border-white">
        </div>


    </div>

    <!-- Form Section with soft background and spacing -->
    <div class="flex flex-col space-y-6 w-full max-w-lg mt-8">

        <form action="" wire:submit.prevent="updateTransaction" class="space-y-6">
            <!-- Transaction Input with soft focus effect -->
            <input type="text" id="transaction-input" wire:model.live="transaction_no"
                placeholder="Enter Transaction No (Optional)"
                class="w-full border p-4 rounded-2xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all duration-300 ease-in-out transform hover:scale-105 bg-white hover:bg-gray-50">
            <!-- Dummy Image Section with shadow and hover effect -->
            <div class="bg-gradient-to-br from-pink-200 via-red-300 to-yellow-200 p-4 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-500 ease-in-out transform hover:scale-105">
                <img src="{{ asset('/assets/dummy.png') }}" alt="Dummy Image" class="w-[380px] h-[380px] object-cover  rounded-xl shadow-lg border-4 border-white">
            </div>

            <!-- Submit Button with gradient background and hover effects -->
            <button type="submit"
                class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-4 rounded-2xl shadow-xl hover:from-blue-600 hover:to-indigo-700 transition-all duration-300 ease-in-out transform hover:scale-105">
                Submit Now
            </button>
        </form>
    </div>

</div>