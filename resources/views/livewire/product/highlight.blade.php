<div class="bg-gray-100 shadow-md rounded-lg p-6">
    <div class="flex flex-1 justify-between items-center my-2">
        <h2 class="block text-gray-700 text-sm font-bold mb-2">Product Highlights</h2>


        <button type="button" wire:click="addHighlight" class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition duration-300">
            Add More
        </button>
    </div>
    @if (session()->has('message'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p class="font-bold">{{ session('message') }}</p>
        </div>
    @endif

    <form wire:submit.prevent="saveHighlights">
        @foreach ($highlights as $index => $highlight)
            <div class="mb-4 flex items-center">
                <input type="text" wire:model="highlights.{{ $index }}" class="border py-1 p-2 w-full rounded-l-md focus:outline-none border-slate-200 focus:ring-2 focus:ring-blue-500" placeholder="Enter highlight"/>
                <button type="button" wire:click="removeHighlight({{ $index }})" class="bg-red-500 text-white px-2 py-1 rounded-r-md hover:bg-red-600 transition duration-300">
                    <svg class="w-6 h-6 text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                      </svg>

                </button>
            </div>
        @endforeach

        <div class="flex justify-between mt-4">

            <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition duration-300">
                Update Highlights
            </button>
        </div>
    </form>
</div>
