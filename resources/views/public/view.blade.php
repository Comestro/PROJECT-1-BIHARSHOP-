@extends('public.layout')
@section('title')
    View Page
@endsection

@section('content')
    <!-- Product Section -->
    <section class="max-w-6xl mx-auto p-5">
        <!-- Grid for Images and Info -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Left Section: Images -->
            <div>
                <!-- Main Image -->
                <img src="{{ asset('/storage/image/product/' . $product->image) }}" alt="Product Image"
                    class="w-full h-auto mb-4">

                <!-- Thumbnail Images -->
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($product->images as $photos)
                        <img src="{{ asset('/storage/image/product/' . $photos->image_path) }}" alt="Thumb 1"
                            class="w-full h-auto cursor-pointer">
                    @endforeach
                </div>
            </div>

            <!-- Right Section: Product Info -->
            <div class="flex flex-col justify-between h-full">
                <!-- Product Title and Price -->
                <div class="flex justify-between">
                    <h1 class="text-3xl font-thin mb-4">{{ $product->name }}</h1>
                    <a href="{{ route('user.wishlist') }}" class="flex flex-col justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                        <p class="text-xs ">Add To Wishlist</p>
                    </a>
                </div>
                <!-- Price and Discount -->
                <div class="text-xl font-semibold mb-4">
                    <span class="text-gray-700 text-4xl font-semibold hover:underline">{{ $product->formatted_price }}</span>
                    <span class="text-gray-400 line-through ml-2 font-light text-lg">{{ $product->formatted_discount_price }}</span>
                    <span class="text-green-500 ml-2 text-sm">{{ $product->saving_percentage }}% Off</span>
                </div>

                    <!-- Product Description -->
                    <p class="text-gray-600 mb-6 line-clamp-4">
                        {{ $product->description }}
                    </p>

                    <!-- Color Options -->
                    <div class="mb-4">
                        <span class="text-gray-600">Color: </span>
                        <div class="inline-flex space-x-2">
                            <button class="w-6 h-6 bg-green-700 rounded-full border"></button>
                            <button class="w-6 h-6 bg-gray-600 rounded-full border"></button>
                            <button class="w-6 h-6 bg-navy-700 rounded-full border"></button>
                        </div>
                    </div>

                    <!-- Size Options -->
                    <div class="mb-6">
                        <span class="text-gray-600">Choose Size:</span>
                        <div class="mt-2">
                            <button class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Small</button>
                            <button class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Medium</button>
                            <button class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">Large</button>
                            <button class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">X-Large</button>
                        </div>
                    </div>

                    <!-- Add to Cart Button -->
                    <div class="flex items-center space-x-4 mb-6">
                        <input type="number" value="1" min="1"
                            class="w-16 px-2 py-2 border rounded-lg text-center">
                        <button class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-800">Add to Cart</button>
                    </div>
                </div>

                <div class="bg-grey-500 rounded-lg p-6 mt-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 border-b border-gray-200 pb-2">Highlights</h2>
                    <ul class="list-disc list-inside text-gray-700 space-y-2">
                        @foreach ($product->highlights as $highlight)
                            <li class="flex items-center">
                                <!-- Icon for highlights -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-green-500 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                {{ $highlight->highlights }}
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>


        <!-- Tabs for Description, Reviews, FAQs -->
        <div class="mt-12">
            <!-- Tab Navigation -->
            <div class="border-b">
                <nav class="flex justify-around mr-12">
                    <a href="#" id="tab-1"
                        class="py-2 px-5 text-gray-700 border-b-2 border-black font-semibold hover:text-black"
                        onclick="showTab(event, 1)">Product Details</a>
                    <a href="#" id="tab-2" class="py-2 px-5 text-gray-600 hover:text-black"
                        onclick="showTab(event, 2)">Rating & Reviews</a>
                    <a href="#" id="tab-3" class="py-2 px-5 text-gray-600 hover:text-black"
                        onclick="showTab(event, 3)">FAQs</a>
                </nav>
            </div>

            <!-- Content Sections -->
            <div id="content-1" class="tab-content mt-8 transition-transform duration-500">
                <h2 class="text-2xl font-semibold mb-6">Product Details</h2>
                <p class="text-gray-700">Here are the details of the product...</p>
            </div>

            <div id="content-2" class="tab-content mt-8 hidden transition-transform duration-500">
                <livewire:product.review-component :product="$product"/>
                <div class="space-y-6">
                    <!-- Review Items -->
               <livewire:product.calling-review :product="$product"/>
                    <!-- Load More Button -->
                    <div class="flex justify-center mt-10">
                        <button
                            class="w-full md:w-40 px-2 py-2 rounded-full text-sm font-semibold ring-1 ring-slate-300">Load
                            More</button>
                    </div>
                </div>
            </div>

            <div id="content-3" class="tab-content mt-8 hidden transition-transform duration-500">
                <h2 class="text-2xl font-semibold mb-6">FAQs</h2>
                <p class="text-gray-700">Here are the frequently asked questions...</p>
            </div>
        </div>
    </section>

    <h1 class="text-4xl font-black text-center mb-8">You Might Also Like</h1>


    {{-- <div class="grid grid-cols-2 md:grid-cols-4 gap-4 px-[5%]">
        <div class="w-full max-w-sm bg-white rounded-lg ">
            <a href="#" class="rounded-2xl flex  bg-zinc-100 overflow-hidden">
                <img class="object-cover object-top h-[250px] lg:h-[450px] w-full rounded-t-lg"
                    src="https://nobero.com/cdn/shop/files/WhatsApp_Image_2024-08-26_at_14.20.50.jpg?v=1724663486"
                    alt="product image" />
            </a>
            <div class="px-3 mt-2 pb-5">
                <a href="#">
                    <h5 class="lg:text-lg font-semibold tracking-tight text-gray-900 dark:text-white">Apple Watch Series 7
                        GPS, Aluminium Case, Starlight Sport</h5>
                </a>
                <div class="flex items-center mt-2.5 mb-2">
                    <div class="flex items-center space-x-1 rtl:space-x-reverse">
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                    </div>
                    <span class=" text-xs font-semibold px-2.5 py-0.5 rounded  ms-3">5.0/5</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-xl md:text-2xl font-semibold text-gray-900 dark:text-white">$599</span>
                </div>
            </div>
        </div>
        <div class="w-full max-w-sm bg-white rounded-lg ">
            <a href="#" class="rounded-2xl flex  bg-zinc-100 overflow-hidden">
                <img class="object-cover object-top h-[250px] lg:h-[450px] w-full rounded-t-lg"
                    src="https://nobero.com/cdn/shop/files/WhatsApp_Image_2024-08-26_at_14.20.50.jpg?v=1724663486"
                    alt="product image" />
            </a>
            <div class="px-3 mt-2 pb-5">
                <a href="#">
                    <h5 class="lg:text-lg font-semibold tracking-tight text-gray-900 dark:text-white">Apple Watch Series 7
                        GPS, Aluminium Case, Starlight Sport</h5>
                </a>
                <div class="flex items-center mt-2.5 mb-2">
                    <div class="flex items-center space-x-1 rtl:space-x-reverse">
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                    </div>
                    <span class=" text-xs font-semibold px-2.5 py-0.5 rounded  ms-3">5.0/5</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-xl md:text-2xl font-semibold text-gray-900 dark:text-white">$599</span>
                </div>
            </div>
        </div>
        <div class="w-full max-w-sm bg-white rounded-lg ">
            <a href="#" class="rounded-2xl flex  bg-zinc-100 overflow-hidden">
                <img class="object-cover object-top h-[250px] lg:h-[450px] w-full rounded-t-lg"
                    src="https://nobero.com/cdn/shop/files/WhatsApp_Image_2024-08-26_at_14.20.50.jpg?v=1724663486"
                    alt="product image" />
            </a>
            <div class="px-3 mt-2 pb-5">
                <a href="#">
                    <h5 class="lg:text-lg font-semibold tracking-tight text-gray-900 dark:text-white">Apple Watch Series 7
                        GPS, Aluminium Case, Starlight Sport</h5>
                </a>
                <div class="flex items-center mt-2.5 mb-2">
                    <div class="flex items-center space-x-1 rtl:space-x-reverse">
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                    </div>
                    <span class=" text-xs font-semibold px-2.5 py-0.5 rounded  ms-3">5.0/5</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-xl md:text-2xl font-semibold text-gray-900 dark:text-white">$599</span>
                </div>
            </div>
        </div>
        <div class="w-full max-w-sm bg-white rounded-lg ">
            <a href="#" class="rounded-2xl flex  bg-zinc-100 overflow-hidden">
                <img class="object-cover object-top h-[250px] lg:h-[450px] w-full rounded-t-lg"
                    src="https://nobero.com/cdn/shop/files/WhatsApp_Image_2024-08-26_at_14.20.50.jpg?v=1724663486"
                    alt="product image" />
            </a>
            <div class="px-3 mt-2 pb-5">
                <a href="#">
                    <h5 class="lg:text-lg font-semibold tracking-tight text-gray-900 dark:text-white">Apple Watch Series 7
                        GPS, Aluminium Case, Starlight Sport</h5>
                </a>
                <div class="flex items-center mt-2.5 mb-2">
                    <div class="flex items-center space-x-1 rtl:space-x-reverse">
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                    </div>
                    <span class=" text-xs font-semibold px-2.5 py-0.5 rounded  ms-3">5.0/5</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-xl md:text-2xl font-semibold text-gray-900 dark:text-white">$599</span>
                </div>
            </div>
        </div>


    </div> --}}

    <!-- view all button -->
    <div class="flex flex-1 justify-center mt-10 px-[5%]">
        <button class=" w-full md:w-40 px-2  py-2 rounded-full text-sm font-semibold ring-1 ring-slate-300">View
            All</button>
    </div>

    <div class="border border-b-0 bg-slate-200 my-12 mx-[5%]"></div>

    <script>
        function showTab(event, tabNumber) {
            event.preventDefault(); // Prevent page refresh

            // Hide all content divs
            document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));

            // Remove active class from all tabs
            document.querySelectorAll('nav a').forEach(tab => {
                tab.classList.remove('text-gray-700', 'border-b-2', 'border-black');
                tab.classList.add('text-gray-600');
            });

            // Show the selected content
            document.getElementById(`content-${tabNumber}`).classList.remove('hidden');

            // Add active class to the clicked tab
            document.getElementById(`tab-${tabNumber}`).classList.add('text-gray-700', 'border-b-2', 'border-black');
        }
    </script>
@endsection
