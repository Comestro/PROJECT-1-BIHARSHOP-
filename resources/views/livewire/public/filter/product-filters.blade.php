<div class="flex flex-col lg:flex-row min-h-screen bg-gray-50 px-4 md:px-10 py-2 gap-5 mb-5  mt-10 md:mt-4">
    <!-- Sidebar for desktop (hidden on mobile) -->
    <aside class="lg:w-1/5 self-start bg-white p-6 shadow-lg rounded-lg border border-slate-100 hidden lg:block">
        <div class="flex flex-1 items-center mb-4 w-full justify-between">
            <h2 class="text-lg font-semibold ">Filters</h2>
            @if ($selectedPriceRanges || $selectedColor || $selectedSize)
                <button wire:click="clearFilter" class="text-white bg-slate-900 px-3 py-2 rounded">Clear Filter</button>
            @endif
        </div>

        <!-- Filter by Category -->
        <div class="mb-6">
            <h3 class="font-medium mb-2">Categories</h3>

            <div class="mt-4">


                <ul class="space-y-2 mt-2 pl-4 border-l-2 border-gray-200">
                    @foreach ($moreCategories as $moreCategory)
                        <li class="flex gap-2 items-center">
                            <svg width="10" height="10" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg"
                                class="IZmjtf">
                                <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z"
                                    fill="grey"></path>
                            </svg>
                            <a wire:navigate
                                href="{{ route('filter', ['cat_id' => $moreCategory->id, 'cat_slug' => $moreCategory->cat_slug]) }}"
                                class="block text-sm text-gray-700 dark:text-gray-300 hover:underline">
                                {{ $moreCategory->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- Parent Category (if applicable) -->
            @if ($category->parent_category_id)
                <!-- Go Back to Parent Category Link -->
                <a wire:navigate
                    href="{{ route('filter', ['cat_id' => $category->parentCategory->id, 'cat_slug' => $category->parentCategory->cat_slug]) }}"
                    class="flex  pl-4 gap-2 items-center mb-4 inline-block text-black font-semibold dark:text-black hover:underline text-sm">
                    <svg width="10" height="10" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg"
                        class="rotate-[270deg] zyl78N">
                        <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="grey"
                            class="S6zWo2"></path>
                    </svg>
                    {{ $category->parentCategory->name }}
                </a>
            @endif

            <!-- Current Category -->
            <ul class="space-y-2 border-l-2 border-gray-300 pl-4">
                <li class="">
                    <!-- Current Category Name -->
                    <span
                        class="block text-sm font-semibold text-black flex gap-2 items-center  dark:text-black hover:underline">
                        <svg width="10" height="10" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg"
                            class="rotate-[270deg] zyl78N">
                            <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="grey"
                                class="S6zWo2"></path>
                        </svg>
                        {{ $category->name }}
                    </span>

                    <!-- Child Categories -->
                    @if ($category->subCategory->count() > 0)
                        <ul class="mt-2 space-y-2 pl-4 border-l-2 border-gray-200">
                            @foreach ($category->subCategory as $subCat)
                                <li>
                                    <a wire:navigate
                                        href="{{ route('filter', ['cat_id' => $subCat->id, 'cat_slug' => $subCat->cat_slug]) }}"
                                        class="block text-sm text-gray-700 dark:text-gray-300 hover:underline">
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
                        <input type="checkbox" wire:model.live="selectedPriceRanges" value="{{ $key }}"
                            class="mr-2 size-4">
                        @if ($key == 'below_500')
                            Below Rs.500 ({{ \App\Models\Product::whereBetween('discount_price', $range)->count() }})
                        @elseif($key == 'above_2500')
                            Above Rs.2500 ({{ \App\Models\Product::where('discount_price', '>=', 2501)->count() }})
                        @else
                            Rs.{{ $range[0] }}-{{ $range[1] }}
                            ({{ \App\Models\Product::whereBetween('discount_price', $range)->count() }})
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
                    <input type="radio" id="blue" name="color" value="blue" wire:model.live="selectedColor"
                        class="hidden peer" />
                    <label for="blue"
                        class="w-6 h-6 block rounded-full bg-blue-500 cursor-pointer peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-blue-500"></label>
                </div>

                <!-- Red -->
                <div>
                    <input type="radio" id="red" name="color" value="red" wire:model.live="selectedColor"
                        class="hidden peer" />
                    <label for="red"
                        class="w-6 h-6 block rounded-full bg-red-500 cursor-pointer peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-red-500"></label>
                </div>

                <!-- Green -->
                <div>
                    <input type="radio" id="green" name="color" value="green" wire:model.live="selectedColor"
                        class="hidden peer" />
                    <label for="green"
                        class="w-6 h-6 block rounded-full bg-green-500 cursor-pointer peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-green-500"></label>
                </div>

                <!-- Yellow -->
                <div>
                    <input type="radio" id="yellow" name="color" value="yellow" wire:model.live="selectedColor"
                        class="hidden peer" />
                    <label for="yellow"
                        class="w-6 h-6 block rounded-full bg-yellow-500 cursor-pointer peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-yellow-500"></label>
                </div>

                <!-- Gray -->
                <div>
                    <input type="radio" id="gray" name="color" value="gray" wire:model.live="selectedColor"
                        class="hidden peer" />
                    <label for="gray"
                        class="w-6 h-6 block rounded-full bg-gray-500 cursor-pointer peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-gray-500"></label>
                </div>
                <div>
                    <input type="radio" id="black" name="color" value="black" wire:model.live="selectedColor"
                        class="hidden peer" />
                    <label for="black"
                        class="w-6 h-6 block rounded-full bg-black cursor-pointer peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-gray-500"></label>
                </div>
            </div>
        </div>
        <!-- Filter by Size -->
        <div class="mb-6">
            <h3 class="font-medium mb-2">Size</h3>
            <div class="space-y-2">
                <button wire:click="$set('selectedSize', 's')"
                        class="px-4 py-2 border rounded
                        {{ $selectedSize === 's' ? 'bg-slate-500 text-white' : '' }}">
                    Small
                </button>

                <button wire:click="$set('selectedSize', 'm')"
                        class="px-4 py-2 border rounded
                        {{ $selectedSize === 'm' ? 'bg-slate-500 text-white' : '' }}">
                    Medium
                </button>

                <button wire:click="$set('selectedSize', 'l')"
                        class="px-4 py-2 border rounded
                        {{ $selectedSize === 'l' ? 'bg-slate-500 text-white' : '' }}">
                    Large
                </button>

                <button wire:click="$set('selectedSize', 'xl')"
                        class="px-4 py-2 border rounded
                        {{ $selectedSize === 'xl' ? 'bg-slate-500 text-white' : '' }}">
                    X-Large
                </button>
                <button wire:click="$set('selectedSize', 'xxl')"
                        class="px-4 py-2 border rounded
                        {{ $selectedSize === 'xxl' ? 'bg-slate-500 text-white' : '' }}">
                    XX-Large
                </button>
            </div>
        </div>

    </aside>

    <!-- Sidebar for mobile (toggleable) -->
   @if ($filterVisible)
   <div class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 flex items-center justify-center">
    <div class="bg-white w-full max-w-lg p-6 relative">
        <!-- Close Button (Cancel) -->
        <button wire:click="toggleFilter" class="absolute top-4 right-4 text-gray-700 hover:text-red-500">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <div class="overflow-y-auto max-h-screen">

        <div class="flex flex-1 items-center mb-4 w-full justify-between">
            <h2 class="text-lg font-semibold ">Filters</h2>

        </div>

        <!-- Filter by Category -->
        <div class="mb-3">
            <h3 class="font-medium mb-2">Categories</h3>
            <div class="mt-2">
                <ul class="space-y-2 mt-2 pl-4 border-l-2 border-gray-200">
                    @foreach ($moreCategories as $moreCategory)
                        <li class="flex gap-2 items-center">
                            <svg width="10" height="10" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg"
                                class="IZmjtf">
                                <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z"
                                    fill="grey"></path>
                            </svg>
                            <a wire:navigate
                                href="{{ route('filter', ['cat_id' => $moreCategory->id, 'cat_slug' => $moreCategory->cat_slug]) }}"
                                class="block text-sm text-gray-700 dark:text-gray-300 hover:underline">
                                {{ $moreCategory->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- Parent Category (if applicable) -->
            @if ($category->parent_category_id)
                <!-- Go Back to Parent Category Link -->
                <a wire:navigate
                    href="{{ route('filter', ['cat_id' => $category->parentCategory->id, 'cat_slug' => $category->parentCategory->cat_slug]) }}"
                    class="flex  pl-4 gap-2 items-center mb-4 inline-block text-black font-semibold dark:text-black hover:underline text-sm">
                    <svg width="10" height="10" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg"
                        class="rotate-[270deg] zyl78N">
                        <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="grey"
                            class="S6zWo2"></path>
                    </svg>
                    {{ $category->parentCategory->name }}
                </a>
            @endif

            <!-- Current Category -->
            <ul class="space-y-2 border-l-2 border-gray-300 pl-4">
                <li class="">
                    <!-- Current Category Name -->
                    <span
                        class="block text-sm font-semibold text-black flex gap-2 items-center  dark:text-black hover:underline">
                        <svg width="10" height="10" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg"
                            class="rotate-[270deg] zyl78N">
                            <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="grey"
                                class="S6zWo2"></path>
                        </svg>
                        {{ $category->name }}
                    </span>

                    <!-- Child Categories -->
                    @if ($category->subCategory->count() > 0)
                        <ul class="mt-2 space-y-2 pl-4 border-l-2 border-gray-200">
                            @foreach ($category->subCategory as $subCat)
                                <li>
                                    <a wire:navigate
                                        href="{{ route('filter', ['cat_id' => $subCat->id, 'cat_slug' => $subCat->cat_slug]) }}"
                                        class="block text-sm text-gray-700 dark:text-gray-300 hover:underline">
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
        <div class="mb-3">
            <h3 class="font-medium mb-2">Price</h3>

            <!-- Loop through the defined price ranges -->
            @foreach ($priceRanges as $key => $range)
                <div class="mb-2">
                    <label class="flex items-center">
                        <input type="checkbox" wire:model.live="selectedPriceRanges" value="{{ $key }}"
                            class="mr-2">
                        @if ($key == 'below_500')
                            Below Rs.500 ({{ \App\Models\Product::whereBetween('discount_price', $range)->count() }})
                        @elseif($key == 'above_2500')
                            Above Rs.2500 ({{ \App\Models\Product::where('discount_price', '>=', 2501)->count() }})
                        @else
                            Rs.{{ $range[0] }}-{{ $range[1] }}
                            ({{ \App\Models\Product::whereBetween('discount_price', $range)->count() }})
                        @endif
                    </label>
                </div>
            @endforeach
        </div>
        <!-- Color Filter Component -->
        <div class="mb-3">
            <h3 class="font-medium mb-2">Select Color</h3>
            <div class="flex space-x-4">
                <!-- Blue -->
                <div>
                    <input type="radio" id="blue" name="color" value="blue" wire:model.live="selectedColor"
                        class="hidden peer" />
                    <label for="blue"
                        class="w-6 h-6 block rounded-full bg-blue-500 cursor-pointer peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-blue-500"></label>
                </div>

                <!-- Red -->
                <div>
                    <input type="radio" id="red" name="color" value="red" wire:model.live="selectedColor"
                        class="hidden peer" />
                    <label for="red"
                        class="w-6 h-6 block rounded-full bg-red-500 cursor-pointer peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-red-500"></label>
                </div>

                <!-- Green -->
                <div>
                    <input type="radio" id="green" name="color" value="green" wire:model.live="selectedColor"
                        class="hidden peer" />
                    <label for="green"
                        class="w-6 h-6 block rounded-full bg-green-500 cursor-pointer peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-green-500"></label>
                </div>

                <!-- Yellow -->
                <div>
                    <input type="radio" id="yellow" name="color" value="yellow" wire:model.live="selectedColor"
                        class="hidden peer" />
                    <label for="yellow"
                        class="w-6 h-6 block rounded-full bg-yellow-500 cursor-pointer peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-yellow-500"></label>
                </div>

                <!-- Gray -->
                <div>
                    <input type="radio" id="gray" name="color" value="gray" wire:model.live="selectedColor"
                        class="hidden peer" />
                    <label for="gray"
                        class="w-6 h-6 block rounded-full bg-gray-500 cursor-pointer peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-gray-500"></label>
                </div>
                <div>
                    <input type="radio" id="black" name="color" value="black" wire:model.live="selectedColor"
                        class="hidden peer" />
                    <label for="black"
                        class="w-6 h-6 block rounded-full bg-black cursor-pointer peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-gray-500"></label>
                </div>
            </div>
        </div>
        <!-- Filter by Size -->
        <div class="mb-3">
            <h3 class="font-medium mb-2">Size</h3>
            <div class="space-y-2">
                <button wire:click="$set('selectedSize', 's')" class="px-4 py-2 border rounded">Small</button>
                <button wire:click="$set('selectedSize', 'm')" class="px-4 py-2 border rounded">Medium</button>
                <button wire:click="$set('selectedSize', 'l')" class="px-4 py-2 border rounded">Large</button>
                <button wire:click="$set('selectedSize', 'xl')" class="px-4 py-2 border rounded">X-Large</button>
            </div>
        </div>

        <!-- Cancel Button -->
        <div class="flex justify-end space-x-2 mt-4">
            <button wire:click="clearFilter" class="px-4 py-2 bg-red-500 text-white rounded">Cancel</button>
        </div>
    </div>
    </div>
</div>

   @endif
    <main class="flex-1 mt-5 md:mt-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class=" text-2xl flex-1 font-bold">{{ $category->name }}</h2>
            <div class="flex items-center gap-2">
            @if ($selectedPriceRanges || $selectedColor || $selectedSize)
                    <button wire:click="clearFilter" class="md:hidden flex  text-white bg-slate-900 px-3 py-2 rounded">Clear Filter</button>
                @else
                    <button wire:click="toggleFilter" class="md:hidden flex px-4 py-1 bg-slate-900 text-white rounded">Open Filters</button>
                @endif
                <div>
                    <select wire:model.live="sortBy" id="sort" class="border rounded text-xs px-2 py-2 w-full">
                        <option value="default">Sort By</option>
                        <option value="price_asc">Price: Low to High</option>
                        <option value="price_desc">Price: High to Low</option>
                        <option value="name_asc">Name: A to Z</option>
                        <option value="name_desc">Name: Z to A</option>
                    </select>
                </div>
        </div>
  </div>

  <div class="relative mt-6 w-full">
    <!-- Products Grid (disabled while loading) -->
    <div class="grid grid-cols-2 lg:grid-cols-3 gap-6 opacity-100 transition-opacity duration-300"
        wire:loading.class="opacity-50 pointer-events-none">
        @if ($products->isEmpty())
            <p class="col-span-full text-center text-gray-500">No products found in the selected price range.</p>
        @else
            @foreach ($products as $product)
                <div class="w-full max-w-sm rounded-lg " wire:key="product-{{ $product->id }}">
                    <a wire:navigate href="{{ route('product.view', ['category' => $product->category->cat_slug, 'slug' => $product->slug]) }}">
                        <div class="rounded-2xl flex bg-zinc-100 overflow-hidden">
                            <img class="object-cover object-top h-[250px] lg:h-[450px] w-full rounded-t-lg"
                                src="{{ $product->image ? asset('storage/image/product/' . $product->image) : asset('path/to/default-image.jpg') }}"
                                alt="product image" />
                        </div>
                        <div class="px-3 mt-2 pb-5">
                            <div>
                                <h5 class="lg:text-lg text-sm font-semibold tracking-tight text-gray-900 dark:text-white line-clamp-2">
                                    {{ $product->name }}
                                </h5>
                            </div>
                            @if ($product->reviews->count() > 0)
                                @php
                                    $averageRating = $product->reviews->average('rating');
                                    $totalReviews = $product->reviews->count();
                                @endphp
                                <div class="flex items-center gap-2" wire:key="{{ $product->id }}">
                                    <div class="flex flex-col md:flex gap-1 items-center">
                                        <div class="flex items-center ">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-4 h-4 fill-current {{ $i <= $averageRating ? 'text-yellow-500' : 'text-gray-300' }}"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M12 17.27L18.18 21 16.54 13.97 22 9.24l-8.24-.69L12 2 10.24 8.55 2 9.24l5.46 4.73L5.82 21z" />
                                                </svg>
                                            @endfor
                                            <span class="text-normal font-semibold ml-1 text-zinc-800">
                                                {{ number_format($averageRating, 1) }}
                                            </span>
                                        </div>
                                    </div>
                                    <span class="text-xs md:text-normal text-gray-600">({{ $totalReviews }} {{ $totalReviews == 1 ? 'review' : 'reviews' }})</span>
                                </div>
                            @endif

                            <div class="flex justify-between">
                                <span class="text-xl md:text-2xl font-semibold text-gray-900 dark:text-white">{{ $product->formattedDiscountPrice }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @endif
    </div>

    <!-- Loader Overlay (absolute) -->
    <div class="absolute inset-0 w-full flex h-screen justify-center items-center bg-white bg-opacity-75 z-10"
        wire:loading>
        <div class="flex flex-col items-center">
            <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-indigo-600"></div>
            <p class="mt-3 text-indigo-600">Loading products...</p>
        </div>
    </div>
</div>

    </main>
</div>

{{--
<div class="flex flex-col lg:flex-row min-h-screen bg-gray-50 px-4 md:px-10 py-2 gap-5 mb-5">
    <aside class="lg:w-1/5 bg-white p-6 shadow-lg rounded-lg border border-slate-100 hidden lg:block">

        <div class="flex flex-1 items-center mb-4 w-full justify-between">
            <h2 class="text-lg font-semibold ">Filters</h2>
            @if ($selectedPriceRanges || $selectedColor || $selectedSize)
                <button wire:click="clearFilter" class="text-white bg-slate-900 px-3 py-2 rounded">Clear Filter</button>
            @endif
        </div>

        <!-- Filter by Category -->
        <div class="mb-6">
            <h3 class="font-medium mb-2">Categories</h3>

            <div class="mt-4">


                <ul class="space-y-2 mt-2 pl-4 border-l-2 border-gray-200">
                    @foreach ($moreCategories as $moreCategory)
                        <li class="flex gap-2 items-center">
                            <svg width="10" height="10" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg"
                                class="IZmjtf">
                                <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z"
                                    fill="grey"></path>
                            </svg>
                            <a wire:navigate
                                href="{{ route('filter', ['cat_id' => $moreCategory->id, 'cat_slug' => $moreCategory->cat_slug]) }}"
                                class="block text-sm text-gray-700 dark:text-gray-300 hover:underline">
                                {{ $moreCategory->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- Parent Category (if applicable) -->
            @if ($category->parent_category_id)
                <!-- Go Back to Parent Category Link -->
                <a wire:navigate
                    href="{{ route('filter', ['cat_id' => $category->parentCategory->id, 'cat_slug' => $category->parentCategory->cat_slug]) }}"
                    class="flex  pl-4 gap-2 items-center mb-4 inline-block text-black font-semibold dark:text-black hover:underline text-sm">
                    <svg width="10" height="10" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg"
                        class="rotate-[270deg] zyl78N">
                        <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="grey"
                            class="S6zWo2"></path>
                    </svg>
                    {{ $category->parentCategory->name }}
                </a>
            @endif

            <!-- Current Category -->
            <ul class="space-y-2 border-l-2 border-gray-300 pl-4">
                <li class="">
                    <!-- Current Category Name -->
                    <span
                        class="block text-sm font-semibold text-black flex gap-2 items-center  dark:text-black hover:underline">
                        <svg width="10" height="10" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg"
                            class="rotate-[270deg] zyl78N">
                            <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="grey"
                                class="S6zWo2"></path>
                        </svg>
                        {{ $category->name }}
                    </span>

                    <!-- Child Categories -->
                    @if ($category->subCategory->count() > 0)
                        <ul class="mt-2 space-y-2 pl-4 border-l-2 border-gray-200">
                            @foreach ($category->subCategory as $subCat)
                                <li>
                                    <a wire:navigate
                                        href="{{ route('filter', ['cat_id' => $subCat->id, 'cat_slug' => $subCat->cat_slug]) }}"
                                        class="block text-sm text-gray-700 dark:text-gray-300 hover:underline">
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
                        <input type="checkbox" wire:model.live="selectedPriceRanges" value="{{ $key }}"
                            class="mr-2">
                        @if ($key == 'below_500')
                            Below Rs.500 ({{ \App\Models\Product::whereBetween('discount_price', $range)->count() }})
                        @elseif($key == 'above_2500')
                            Above Rs.2500 ({{ \App\Models\Product::where('discount_price', '>=', 2501)->count() }})
                        @else
                            Rs.{{ $range[0] }}-{{ $range[1] }}
                            ({{ \App\Models\Product::whereBetween('discount_price', $range)->count() }})
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
                    <input type="radio" id="blue" name="color" value="blue" wire:model.live="selectedColor"
                        class="hidden peer" />
                    <label for="blue"
                        class="w-6 h-6 block rounded-full bg-blue-500 cursor-pointer peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-blue-500"></label>
                </div>

                <!-- Red -->
                <div>
                    <input type="radio" id="red" name="color" value="red" wire:model.live="selectedColor"
                        class="hidden peer" />
                    <label for="red"
                        class="w-6 h-6 block rounded-full bg-red-500 cursor-pointer peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-red-500"></label>
                </div>

                <!-- Green -->
                <div>
                    <input type="radio" id="green" name="color" value="green" wire:model.live="selectedColor"
                        class="hidden peer" />
                    <label for="green"
                        class="w-6 h-6 block rounded-full bg-green-500 cursor-pointer peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-green-500"></label>
                </div>

                <!-- Yellow -->
                <div>
                    <input type="radio" id="yellow" name="color" value="yellow" wire:model.live="selectedColor"
                        class="hidden peer" />
                    <label for="yellow"
                        class="w-6 h-6 block rounded-full bg-yellow-500 cursor-pointer peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-yellow-500"></label>
                </div>

                <!-- Gray -->
                <div>
                    <input type="radio" id="gray" name="color" value="gray" wire:model.live="selectedColor"
                        class="hidden peer" />
                    <label for="gray"
                        class="w-6 h-6 block rounded-full bg-gray-500 cursor-pointer peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-gray-500"></label>
                </div>
                <div>
                    <input type="radio" id="black" name="color" value="black" wire:model.live="selectedColor"
                        class="hidden peer" />
                    <label for="black"
                        class="w-6 h-6 block rounded-full bg-black cursor-pointer peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-gray-500"></label>
                </div>
            </div>
        </div>
        <!-- Filter by Size -->
        <div class="mb-6">
            <h3 class="font-medium mb-2">Size</h3>
            <div class="space-y-2">
                <button wire:click="$set('selectedSize', 's')" class="px-4 py-2 border rounded">Small</button>
                <button wire:click="$set('selectedSize', 'm')" class="px-4 py-2 border rounded">Medium</button>
                <button wire:click="$set('selectedSize', 'l')" class="px-4 py-2 border rounded">Large</button>
                <button wire:click="$set('selectedSize', 'xl')" class="px-4 py-2 border rounded">X-Large</button>
            </div>
        </div>

    </aside>

    <main class="flex-1">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">{{ $category->name }}</h2>

            <!-- Mobile Filter Toggle -->
            <button class="lg:hidden bg-black text-white px-4 py-2 rounded-lg"
                onclick="toggleFilters()">Filters</button>
        </div>




    </main>
</div> --}}
