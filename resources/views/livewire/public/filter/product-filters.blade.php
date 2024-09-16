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
        <h3 class="font-medium mb-2">Price</h3>
        <input type="range" min="50" max="200" class="w-full mb-2">
        <div class="flex justify-between">
            <span>$50</span>
            <span>$200</span>
        </div>
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
