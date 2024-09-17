<div class="flex flex-col lg:flex-row min-h-screen bg-gray-50 px-4 md:px-10 py-2 gap-5 mb-5">
    <aside class="lg:w-1/5 bg-white p-6 shadow-lg rounded-lg border border-slate-100 hidden lg:block">
    <h2 class="text-lg font-semibold mb-4">Filters</h2>

    <!-- Filter by Category -->

    <div class="mb-6">
        <h3 class="font-medium mb-2">Categories</h3>

        <div class="mt-4">


                <ul class="space-y-2 mt-2 pl-4 border-l-2 border-gray-200">
                    @foreach ($moreCategories as $moreCategory)
                        <li class="flex gap-2 items-center">
                            <svg width="10" height="10" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg" class="IZmjtf"><path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="grey"></path></svg>
                            <a wire:navigate href="{{ route('filter', ['cat_id' => $moreCategory->id, 'cat_slug' => $moreCategory->cat_slug]) }}" class="block text-sm text-gray-700 dark:text-gray-300 hover:underline">
                                {{ $moreCategory->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
        </div>
        <!-- Parent Category (if applicable) -->
        @if ($category->parent_category_id)
            <!-- Go Back to Parent Category Link -->
            <a wire:navigate href="{{ route('filter', ['cat_id' => $category->parentCategory->id, 'cat_slug' => $category->parentCategory->cat_slug]) }}" class="flex items-center mb-4 inline-block text-gray-700 dark:text-gray-200 hover:underline">
                <svg class="w-5 h-5 text-gray-800 dark:text-white mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m17 16-4-4 4-4m-6 8-4-4 4-4"/>
                </svg>
                {{ $category->parentCategory->name }}
            </a>
        @endif

        <!-- Current Category -->
        <ul class="space-y-2 border-l-2 border-gray-300 pl-4">
            <li>
                <!-- Current Category Name -->
                <span class="block font-semibold text-lg text-gray-900 dark:text-gray-100">
                    {{ $category->name }}
                </span>

                <!-- Child Categories -->
                @if ($category->subCategory->count() > 0)
                    <ul class="mt-2 space-y-2 pl-4 border-l-2 border-gray-200">
                        @foreach ($category->subCategory as $subCat)
                            <li>
                                <a wire:navigate href="{{ route('filter', ['cat_id' => $subCat->id, 'cat_slug' => $subCat->cat_slug]) }}" class="block text-sm text-gray-700 dark:text-gray-300 hover:underline">
                                    {{ $subCat->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <!-- No subcategories message -->
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">No subcategories available</p>
                @endif
            </li>
        </ul>

        <!-- More Categories Section -->

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


    <div class="relative mt-6">
        <!-- Loader Overlay (absolute) -->
        <div class="absolute inset-0 flex justify-center items-center bg-white bg-opacity-75 z-10" wire:loading>
            <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-indigo-600"></div>
            <p class="ml-3 text-indigo-600">Loading products...</p>
        </div>

        <!-- Products Grid (disabled while loading) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 opacity-100 transition-opacity duration-300" wire:loading.class="opacity-50 pointer-events-none">
            @if($products->isEmpty())
                <p class="col-span-full text-center text-gray-500">No products found in the selected price range.</p>
            @else
                @foreach ($products as $product)
                <div class="w-full max-w-sm  rounded-lg " wire:key="product-{{ $product->id }}">
                    <a wire:navigate href=" {{route('product.view',['category'=>$product->category->cat_slug, 'slug' => $product->slug])}}">
                        <div class="rounded-2xl flex  bg-zinc-100 overflow-hidden">
                            <img class="object-cover object-top h-[250px] lg:h-[450px] w-full rounded-t-lg" src="{{ $product->image ? asset('storage/image/product/' . $product->image) : asset('path/to/default-image.jpg') }}" alt="product image" />
                        </div>
                        <div class="px-3 mt-2 pb-5">
                            <div>
                                <h5 class="lg:text-lg font-semibold tracking-tight text-gray-900 dark:text-white">{{$product->name}}</h5>
                            </div>
                            @if ($product->reviews->count() > 0)
                            @php
                                $averageRating = $product->reviews->average('rating');
                                $totalReviews = $product->reviews->count();
                            @endphp
                            <div class="flex items-center gap-2" wire:key="{{$product->id}}">
                                <div class="flex flex-col md:flex items-center">
                                <div class="flex items-center">
                                     @for ($i = 1; $i <= 5; $i++)
                                         <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current {{ $i <= $averageRating ? 'text-yellow-500' : 'text-gray-300' }}"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                             <path d="M12 17.27L18.18 21 16.54 13.97 22 9.24l-8.24-.69L12 2 10.24 8.55 2 9.24l5.46 4.73L5.82 21z" />
                                         </svg>
                                     @endfor
                                     <span class="text-normal font-semibold text-zinc-800 ">{{ number_format($averageRating, 1) }}</span>

                                 </div>
                                </div>
                                 <span class="text-gray-600">({{$totalReviews}} {{ $totalReviews == 1? "review":"reviews" }})</span>
                             </div>
                            @endif

                            <div class="flex justify-between">
                                <span class="text-xl md:text-2xl font-semibold text-gray-900 dark:text-white">{{$product->formattedDiscountPrice}}</span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            @endif
        </div>
    </div>

</main>
</div>
