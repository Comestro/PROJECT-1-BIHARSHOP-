<div>
    <form wire:submit.prevent="update" method="POST" enctype="multipart/form-data">
        <div class="p-4 bg-gray-100 rounded-lg mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Product images</label>

            <div>
                <!-- Always show a single file input for uploading images one by one -->
               <div class="flex flex-1 items-stretch">
                <input type="file" wire:model="photo" class="w-full px-3 py-2 border mt-2">
                <div class="mt-2">
                    <button type="submit" class="bg-black h-full px-7 text-white text-xs ">SAVE</button>
                </div>
               </div>
                <div wire:loading wire:target="photo" class="mt-2 text-gray-500">Uploading...</div>

                <!-- Display the preview of the uploaded image -->
                @if ($photo)
                    <div class="mt-4">
                        <img src="{{ $photo->temporaryUrl() }}" class="w-32 h-32">
                    </div>
                @endif

                <!-- Save button -->

            </div>

            <!-- Show existing product images with delete option -->
            <div class="mt-4">
                @if($productImages && count($productImages) > 0)
                    <div class="grid grid-cols-3 gap-4">
                        @foreach($productImages as $image)
                            <div class="relative group">
                                <!-- Product image -->
                                <img src="{{ asset('storage/image/product/' . $image->image_path) }}" class="w-full h-32 object-cover rounded-md shadow-md">

                                <!-- Delete button -->
                                <button type="button" wire:click="deleteImage({{ $image->id }})"
                                        class="absolute top-1 right-1 bg-red-600 text-white text-sm rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        @endforeach
                    </div>
                @else
                    <span>No Images</span>
                @endif
            </div>
        </div>
    </form>

    <!-- Display flash message -->
    @if(session()->has('message'))
        <div class="mt-4 p-2 bg-green-500 text-white rounded-md">
            {{ session('message') }}
        </div>
    @endif
</div>
