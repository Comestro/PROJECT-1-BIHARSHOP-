@extends('public.layout')

@section('title')
    Filter Page
@endsection

@section('content')
    <div class="flex flex-col lg:flex-row min-h-screen bg-gray-50 px-4 md:px-10 py-2 gap-5 mb-5">
        <!-- Sidebar Filters -->
        <aside class="lg:w-1/5 bg-white p-6 shadow-lg rounded-lg border border-slate-100 hidden lg:block">
            <h2 class="text-lg font-semibold mb-4">Filters</h2>

            <!-- Filter by Category -->
            <div class="mb-6">
                <h3 class="font-medium mb-2">Categories</h3>
                <ul class="space-y-2">
                    <li><label><input type="checkbox" class="mr-2"> T-shirts</label></li>
                    <li><label><input type="checkbox" class="mr-2"> Shorts</label></li>
                    <li><label><input type="checkbox" class="mr-2"> Shirts</label></li>
                    <li><label><input type="checkbox" class="mr-2"> Hoodies</label></li>
                    <li><label><input type="checkbox" class="mr-2"> Jeans</label></li>
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

        <!-- Product Grid -->
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

            <!-- Pagination -->
            <div class="mt-8 flex justify-between items-center">
                <button class="px-4 py-2 bg-gray-200 rounded-lg">Previous</button>
                <div class="space-x-2">
                    <button class="px-3 py-1 bg-black text-white rounded-full">1</button>
                    <button class="px-3 py-1 bg-gray-200 rounded-full">2</button>
                    <button class="px-3 py-1 bg-gray-200 rounded-full">3</button>
                </div>
                <button class="px-4 py-2 bg-black text-white rounded-lg">Next</button>
            </div>
        </main>
    </div>



    <!-- Mobile Sidebar -->
    <div id="mobileFilters"
        class="fixed inset-0 bg-white z-50 p-4 transform translate-x-full lg:hidden transition-transform duration-300">
        <button class="bg-black text-white px-4 py-2 rounded-lg mb-4" onclick="toggleFilters()">Close</button>
        <!-- Same filter content as the sidebar -->
        <aside class="bg-white p-6 shadow-lg rounded-lg border border-slate-100">
            <h2 class="text-lg font-semibold mb-4">Filters</h2>

            <!-- Filter by Category -->
            <div class="mb-6">
                <h3 class="font-medium mb-2">Categories</h3>
                <ul class="space-y-2">
                    <li><label><input type="checkbox" class="mr-2"> T-shirts</label></li>
                    <li><label><input type="checkbox" class="mr-2"> Shorts</label></li>
                    <li><label><input type="checkbox" class="mr-2"> Shirts</label></li>
                    <li><label><input type="checkbox" class="mr-2"> Hoodies</label></li>
                    <li><label><input type="checkbox" class="mr-2"> Jeans</label></li>
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

            <!-- Apply Filter Button -->
            <button class="w-full py-2 mt-4 bg-black text-white rounded-lg">Apply Filter</button>
        </aside>
    </div>

    <!-- Toggle Script -->
    <script>
        function toggleFilters() {
            const mobileFilters = document.getElementById('mobileFilters');
            if (mobileFilters.classList.contains('translate-x-full')) {
                mobileFilters.classList.remove('translate-x-full');
            } else {
                mobileFilters.classList.add('translate-x-full');
            }
        }
    </script>
@endsection
