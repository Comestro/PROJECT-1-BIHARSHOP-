<div>
    @if (session()->has('message'))
        <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3" role="alert">
            <p class="font-bold">{{ session('message') }}</p>
        </div>
    @endif

    <form wire:submit.prevent="saveHighlights">
        @foreach ($highlights as $index => $highlight)
            <div class="mb-4">
                <input type="text" wire:model="highlights.{{ $index }}" class="border p-2 w-full" placeholder="Enter highlight"/>
                <button type="button" wire:click="removeHighlight({{ $index }})" class="bg-red-500 text-white px-2 py-1 mt-2">Remove</button>
            </div>
        @endforeach

        <button type="button" wire:click="addHighlight" class="bg-blue-500 text-white px-4 py-2">Add Highlight</button>

        <div class="mt-4">
            <button type="submit" class="bg-green-500 text-white px-4 py-2">Save Highlights</button>
        </div>
    </form>
</div>
