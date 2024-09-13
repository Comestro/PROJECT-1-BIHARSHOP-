<div class="grid grid-cols-2 md:grid-cols-4 gap-4 px-[5%]">
    @forelse($topSelling as $item)
    @if(!$item->status) <!-- Check if status is true -->
        <div class="w-full max-w-sm rounded-lg">
            <a href="{{ route('product.view', ['category' => $item->category->cat_slug, 'slug' => $item->slug]) }}">
                <div class="rounded-2xl flex bg-zinc-100 overflow-hidden">
                    <img class="object-cover object-top h-[250px] lg:h-[450px] w-full rounded-t-lg" src="{{ $item->image ? asset('storage/image/product/' . $item->image) : asset('path/to/default-image.jpg') }}" alt="product image" />
                </div>
                <div class="px-3 mt-2 pb-5">
                    <div>
                        <h5 class="lg:text-lg font-semibold tracking-tight text-gray-900 dark:text-white">{{ $item->name }}</h5>
                    </div>
                    <div class="flex items-center mt-2.5 mb-2">
                        <div class="flex items-center space-x-1 rtl:space-x-reverse">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-4 h-4 {{ $i < $item->rating ? 'text-yellow-300' : 'text-gray-200 dark:text-gray-600' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                            @endfor
                            <span class="text-xs font-semibold px-2.5 py-0.5 rounded ms-3">5.0/5</span>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-xl md:text-2xl font-semibold text-gray-900 dark:text-white">Rs.{{ $item->discount_price }}</span>
                    </div>
                </div>
            </a>
        </div>
    @else
        <!-- Optionally display a placeholder or message if the status is not true -->
        <div class="w-full max-w-sm rounded-lg bg-gray-200 p-4">
            <p class="text-center text-gray-500">Product not available</p>
        </div>
    @endif
    @empty
        <div class="col-span-2 md:col-span-4 text-center text-gray-500">
            <p>No products found</p>
        </div>
    @endforelse
</div>
