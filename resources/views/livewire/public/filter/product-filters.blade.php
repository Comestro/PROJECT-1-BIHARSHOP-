<div class="flex flex-col lg:flex-row min-h-screen bg-gray-50 px-4 md:px-10 py-2 gap-5 mb-5">
    <aside class="lg:w-1/5 bg-white p-6 shadow-lg rounded-lg border border-slate-100 hidden lg:block">
    <h2 class="text-lg font-semibold mb-4">Filters</h2>

    <!-- Filter by Category -->

    <div class="mb-6">
        <h3 class="font-medium mb-2">Categories</h3>

        @if ($category->parent_category_id)
        <!-- Go Back to Parent Category Link -->
        <a wire:navigate href="{{ route('filter', ['cat_id' => $category->parentCategory->id, 'cat_slug' => $category->parentCategory->cat_slug]) }}" class="flex items-center  mb-4 inline-block">
            <svg class="w-[21px] h-[21px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="m17 16-4-4 4-4m-6 8-4-4 4-4"/>
              </svg>

               {{ $category->parentCategory->name }}
        </a>
    @endif

        <ul>
            <li>
                <a href="">{{$category->name}}</a>

                <ul class="space-y-2">
                    @foreach ($category->subCategory as $subCat)
                    <li>
                        <a wire:navigate href="{{ route('filter', ['cat_id'=>$subCat->id, 'cat_slug' => $subCat->cat_slug]) }}" class="flex text-sm items-center cursor-pointer">{{$subCat->name}}</a>
                    </li>
                    @endforeach
                </ul>
            </li>
        </ul>

    </div>


    <!-- Filter by Price -->
    <div class="mb-6">
        <h3 class="font-medium mb-4">Price</h3>

        <!-- Loop through the defined price ranges -->
        @foreach ($priceRanges as $key => $range)
            <div class="mb-2">
                <label class="flex items-center">
                    <input type="checkbox" wire:model.live="selectedPriceRanges" value="{{ $key }}" class="mr-2">
                    @if($key == 'below_500')
                        Below Rs.500 ({{ \App\Models\Product::whereBetween('discount_price', $range)->count() }})
                    @elseif($key == 'above_2500')
                        Above Rs.2500 ({{ \App\Models\Product::where('discount_price', '>=', 2501)->count() }})
                    @else
                        Rs.{{ $range[0] }}-{{ $range[1] }} ({{ \App\Models\Product::whereBetween('discount_price', $range)->count() }})
                    @endif
                </label>
            </div>
        @endforeach
    </div>

    <!-- Color Filter Component -->
    <div class="mb-6">
        <h3 class="font-medium mb-2">Select Color</h3>
        <div class="flex space-x-4">
            <!-- Blue -->
            <div>
                <input type="radio" id="blue" name="color" value="blue" class="hidden peer" />
                <label for="blue"
                    class="w-6 h-6 block rounded-full bg-blue-500 cursor-pointer peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-blue-500"></label>
            </div>

            <!-- Red -->
            <div>
                <input type="radio" id="red" name="color" value="red" class="hidden peer" />
                <label for="red"
                    class="w-6 h-6 block rounded-full bg-red-500 cursor-pointer peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-red-500"></label>
            </div>

            <!-- Green -->
            <div>
                <input type="radio" id="green" name="color" value="green" class="hidden peer" />
                <label for="green"
                    class="w-6 h-6 block rounded-full bg-green-500 cursor-pointer peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-green-500"></label>
            </div>

            <!-- Yellow -->
            <div>
                <input type="radio" id="yellow" name="color" value="yellow" class="hidden peer" />
                <label for="yellow"
                    class="w-6 h-6 block rounded-full bg-yellow-500 cursor-pointer peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-yellow-500"></label>
            </div>

            <!-- Gray -->
            <div>
                <input type="radio" id="gray" name="color" value="gray" class="hidden peer" />
                <label for="gray"
                    class="w-6 h-6 block rounded-full bg-gray-500 cursor-pointer peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-gray-500"></label>
            </div>
        </div>
    </div>



    <!-- Filter by Size -->
    <div class="mb-6">
        <h3 class="font-medium mb-2">Size</h3>
        <div class="space-y-2">
            <button class="px-4 py-2 border rounded">Small</button>
            <button class="px-4 py-2 border rounded">Medium</button>
            <button class="px-4 py-2 border rounded">Large</button>
            <button class="px-4 py-2 border rounded">X-Large</button>
        </div>
    </div>

    <!-- Apply Filter Button -->
    <button class="w-full py-2 mt-4 bg-black text-white rounded-lg">Apply Filter</button>
</aside>

<main class="flex-1">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">{{ $category->name }}</h2>

        <!-- Mobile Filter Toggle -->
        <button class="lg:hidden bg-black text-white px-4 py-2 rounded-lg"
            onclick="toggleFilters()">Filters</button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Product Card -->

        @foreach ($products as $item)
            <livewire:public.product.product-card :item="$item" />
        @endforeach

    </div>


</main>
</div>
