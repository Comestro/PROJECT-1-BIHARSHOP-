<div>
    <form wire:submit.prevent="update" method="POST">
        <div class="p-4 bg-gray-100 rounded-lg mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Product Description</label>

            @if($isEditing)
                <div>
                    <textarea wire:model.live="description" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter new product description" rows="4"></textarea>
                    <div class="mt-2">
                        <button type="submit" class="bg-black text-white text-xs px-3 py-1 rounded-md">SAVE</button>
                        <button type="button" wire:click="cancel" class="bg-gray-500 text-white text-xs px-3 py-1 rounded-md">CANCEL</button>
                    </div>
                </div>
            @else
                <div class="flex items-center justify-between">
                    <span>{{ $product->description }}</span>
                    <button type="button" wire:click="edit" class="bg-black text-white text-xs px-3 py-1 rounded-md">EDIT</button>
                </div>
            @endif
        </div>
    </form>

    @if(session()->has('message'))
        <div class="mt-4 p-2 bg-green-500 text-white rounded-md">
            {{ session('message') }}
        </div>
    @endif
</div>
