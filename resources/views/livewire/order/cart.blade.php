<div class="flex flex-col overflow-y-auto relative ">
    <div class="flex-1 overflow-y-auto">
        <!-- Cart Items -->
        @foreach ($orders->orderItems as $item)
            <div class="flex items-center justify-between p-5 lg:py-10 rounded-lg bg-white border border-slate-200 mb-4">
                <div class="flex items-center">
                    <img src="{{ $item->products->image ? asset('storage/image/product/' . $item->products->image) : asset('path/to/default-image.jpg') }}"
                        alt="Product Image" class="w-20 h-20 object-cover rounded-lg">
                    <div class="ml-4">
                        <p class="font-semibold">{{ $item->products->name }}</p>

                            @php echo $item->sizeVariant ? "<p class='text-sm text-gray-500'>Size: " . $item->sizeVariant->variant_value . "</p>" : '' @endphp

                            @php echo $item->colorVariant ? ' <p class="text-sm text-gray-500"> Color: ' . $item->colorVariant->variant_value . "</p>" : "" @endphp

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
                <div class="flex flex-col gap-10 ">
                    <div class="flex justify-end">
                        {{-- place delete link here --}}
                        <button wire:click="destroy({{ $item->id }})" class="text-red-600 text-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                            <div wire:loading wire:target="destroy({{ $item->id }})">
                                <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
                                    <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>


                        </button>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <div class="flex items-center space-x-2  p-2 rounded-lg">
                            <!-- Decrement Button -->
                            <button wire:click="decrementQuantity({{ $item->id }})"
                                class="flex justify-center items-center w-8 h-8 text-lg font-semibold bg-slate-200 text-slate-700   rounded-full hover:bg-slate-100"
                                wire:loading.attr="disabled">
                                -
                            </button>
                            <!-- Quantity Display -->
                            <span class="text-xl font-medium text-slate-700">{{ $item->quantity }}</span>
                            <!-- Increment Button -->
                            <button wire:click="incrementQuantity({{ $item->id }})"
                                class="flex justify-center items-center w-8 h-8 text-lg font-semibold bg-slate-200 text-slate-700  rounded-full hover:bg-slate-100"
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
