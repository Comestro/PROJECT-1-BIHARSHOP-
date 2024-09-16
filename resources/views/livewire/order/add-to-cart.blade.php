<div>
    <form wire:submit.prevent="store" method="post">
        @php
            $colors = $product->variants->where('variant_type', 'color');
            $sizes = $product->variants->where('variant_type', 'size');
        @endphp

        @if ($colors->count())
            <div class="mb-4">
                <span class="text-gray-600">Color: </span>
                <div class="inline-flex space-x-2">
                    @foreach ($colors as $color)
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="radio" wire:model="color_variant_id" name="color_variant_id" value="{{ $color->id }}" class="sr-only peer" {{ $loop->first ? 'checked' : '' }}>
                            <div class="w-6 h-6 bg-{{ $color->variant_value }}-500 rounded-full border peer-checked:ring-2 peer-checked:ring-{{ $color->variant_value }}-500"></div>
                        </label>
                    @endforeach
                </div>
            </div>
        @endif

        @if ($sizes->count())
            <div class="mb-6">
                <span class="text-gray-600">Choose Size:</span>
                <div class="mt-2">
                    <div class="flex gap-2">
                        @foreach ($sizes as $size)
                            <label class="cursor-pointer">
                                <input type="radio" wire:model="size_variant_id" name="size_variant_id" value="{{ $size->id }}" class="hidden peer" {{ $loop->first ? 'checked' : '' }} />
                                <span class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 peer-checked:bg-gray-800 peer-checked:text-white transition duration-300">
                                    {{ $size->variant_value }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <div class="flex items-center space-x-4 mb-6">
            <input type="number" wire:model="quantity" value="1" min="1" class="w-16 px-2 py-2 border rounded-lg text-center">
            <button type="submit" class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-800">Add to Cart</button>
        </div>
    </form>
</div>
