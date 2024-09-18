@extends('public.layout')

@section('content')
<main class="flex-1">
    <div class="bg-gray-50 px-4 py-6 md:px-10">
        <!-- Product Details Section -->
        <div class="bg-white p-6 shadow-lg rounded-lg flex flex-col md:flex-row md:space-x-8">
            <!-- Product Image -->
            <div class="w-full md:w-1/2 lg:w-1/3 flex justify-center mb-4 md:mb-0">
                <img class="object-cover h-80 w-full md:h-96 lg:h-[500px] rounded-lg shadow-md"
                     src="{{ $product->image ? asset('storage/image/product/' . $product->image) : asset('path/to/default-image.jpg') }}"
                     alt="{{ $product->name }}">
            </div>

            <!-- Product Info -->
            <div class="flex-1">
                <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>
                <p class="text-lg text-gray-600 mb-4"><strong>Brand:</strong> {{ $product->brand }}</p>
                <p class="text-3xl font-semibold text-gray-900 mb-4">${{ $product->price }}</p>
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
    </div>
</main>
@endsection
