<div>
    <form wire:submit.prevent="store" method="post">
    @php
        $colors = $product->variants->where('variant_type', 'color');
    @endphp

    @if ($colors->count())
        <div class="mb-4">
            <span class="text-gray-600">Color: </span>
            <div class="inline-flex space-x-2">
                @foreach ($colors as $color)
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="radio" name="color" value="{{ $color->variant_value }}" class="sr-only peer">
                        <input type="hidden" name="product_variant_models_id" value="{{ $color->variant_value }}">
                        <div
                            class="w-6 h-6 bg-{{ $color->variant_value }}-500 rounded-full border peer-checked:ring-2 peer-checked:ring-{{ $color->variant_value }}-500">
                        </div>
                    </label>
                @endforeach
            </div>
        </div>
    @endif

    @php
        $sizes = $product->variants->where('variant_type', 'size');
    @endphp

    @if ($sizes->count())
        <div class="mb-6">
            <span class="text-gray-600">Choose Size:</span>
            <div class="mt-2">
                <div class="mt-2 flex gap-2">
                    @foreach ($sizes as $size)
                        <label class="cursor-pointer">
                            <input type="radio" name="size" value="{{ $size->variant_value }}"
                                class="hidden peer" />
                            <span
                                class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 peer-checked:bg-gray-800 peer-checked:text-white transition duration-300">
                                {{ $size->variant_value }}
                            </span>
                        </label>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="flex items-center space-x-4 mb-6">
        <input type="number" value="1" min="1" class="w-16 px-2 py-2 border rounded-lg text-center">
        <button class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-800">Add to Cart</button>
    </div>
</form>
</div>
