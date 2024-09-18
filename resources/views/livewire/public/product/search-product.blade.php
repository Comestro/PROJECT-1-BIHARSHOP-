<div class="relative">
    <!-- Search Input -->
    <div class="relative">       
        <input type="search" wire:model.live="search" id="default-search" class="block w-full p-3 pl-12 text-sm text-gray-900 border border-gray-300 rounded-full bg-white shadow-sm focus:ring-2 focus:ring-blue-500" placeholder="Search for products" />
    </div>

    <!-- Suggestions Dropdown -->
    @if(!empty($search))
        @if($products->isNotEmpty())
            <ul class="absolute z-10 w-full bg-white border border-gray-300 rounded-lg mt-2 shadow-lg max-h-60 overflow-y-auto">
                <!-- Brand Sections -->
                @php
                    $brands = $products->groupBy('brand');
                @endphp
                
                @foreach($brands as $brand => $productsByBrand)                    
                    @foreach($productsByBrand as $product)
                        <li class="flex items-center px-4 py-3 hover:bg-gray-100 cursor-pointer transition-colors duration-150 ease-in-out" wire:click="showProduct('{{ $product->slug }}')">
                            <!-- Product Image -->
                            <img src="{{ $product->image ? asset('storage/image/product/' . $product->image) : asset('path/to/default-image.jpg') }}"
                                 alt="{{ $product->name }}"
                                 class="w-12 h-12 rounded-full mr-3 border border-gray-200">

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
