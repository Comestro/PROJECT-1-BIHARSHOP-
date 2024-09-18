@extends('public.layout')

@section('content')
<main class="flex-1">
    <div class="flex justify-between items-center mb-4">
        <!-- Optional section for additional controls, filters, etc. -->
    </div>

    <!-- Products Grid -->
    <div class="relative mt-6 w-full lg:mt-5 p-5">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Product Card -->
            <div class="w-full max-w-sm bg-white rounded-lg shadow-lg transition-transform transform hover:scale-105">
                <!-- Product Image -->
                <div class="rounded-t-lg overflow-hidden">
                    <img class="object-cover object-top h-[250px] lg:h-[450px] w-full" src="{{ $product->image ? asset('storage/image/product/' . $product->image) : asset('path/to/default-image.jpg') }}" alt="{{ $product->name }}">
                </div>

                <!-- Product Info -->
                <div class="p-4">
                    <!-- Product Name -->
                    <h5 class="text-lg lg:text-xl font-bold text-gray-900">{{ $product->name }}</h5>

                    <!-- Product Price -->
                    <div class="flex justify-between items-center mt-3">
                        <span class="text-xl md:text-2xl font-semibold text-grey-600">₹{{ $product->price }}</span>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
