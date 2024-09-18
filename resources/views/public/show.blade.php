@extends('public.layout')

@section('content')
<main class="flex-1">
    <div class="container mx-auto p-4">
        <!-- Card Container -->
        <div class="bg-white shadow-md rounded-lg p-4 flex items-center">
            <!-- Product Image -->
            <div class="w-36 h-24 flex-shrink-0">
                <img src="{{ $product->image ? asset('storage/image/product/' . $product->image) : asset('path/to/default-image.jpg') }}" alt="{{ $product->name }}" class="rounded-md">
            </div>
            <!-- Product Info -->
            <div class="ml-4 flex-grow">
                <!-- Product Title and Rating -->
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h2>
                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Bestseller</span>
                </div>
                <p class="text-lg text-gray-600 mb-4"><strong>Brand:</strong> {{ $product->brand }}</p>
                <!-- Rating and Reviews -->
                <div class="flex items-center text-sm text-gray-600 mt-2">
                    <span class="bg-green-500 text-white px-2 py-0.5 rounded mr-2">4.6</span>
                    <span>50 Ratings & 27 Reviews</span>
                </div>
                <!-- Product Details -->
                <ul class="text-sm text-gray-600 mt-2">
                    <li>128 GB ROM</li>
                    <li>15.49 cm (6.1 inch) Super Retina XDR Display</li>
                    <li>48MP + 12MP | 12MP Front Camera</li>
                    <li>A16 Bionic Chip, 6 Core Processor</li>
                    <li>1 Year Warranty for Phone and 6 Months for Accessories</li>
                </ul>
            </div>
            <!-- Price and Offer Section -->
            <div class="ml-6 text-right">
                <p class="text-xl font-semibold text-gray-800">${{ $product->price }}</p>
                <p class="text-gray-500 line-through">${{ $product->price }}</p>
                <p class="text-green-500">7% off</p>
                <p class="text-gray-500 text-sm">Free delivery by <span class="font-medium">22nd Sep</span></p>
                <p class="text-green-500 text-sm mt-2">Upto ₹46,100 Off on Exchange</p>
            </div>
        </div>
    </div>

    <!-- Related Products Section -->
    <div class="mt-8 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($relatedProducts as $related)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                <a href="{{ route('public.show', $related->id) }}" class="block">
                    <img class="w-full h-48 object-cover bg-gray-100"
                         src="{{ $related->image ? asset('storage/image/product/' . $related->image) : asset('path/to/default-image.jpg') }}"
                         alt="{{ $related->name }}">
                    <div class="p-4">
                        <h3 class="text-lg font-medium text-gray-800 mb-1">{{ $related->name }}</h3>
                        <p class="text-gray-600">${{ $related->price }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</main>
@endsection
