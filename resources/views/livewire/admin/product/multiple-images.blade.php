{{-- <div>
    <form wire:submit.prevent="update" method="POST" enctype="multipart/form-data">
        <div class="p-4 bg-gray-100 rounded-lg mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Product image</label>

            @if($isEditing)
                <div>
                    <input type="file" wire:model="photo" class="w-full px-3 py-2 border rounded-lg">
                    <div wire:loading wire:target="photo" class="mt-2 text-gray-500">Uploading...</div>

                    @if ($photo)
                        <img src="{{ $photo->temporaryUrl() }}" class="mt-4 w-32 h-32">
                    @endif

                    <div class="mt-2">
                        <button type="submit" class="bg-black text-white text-xs px-3 py-1 rounded-md">SAVE</button>
                        <button type="button" wire:click="cancel" class="bg-gray-500 text-white text-xs px-3 py-1 rounded-md">CANCEL</button>
                    </div>
                </div>
            @else
                <div class="flex items-center justify-between">
                    @if($product->image)
                        <img src="{{ asset('storage/image/product/' . $product->image) }}" class="w-32 h-32">
                    @else
                        <span>No Image</span>
                    @endif
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
</div> --}}

{{-- <div>
    <form wire:submit.prevent="update" method="POST" enctype="multipart/form-data">
        <div class="p-4 bg-gray-100 rounded-lg mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Product images</label>

            @if($isEditing)
                <div>
                    <input type="file" wire:model="photos" multiple class="w-full px-3 py-2 border rounded-lg">
                    <div wire:loading wire:target="photos" class="mt-2 text-gray-500">Uploading...</div>

                    @if ($photos)
                        <div class="grid grid-cols-3 gap-4 mt-4">
                            @foreach ($photos as $photo)
                                <img src="{{ $photo->temporaryUrl() }}" class="w-32 h-32">
                            @endforeach
                        </div>
                    @endif

                    <div class="mt-2">
                        <button type="submit" class="bg-black text-white text-xs px-3 py-1 rounded-md">SAVE</button>
                        <button type="button" wire:click="cancel" class="bg-gray-500 text-white text-xs px-3 py-1 rounded-md">CANCEL</button>
                    </div>
                </div>
            @else
                <div class="flex items-center justify-between">
                    @if($productImages && count($productImages) > 0)
                        <div class="grid grid-cols-3 gap-4">
                            @foreach($productImages as $image)
                                <img src="{{ asset('storage/image/product/' . $image->image_path) }}" class="w-32 h-32">
                            @endforeach
                        </div>
                    @else
                        <span>No Images</span>
                    @endif
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
</div> --}}

<div>
    <form wire:submit.prevent="update" method="POST" enctype="multipart/form-data">
        <div class="p-4 bg-gray-100 rounded-lg mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Product images</label>

            @if($isEditing)
                <div>
                    @foreach($inputs as $key => $value)
                        <input type="file" wire:model="photos.{{ $key }}" class="w-full px-3 py-2 border rounded-lg mt-2">
                    @endforeach
                    <div wire:loading wire:target="photos" class="mt-2 text-gray-500">Uploading...</div>

                    @if ($photos)
                        <div class="grid grid-cols-3 gap-4 mt-4">
                            @foreach ($photos as $photo)
                                <img src="{{ $photo->temporaryUrl() }}" class="w-32 h-32">
                            @endforeach
                        </div>
                    @endif

                    <div class="mt-2">
                        <button type="button" wire:click.prevent="addInput" class="bg-blue-500 text-white text-xs px-3 py-1 rounded-md">Add More Images</button>
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="bg-black text-white text-xs px-3 py-1 rounded-md">SAVE</button>
                        <button type="button" wire:click="cancel" class="bg-gray-500 text-white text-xs px-3 py-1 rounded-md">CANCEL</button>
                    </div>
                </div>
            @else
                <div class="flex items-center justify-between">
                    @if($productImages && count($productImages) > 0)
                        <div class="grid grid-cols-3 gap-4">
                            @foreach($productImages as $image)
                                <img src="{{ asset('storage/image/product/' . $image->image_path) }}" class="w-32 h-32">
                            @endforeach
                        </div>
                    @else
                        <span>No Images</span>
                    @endif
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




