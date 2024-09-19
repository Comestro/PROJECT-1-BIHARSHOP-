@extends('public.layout')

@section('content')
    <main class="flex-1">
        <div class="container mx-auto p-4">
            <!-- Product Detail Card -->
            <a wire:navigate href="{{ route('product.view', ['category' => $product->category->cat_slug, 'slug' => $product->slug]) }}">
                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col md:flex-row items-start md:items-center space-y-4 md:space-y-0 md:space-x-6">
                    <!-- Product Image Carousel -->
                    <div class="flex w-full md:w-96 h-64 flex-shrink-0 items-center justify-center">
                        <div class="relative">
                            <img src="{{ $product->image ? asset('storage/image/product/' . $product->image) : asset('path/to/default-image.jpg') }}"
                                 alt="{{ $product->name }}" class="rounded-md object-cover w-72 object-center">
                            @if ($product->discount_price)
                                <span class="absolute top-2 right-2 bg-red-600 text-white text-xs font-semibold px-2 py-1 rounded">Sale</span>
                            @endif
                        </div>
                    </div>
                    <!-- Product Info -->
                    <div class="flex-grow">
                        <!-- Product Title and Brand -->
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-3xl font-semibold text-gray-900 line-clamp-2 overflow-hidden">{{ $product->name }}</h2>                           
                        </div>
                        <p class="text-lg text-gray-700 mb-2"><strong>Brand:</strong> {{ $product->brand }}</p>
                        <p class="text-sm text-gray-600 mb-4 line-clamp-3 overflow-hidden">{{ $product->description }}</p>
                        <!-- Price Section -->
                        <div class="mb-4">
                            @if ($product->discount_price)
                                <p class="text-3xl font-bold text-green-600">₹{{ $product->discount_price }}</p>
                                <p class="text-lg font-semibold text-gray-500 line-through">₹{{ $product->price }}</p>
                            @else
                                <p class="text-3xl font-bold text-gray-900">₹{{ $product->price }}</p>
                            @endif
                        </div>                   
                    </div>
                </div>
            </a>

            <!-- Related Products Section -->
            <div class="mt-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Related Products</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($relatedProducts as $related)
                        <a href="{{ route('product.view', ['category' => $related->category->cat_slug, 'slug' => $related->slug]) }}"
                           class="block bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                            <div class="relative">
                                <img class="w-full h-48 object-cover bg-gray-100"
                                     src="{{ $related->image ? asset('storage/image/product/' . $related->image) : asset('path/to/default-image.jpg') }}"
                                     alt="{{ $related->name }}">
                                @if ($related->discount_price)
                                    <span class="absolute top-2 right-2 bg-red-600 text-white text-xs font-semibold px-2 py-1 rounded">Sale</span>
                                @endif
                            </div>
                            <div class="p-4">
                                <h3 class="text-lg font-medium text-gray-800 mb-1">{{ $related->name }}</h3>                                
                                @if ($related->discount_price)
                                    <p class="text-base font-bold text-green-600">₹{{ $related->discount_price }}</p>
                                    <p class="text-sm font-semibold text-gray-500 line-through">₹{{ $related->price }}</p>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
