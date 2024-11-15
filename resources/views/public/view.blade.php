@extends('public.layout')
@section('title')
    {{ $product->name }}
@endsection

@section('content')
    <!-- Product Section -->
    <section class="max-w-6xl mx-auto p-5 mt-10 md:mt-0">
        <!-- Grid for Images and Info -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Left Section: Images -->
            <div class="">
                <livewire:product-image-gallery :product="$product" />
            </div>

            <!-- Right Section: Product Info -->
            <div class="flex flex-col justify-start gap-2">
                <!-- Product Title and Price -->
                <div class="flex justify-between items-start">
                    <div class="flex flex-col gap-2">
                        <h1 class="text-2xl md:text-3xl font-thin mb-1">{{ $product->name }}</h1>
                        <div class="flex justify-between items-center">
                            <span class="text-sm md:text-base">{{ $product->category->name }}</span>
                            <!-- Wishlist -->
                            <livewire:wishlist-toggle :productId="$product->id" />
                        </div>
                        @if ($product->reviews->count() > 0)
                            <a href="#content-1">
                                <livewire:product.average-child-star :product="$product" />
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Price and Discount -->
                <div class="text-lg md:text-xl font-semibold mb-4">
                    <span class="text-gray-700 text-3xl md:text-4xl font-semibold hover:underline">
                        {{ $product->formatted_discount_price }}
                    </span>
                    <span class="text-gray-400 line-through ml-2 font-light text-sm md:text-lg">
                        {{ $product->formatted_price }}
                    </span>
                    <span class="text-green-500 ml-2 text-sm">{{ $product->saving_percentage }}% Off</span>
                </div>

                <!-- Product Description -->
                <p class="text-gray-600 mb-6 line-clamp-4 text-sm md:text-base">
                    {{ $product->description }}
                </p>

                <!-- Add to Cart -->
                <livewire:order.add-to-cart :product="$product" />
            </div>
        </div>

        <!-- Tabs for Description, Reviews, FAQs -->
        <div class="mt-12" x-data="{ activeTab: 2 }">
            <!-- Tab Navigation -->
            <div class="border-b">
                <nav class="flex justify-around text-sm md:text-base">
                    <a href="#" 
                       :class="{'border-b-2 border-black font-semibold text-gray-700': activeTab === 1, 'text-gray-600 hover:text-black': activeTab !== 1}" 
                       class="py-2 px-4" 
                       @click.prevent="activeTab = 1">
                        Product Details
                    </a>
                    <a href="#" 
                       :class="{'border-b-2 border-black font-semibold text-gray-700': activeTab === 2, 'text-gray-600 hover:text-black': activeTab !== 2}" 
                       class="py-2 px-4" 
                       @click.prevent="activeTab = 2">
                        Rating & Reviews
                    </a>
                    <a href="#" 
                       :class="{'border-b-2 border-black font-semibold text-gray-700': activeTab === 3, 'text-gray-600 hover:text-black': activeTab !== 3}" 
                       class="py-2 px-4" 
                       @click.prevent="activeTab = 3">
                        FAQs
                    </a>
                </nav>
            </div>

            <!-- Content Sections -->
            <div x-show="activeTab === 1" class="tab-content mt-8 transition-transform duration-500" x-transition>
                <livewire:product.product-details :product="$product" />
            </div>

            <div x-show="activeTab === 2" class="tab-content mt-8 transition-transform duration-500" x-transition>
                @if ($product->reviews->count() > 0)
                    <livewire:product.average-review :product="$product" />
                @endif
                <livewire:product.review-component :product="$product" />
                <div class="space-y-6">
                    <!-- Review Items -->
                    <livewire:product.calling-review :product="$product" />
                    <!-- Load More Button -->
                    <div class="flex justify-center mt-10">
                        <button class="w-full md:w-40 px-4 py-2 rounded-full text-sm font-semibold ring-1 ring-slate-300">Load More</button>
                    </div>
                </div>
            </div>

            <div x-show="activeTab === 3" class="tab-content mt-8 transition-transform duration-500" x-transition>
                <h2 class="text-xl md:text-2xl font-semibold mb-6">FAQs</h2>
                <p class="text-gray-700">Here are the frequently asked questions...</p>
            </div>
        </div>
    </section>

    <h1 class="text-4xl font-black text-center mb-8">You Might Also Like</h1>
    <livewire:product.related-product :slug="$slug" :cat="$category"/>

    {{-- <div class="flex flex-1 justify-center mt-10 px-[5%]"> --}}

    
   

        <!-- <button class=" w-full md:w-40 px-2  py-2 rounded-full text-sm font-semibold ring-1 ring-slate-300">View
            All</button> -->
    <!-- You Might Also Like Section -->
    {{-- <h1 class="text-2xl md:text-4xl font-black text-center mb-8">You Might Also Like</h1>
    <div class="flex flex-col md:flex-row justify-center mt-10 px-5 md:px-[5%]">
        <button class="w-full md:w-40 px-4 py-2 rounded-full text-sm font-semibold ring-1 ring-slate-300">
            View All
        </button>
    </div> --}}

    {{-- <div class="border border-b-0 bg-slate-200 my-12 mx-[5%]"></div> --}}
@endsection
