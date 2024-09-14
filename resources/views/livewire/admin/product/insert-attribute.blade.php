<div class="p-4">
    <form wire:submit.prevent="store" method="POST" class="bg-white p-6 rounded-lg shadow-lg relative">
        @csrf
        <div class="flex items-center mb-6">
            <svg class="w-6 h-6 text-blue-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4.5V19a1 1 0 0 0 1 1h15M7 14l4-4 4 4 5-5m0 0h-3.207M20 9v3.207"/>
              </svg>
              
            <h2 class="text-xl font-semibold text-gray-800">Add New Attribute</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                <input type="text" id="name" wire:model="name" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Attribute Name" />
                @error('name')
                <p class="text-xs text-red-500 font-semibold mt-1">{{$message}}</p>
                @enderror
            </div>
        </div>
        <div class="mt-6 flex justify-end">
            <button
                type="submit" 
                class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:shadow-lg hover:bg-blue-600 transition duration-300">
                <svg class="inline w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 5v14m7-7H5"/>
                </svg>
                Save Attribute
            </button>
        </div>

        <!-- Loading Spinner, only visible when submitting -->
        <div wire:loading wire:target="store" class="absolute inset-0 bg-white bg-opacity-75 flex flex-col items-center justify-center z-10">
            <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-blue-500"></div>
            <span class="mt-4 text-blue-500 font-semibold">Processing...</span>
        </div>
    </form>
</div>
