<div>
    <form wire:submit.prevent="update" method="POST" class="bg-white p-6 rounded-lg shadow-md relative">
        @csrf


        <!-- Product Variants Section -->
        <div class="mt-4">
            <h3 class="text-lg font-semibold mb-4">Product Variants</h3>

            <!-- Loop through variants and render form fields -->
            @foreach($variants as $index => $variant)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label for="variant_type_{{ $index }}" class="block text-gray-700 font-semibold mb-2">Variant Type</label>
                        <input type="text" id="variant_type_{{ $index }}" wire:model="variants.{{ $index }}.type" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" placeholder="e.g., Size or Color" />
                        @error('variants.' . $index . '.type')
                        <p class="text-xs text-red-500 font-semibold">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="variant_value_{{ $index }}" class="block text-gray-700 font-semibold mb-2">Variant Value</label>
                        <input type="text" id="variant_value_{{ $index }}" wire:model="variants.{{ $index }}.value" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" placeholder="e.g., Red, XL" />
                        @error('variants.' . $index . '.value')
                        <p class="text-xs text-red-500 font-semibold">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="variant_price_{{ $index }}" class="block text-gray-700 font-semibold mb-2">Variant Price</label>
                        <input type="text" id="variant_price_{{ $index }}" wire:model="variants.{{ $index }}.price" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" placeholder="Enter Variant Price" />
                        @error('variants.' . $index . '.price')
                        <p class="text-xs text-red-500 font-semibold">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="variant_stock_{{ $index }}" class="block text-gray-700 font-semibold mb-2">Variant Stock</label>
                        <input type="text" id="variant_stock_{{ $index }}" wire:model="variants.{{ $index }}.stock" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" placeholder="Enter Variant Stock" />
                        @error('variants.' . $index . '.stock')
                        <p class="text-xs text-red-500 font-semibold">{{$message}}</p>
                        @enderror
                    </div>
                    <!-- Remove Variant Button -->
                    <div class="flex items-end">
                        <button type="button" wire:click="removeVariant({{ $index }})" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Remove</button>
                    </div>
                </div>
                
            @endforeach

            <!-- Add New Variant Button -->
            <div class="flex justify-end mt-4">
                <button type="button" wire:click="addVariant" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Add Variant</button>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 flex justify-end">
            <button
                type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Update Product
            </button>
        </div>

        <!-- Loading Spinner -->
        <div wire:loading wire:target="update" class="absolute inset-0 top-[50%] left-[50%] bg-white bg-opacity-75 flex flex-col items-center justify-center z-10">
            <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-blue-500"></div>
            <span class="mt-4 text-blue-500 font-semibold">Processing...</span>
        </div>
    </form>
</div>
