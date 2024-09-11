{{-- <div>
    <form wire:submit.prevent="update" method="POST">
        <div class="p-4 bg-gray-100 rounded-lg mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Status</label>

            @if($isEditing)
                <div>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" wire:model.live="status" value="" class="sr-only peer">
                        <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Toggle me</span>
                      </label>

                    <div class="mt-2">
                        <button type="submit" class="bg-black text-white text-xs px-3 py-1 rounded-md">SAVE</button>
                        <button type="button" wire:click="cancel" class="bg-gray-500 text-white text-xs px-3 py-1 rounded-md">CANCEL</button>
                    </div>
                </div>
            @else
                <div class="flex items-center justify-between">
                    <span>{{ $product->status }}</span>
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
    <form wire:submit.prevent="update" method="POST">
        <div class="p-4 bg-gray-100 rounded-lg mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Status</label>

            @if($isEditing)
                <div>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" wire:model.live="status" class="sr-only peer">
                        <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Change me</span>
                    </label>

                    <div class="mt-2">
                        <button type="submit" class="bg-black text-white text-xs px-3 py-1 rounded-md">SAVE</button>
                        <button type="button" wire:click="cancel" class="bg-gray-500 text-white text-xs px-3 py-1 rounded-md">CANCEL</button>
                    </div>
                </div>
            @else
                <div class="flex items-center justify-between">
                    <span>
                        @if($product->status)
                            Active
                        @else
                            Inactive
                        @endif
                    </span>
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

