<div class="flex flex-col  bg-gray-50  items-center justify-center w-full">

    <div
        class="bg-white rounded-lg shadow-xl flex flex-col h-screen w-full items-center space-y-6 lg:flex-row lg:space-y-0 lg:space-x-6">
        <div
            class="bg-gray-100 p-4 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
            <img src="{{ asset('/assets/scanner.jpeg') }}" alt="Scanner Image" class="w-40 h-full object-cover rounded-md">
        </div>

        <div
            class="bg-gray-100 p-4 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
            <img src="{{ asset('/assets/dummy.png') }}" alt="Dummy Image" class="w-40 h-full object-cover rounded-md">
        </div>
    </div>

    <div class="flex flex-col space-y-4 w-full max-w-lg">
        <form action="" wire:submit.prevent="updateTransaction">
            <input type="text" id="transaction-input" wire:model.live="transaction_no"
                placeholder="Transaction No (Optional)"
                class="w-full border p-3 rounded-md shadow-sm focus:ring-2 focus:ring-blue-400 outline-none transition duration-300">

            <button type="submit"
                class="w-full bg-gradient-to-r from-blue-500 to-indigo-500 text-white py-3 rounded-lg hover:from-blue-600 hover:to-indigo-600 shadow-lg text-center transition duration-300 ease-in-out transform hover:scale-105">
                Submit Now
            </button>
        </form>
    </div>

</div>
