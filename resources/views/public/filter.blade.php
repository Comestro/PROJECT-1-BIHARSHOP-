@extends('public.layout')

@section('title')
    Filter Page
@endsection

@section('content')
    <div class="flex flex-col lg:flex-row min-h-screen bg-gray-50 px-4 md:px-10 py-2 gap-5 mb-5">
        <!-- Sidebar Filters -->
     <livewire:public.filter.product-filters :category="$category"/>
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
