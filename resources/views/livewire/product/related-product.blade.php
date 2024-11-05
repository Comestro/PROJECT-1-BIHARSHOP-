<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 px-[5%]">
    @foreach ($product as $item)
    <div class="w-full max-w-sm rounded-lg">
        <a wire:navigate href="{{ route('product.view', ['category' => $item->category->cat_slug, 'slug' => $item->slug]) }}">
            <div class="rounded-2xl flex bg-zinc-100 overflow-hidden">
                <img class="object-cover object-top h-[180px] sm:h-[200px] md:h-[220px] lg:h-[250px] w-full rounded-t-lg"
                     src="{{ $item->image ? asset('storage/image/product/' . $item->image) : asset('path/to/default-image.jpg') }}" 
                     alt="product image" />
            </div>
            <div class="px-2 sm:px-3 mt-2 pb-4">
                <div>
                    <h5 class="text-sm sm:text-base lg:text-lg font-semibold tracking-tight text-gray-900 line-clamp-2">
                        {{ $item->name }}
                    </h5>
                </div>
                @if ($item->reviews->count() > 0)
                <livewire:product.product-star :product="$item" />
                @endif
                <div class="flex justify-between mt-1">
                    <span class="text-lg sm:text-xl md:text-2xl font-semibold text-gray-900">
                        {{ $item->formattedDiscountPrice }}
                    </span>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
