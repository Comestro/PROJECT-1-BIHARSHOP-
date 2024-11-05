<div class="flex flex-col overflow-y-auto ">
    <div class="flex-1 overflow-y-auto">
        <!-- Cart Items -->
        @foreach ($orders->orderItems as $item)
        <div class=" flex flex-col lg:flex-row items-center justify-between p-4 py-6 lg:p-6 rounded-lg bg-white border border-slate-200 mb-4 shadow-md">
            <!-- Delete Button -->
            <button wire:click="destroy({{ $item->id }})" class="absolute top-2 right-2 text-red-600 text-xs lg:text-sm flex items-center p-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>

                <!-- <span class="ml-1">Remove</span> -->
            </button>

            <div class="flex items-center w-full lg:w-auto">
                <!-- Image -->
                <img src="{{ $item->products->image ? asset('storage/image/product/' . $item->products->image) : asset('path/to/default-image.jpg') }}"
                    alt="Product Image" class="w-16 h-16 lg:w-24 lg:h-24 object-cover rounded-lg">
                <!-- Product Details -->
                <div class="ml-4 w-full">
                    <p class="font-semibold text-sm lg:text-lg text-gray-800">{{ $item->products->name }}</p>

                    <!-- Size & Color Variants -->
                    @if ($item->sizeVariant)
                    <p class='text-sm text-gray-500'>Size: {{ $item->sizeVariant->variant_value }}</p>
                    @endif
                    @if ($item->colorVariant)
                    <p class="text-sm text-gray-500">Color: {{ $item->colorVariant->variant_value }}</p>
                    @endif

                    <!-- Pricing -->
                    <div class="flex items-baseline gap-2 mt-2">
                        <!-- Original Price -->
                        <p class="text-slate-500 text-sm line-through">
                            ₹{{ number_format($item->products->price * $item->quantity, 2) }}
                        </p>
                        <!-- Discounted Price -->
                        <p class="text-lg lg:text-xl font-bold text-black">
                            ₹{{ number_format($item->products->discount_price * $item->quantity, 2) }}
                        </p>
                        <!-- Discount Percentage -->
                        <p class="text-sm font-semibold text-green-600">
                            {{ $item->products->savingPercentage }}% Off
                        </p>
                    </div>
                </div>
            </div>

            <!-- Quantity Control -->
            <div class="flex items-center justify-between mt-4 lg:mt-0 lg:ml-8 gap-4 w-full lg:w-auto">
                <div class="flex items-baseline gap-2">
                    <button wire:click="decrementQuantity({{ $item->id }})"
                        class="flex justify-center items-center w-8 h-8 text-lg font-semibold bg-slate-200 text-slate-700 rounded-full hover:bg-slate-300 transition"
                        wire:loading.attr="disabled">
                        -
                    </button>
                    <span class="text-lg font-medium text-slate-700">{{ $item->quantity }}</span>
                    <button wire:click="incrementQuantity({{ $item->id }})"
                        class="flex justify-center items-center w-8 h-8 text-lg font-semibold bg-slate-200 text-slate-700 rounded-full hover:bg-slate-300 transition"
                        wire:loading.attr="disabled">
                        +
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>