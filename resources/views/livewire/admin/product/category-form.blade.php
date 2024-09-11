<div>
    <form wire:submit.prevent="update" method="POST">
        <div class="p-4 bg-gray-100 rounded-lg mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Product Category</label>

            @if($isEditing)
                <div>
                    @if(count($categories) > 0)
                        <select wire:model="category_id" class="w-full px-3 py-2 border rounded-lg">
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    @else
                        <p>No categories available.</p>
                    @endif

                    <div class="mt-2">
                        <button type="submit" class="bg-black text-white text-xs px-3 py-1 rounded-md">SAVE</button>
                        <button type="button" wire:click="cancel" class="bg-gray-500 text-white text-xs px-3 py-1 rounded-md">CANCEL</button>
                    </div>
                </div>
            @else
                <div class="flex items-center justify-between">
                    <span>{{ $product->category->name ?? 'No Category Selected' }}</span>
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
