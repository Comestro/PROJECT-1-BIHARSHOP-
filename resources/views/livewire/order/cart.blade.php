<div class="flex flex-col overflow-y-auto">
    <div class="flex-1 overflow-y-auto">
        <!-- Cart Items -->
        @foreach ($orders->orderItems as $item)
            <div class="flex items-center justify-between p-5 lg:py-10 rounded-lg bg-gray-100 mb-4">
                <div class="flex items-center">
                    <img src="{{ $item->products->image ? asset('storage/image/product/' . $item->products->image) : asset('path/to/default-image.jpg') }}"
                        alt="Product Image" class="w-20 h-20 object-cover rounded-lg">
                    <div class="ml-4">
                        <p class="font-semibold">{{ $item->products->name }}</p>
                        <p class="text-sm text-gray-500">
                            {{ $item->sizeVariant ? 'Size: ' . $item->sizeVariant->variant_value : 'Size: N/A' }}
                        </p>
                        <p class="text-sm text-gray-500">
                            {{ $item->colorVariant ? 'Color: ' . $item->colorVariant->variant_value : 'Color: N/A' }}
                        </p>
                        <div class="flex items-baseline gap-2">
                            <!-- Original Price (multiplied by quantity) -->
                            <p class="text-slate-500 text-md line-through">
                                ₹{{ number_format($item->products->price * $item->quantity, 2) }}
                            </p>
                            <!-- Discounted Price (multiplied by quantity) -->
                            <p class="text-xl font-bold text-black">
                                ₹{{ number_format($item->products->discount_price * $item->quantity, 2) }}
                            </p>
                            <!-- Saving Percentage -->
                            <p class="text-sm font-semibold text-green-600">
                                {{ $item->products->savingPercentage }}% Off
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-10">
                    <div class="flex justify-end">
                        <a href="" class="text-red-600 text-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </a>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <div class="flex items-center space-x-2 bg-gray-100 p-2 rounded-lg">
                            <!-- Decrement Button -->
                            <button wire:click="decrementQuantity({{ $item->id }})"
                                class="flex justify-center items-center w-8 h-8 text-lg font-semibold bg-red-500 text-white rounded-full hover:bg-red-600"
                                wire:loading.attr="disabled">
                                -
                            </button>
                            <!-- Quantity Display -->
                            <span class="text-xl font-medium text-gray-800">{{ $item->quantity }}</span>
                            <!-- Increment Button -->
                            <button wire:click="incrementQuantity({{ $item->id }})"
                                class="flex justify-center items-center w-8 h-8 text-lg font-semibold bg-green-500 text-white rounded-full hover:bg-green-600"
                                wire:loading.attr="disabled">
                                +
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
