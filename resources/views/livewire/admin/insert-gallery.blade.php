<div class="flex flex-col md:flex-row bg-white p-6 rounded-lg shadow-md gap-6">
    <form wire:submit.prevent="store" method="POST" class="flex-1 bg-white relative">
        @csrf
        <div class="grid grid-cols-1 gap-4">
            <div>
                <label for="caption" class="block text-gray-700">Caption</label>
                <input type="text" id="caption" wire:model="caption" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" placeholder="Enter Caption" />
                @error('caption')
                <p class="text-xs text-red-500 font-semibold">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="mb-3 block text-sm font-medium text-black ">
                    Gallery Image
                </label>
                <div class="flex flex-1 md:flex-row flex-col gap-5">
                    <div class="flex-1">
                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                        (MAX. 800x400px)</p>
                                </div>
                                <input id="dropzone-file" wire:model="photo" type="file" class="hidden" />
                            </label>
                            
                        </div>
                        @error('photo')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="flex flex-1 flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600 overflow-hidden p-3">

                        <!-- Loading state -->
                        <div wire:loading wire:target="photo" class="flex flex-col items-center mt-24 pl-48 justify-center w-full h-full">
                            <svg class="w-8 h-8 text-gray-500 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                            </svg>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Uploading...</p>
                        </div>
                    
                        <!-- Image preview -->
                        <div wire:loading.remove wire:target="photo" class="w-full h-full flex items-center justify-center">
                            @if ($photo)
                                <img src="{{ $photo->temporaryUrl() }}" class="object-cover">
                            @else
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Image Preview</span></p>
                            @endif
                        </div>
                    
                    </div>
                    
                </div>
            </div>
            <div>
                <label for="status" class="block text-gray-700">Status</label>
                <div class="flex items-center">
                    <input type="checkbox" id="status" wire:model="status" class="mr-2" checked />
                    @error('status')
                    <p class="text-xs text-red-500 font-semibold">{{$message}}</p>
                    @enderror
                    <span>Active</span>
                </div>
            </div>
        </div>
        <div class="mt-6 flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save Gallery</button>
        </div>
        <div wire:loading wire:target="store" class="absolute inset-0 bg-white bg-opacity-75 flex items-center justify-center z-10">
            <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-blue-500"></div>
            <span class="mt-4 text-blue-500 font-semibold">Processing...</span>
        </div>
    </form>
</div>
