<div>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
        </div>
        <input type="search" wire:model.live="search" id="default-search" class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50" placeholder="Search for products" />

        {{-- Suggestions dropdown --}}
        @if(!empty($search) && $products->isNotEmpty())
            <ul class="absolute z-10 w-full bg-white border border-gray-300 rounded-lg mt-1">
                @foreach($products as $product)
                    <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer flex items-center" wire:click="showProduct('{{ $product->slug }}')">
                        {{-- Product Image --}}
                        <img src="{{ $product->image ? asset('storage/image/product/' . $product->image) : asset('path/to/default-image.jpg') }}"
                             alt="{{ $product->name }}"
                             class="w-10 h-10 rounded-full mr-4">

                        {{-- Product Name and Brand --}}
                        <span>
                            {{ $product->name }} ({{ $product->brand }})
                        </span>
                    </li>
                @endforeach
            </ul>
        @elseif(!empty($search))
            <ul class="absolute z-10 w-full bg-white border border-gray-300 rounded-lg mt-1">
                <li class="px-4 py-2 text-gray-500">No results found</li>
            </ul>
        @endif
    </div>
</div>
