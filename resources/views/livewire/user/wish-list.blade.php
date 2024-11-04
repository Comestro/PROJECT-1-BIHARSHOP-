<div class="flex-1 sm:px-4">
    <div class="bg-white p-6 rounded-lg shadow-lg">


        <div class="w-full">
            <div class="flex justify-between items-center mb-6 border-b border-gray-200 pb-2">
                <span class="text-2xl font-bold text-gray-800">My wishlist ({{ $groupedWishlist->count() }})</span>
            </div>

                @forelse ($groupedWishlist as $category => $wishlistItems)
                    <div class="mb-4">
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">{{ $category }}</h3>
                        @foreach ($wishlistItems as $wish)
                            <div class="relative bg-white shadow-sm rounded-lg p-4 mb-2">
                                <div class="w-full flex flex-col sm:flex-row items-center gap-4">
                                    <img class="w-24 h-24 sm:w-24 sm:h-24 object-cover"
                                        src="{{ $wish->product->image ? asset('storage/image/product/' . $wish->product->image) : asset('path/to/default-image.jpg') }}"
                                        alt="{{ $wish->product->name }} Image">
                                    <div class="flex-1">
                                        <div class="text-lg sm:text-base font-semibold text-gray-800 mb-1">
                                            {{ $wish->product->name ?? 'Product Name Unavailable' }}
                                        </div>
                                        <div class="flex items-center gap-4 mb-2">
                                            <div class="text-lg sm:text-base font-bold text-gray-900">
                                                {{ $wish->product->formattedDiscountPrice ?? 'Price Unavailable' }}
                                                <del
                                                    class="text-gray-500 text-sm ml-2">{{ $wish->product->formattedPrice ?? '' }}</del>
                                            </div>
                                            <span class="text-green-600 font-medium">
                                                {{ $wish->product->savingPercentage ?? 0 }}%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <button wire:click="destroy({{ $wish->id }})"
                                    class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">
                                    <!-- SVG for delete button -->
                                </button>
                            </div>
                        @endforeach
                    </div>
                @empty
                    <section class="flex items-center justify-center min-h-screen bg-gray-100 p-6">
                        <div class="max-w-md w-full bg-white shadow-md rounded-lg p-8 text-center">
                            <h2 class="text-2xl font-semibold text-gray-800 mb-2">Your Wishlist is Empty</h2>
                            <p class="text-gray-600 mb-6">Looks like you haven't added anything to your wishlist yet.
                            </p>                            
                        </div>
                    </section>
                @endforelse
            </div>



        </div>



    </div>

</div>
