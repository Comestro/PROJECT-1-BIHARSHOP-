<div class="relative">
    <!-- Search Input -->
    <div class="relative flex">
        <form class="flex items-center max-w-lg mx-auto w-full" wire:submit.prevent="searchProduct">
            <label for="voice-search" class="sr-only">Search</label>
            <div class="relative flex w-full bg-gray-50 rounded-full border border-gray-300">
                <!-- Search Icon on the left -->
                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" wire:model.live="search" id="voice-search"
                    class="w-full bg-transparent text-gray-900 text-sm rounded-full pl-12 pr-10 py-2.5 focus:outline-none focus:ring-2 focus:ring-slate-500"
                    placeholder="Search Products..." required />
            </div>
        </form>
    </div>
    
    

    <!-- Suggestions Dropdown -->
    @if (!empty($search))
        @if ($products->isNotEmpty())
            <ul
                class="absolute z-10 w-full bg-white border border-gray-300 rounded-lg mt-2 shadow-lg max-h-60 overflow-y-auto">
                <!-- Brand Sections -->
                @php
                    $brands = $products->groupBy('brand');
                @endphp

                @foreach ($brands as $brand => $productsByBrand)
                    @foreach ($productsByBrand as $product)
                        <li class="flex items-center px-4 py-3 hover:bg-gray-100 cursor-pointer transition-colors duration-150 ease-in-out"
                            wire:click="showProduct('{{ $product->slug }}')">
                            <!-- Product Image -->
                            <img src="{{ $product->image ? asset('storage/image/product/' . $product->image) : asset('path/to/default-image.jpg') }}"
                                alt="{{ $product->name }}" class="w-12 h-12 rounded-full mr-3 border border-gray-200">

                            <!-- Product Name and Category -->
                            <div class="flex flex-col">
                                <span class="text-sm font-medium text-gray-800">{{ $product->name }}</span>
                                <span class="text-xs text-gray-500">{{ $product->category->name }}</span>
                            </div>
                        </li>
                    @endforeach
                @endforeach
            </ul>
        @else
            <ul class="absolute z-10 w-full bg-white border border-gray-300 rounded-lg mt-2 shadow-lg">
                <li class="px-4 py-3 text-gray-500 text-sm">No results found</li>
            </ul>
        @endif
    @endif
</div>
