<div class="relative">
    <!-- Search Input -->
    <div class="relative flex">
        <form class="flex items-center max-w-lg mx-auto" wire:submit.prevent="searchProduct">
            <label for="voice-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <input type="search" wire:model.live="search" id="voice-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                    placeholder="Search Products..." required />
            </div>
            <button type="submit"
                class="inline-flex items-center py-2.5 px-3 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>Search
            </button>
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
