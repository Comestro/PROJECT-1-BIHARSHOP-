<div class="w-full max-w-sm  rounded-lg ">
        <a wire:navigate href=" {{route('product.view',['category'=>$item->category->cat_slug, 'slug' => $item->slug])}}">
            <div class="rounded-2xl flex  bg-zinc-100 overflow-hidden">
                <img class="object-cover object-top h-[250px] lg:h-[450px] w-full rounded-t-lg" src="{{ $item->image ? asset('storage/image/product/' . $item->image) : asset('path/to/default-image.jpg') }}" alt="product image" />
            </div>
            <div class="px-3 mt-2 pb-5">
                <div>
                    <h5 class="lg:text-lg font-semibold tracking-tight text-gray-900 dark:text-white">{{$item->name}}</h5>
                </div>
                <livewire:product.product-star/>
                
                <div class="flex justify-between">
                    <span class="text-xl md:text-2xl font-semibold text-gray-900 dark:text-white">{{$item->formattedDiscountPrice}}</span>
                </div>
            </div>
        </a>
    </div>