<div>
    <form wire:submit.prevent="store" method="POST" class="bg-white p-6 rounded-lg shadow-md relative">
        @csrf
        <div class="mb-4">
            <label for="attribute_id" class="block text-gray-700 font-semibold mb-2">Attribute Name</label>
            <select id="attribute_id" wire:model="attribute_id" class="w-full px-3 py-2 capitalize border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">Select Attribute</option>
                @foreach($attributes as $attribute)
                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                @endforeach
            </select>
            @error('attribute_id')
            <p class="text-xs text-red-500 font-semibold">{{$message}}</p>
            @enderror
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="value" class="block text-gray-700 font-semibold mb-2">Value</label>
                <input type="text" id="value" wire:model="value" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" placeholder="Enter Value" />
                @error('value')
                <p class="text-xs text-red-500 font-semibold">{{$message}}</p>
                @enderror
            </div>
        </div>
        <div class="mt-6 flex justify-end">
            <button
                type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Save Value
            </button>
        </div>

        <!-- Loading Spinner, only visible when submitting -->
        <div wire:loading wire:target="store" class="absolute inset-0 top-[50%] left-[50%] bg-white bg-opacity-75 flex flex-col items-center justify-center z-10">
            <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-blue-500"></div>
            <span class="mt-4 text-blue-500 font-semibold">Processing...</span>
        </div>
    </form>
</div>
