@extends('public.layout')

@section('title')
    Image Gallery
@endsection

@section('content')
    <!-- Image Gallery Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-extrabold text-gray-900">
                    Our Gallery
                </h2>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-600">
                    A collection of memories and moments from our journey.
                </p>
            </div>

            {{-- Responsive Image Gallery --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- First Image -->
                <div class="relative group">
                    <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('assets/gallery/image1.jpg') }}" alt="Gallery Image 1">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <h3 class="text-white text-lg font-bold">Image 1 Description</h3>
                    </div>
                </div>

                <!-- Second Image -->
                <div class="relative group">
                    <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('assets/gallery/image2.jpg') }}" alt="Gallery Image 2">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <h3 class="text-white text-lg font-bold">Image 2 Description</h3>
                    </div>
                </div>

                <!-- Third Image -->
                <div class="relative group">
                    <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('assets/gallery/image3.jpg') }}" alt="Gallery Image 3">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <h3 class="text-white text-lg font-bold">Image 3 Description</h3>
                    </div>
                </div>

                <!-- Fourth Image -->
                <div class="relative group">
                    <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('assets/gallery/image4.jpg') }}" alt="Gallery Image 4">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <h3 class="text-white text-lg font-bold">Image 4 Description</h3>
                    </div>
                </div>

                <!-- Fifth Image -->
                <div class="relative group">
                    <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('assets/gallery/image5.jpg') }}" alt="Gallery Image 4">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <h3 class="text-white text-lg font-bold">Image 4 Description</h3>
                    </div>
                </div>

                <!-- Sixth Image -->
                <div class="relative group">
                    <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('assets/gallery/image6.jpg') }}" alt="Gallery Image 4">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <h3 class="text-white text-lg font-bold">Image 4 Description</h3>
                    </div>
                </div>

                <!-- Seventh Image -->
                <div class="relative group">
                    <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('assets/gallery/image7.jpg') }}" alt="Gallery Image 4">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <h3 class="text-white text-lg font-bold">Image 4 Description</h3>
                    </div>
                </div>
                <!-- Seventh Image -->
                <div class="relative group">
                    <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('assets/gallery/image8.jpg') }}" alt="Gallery Image 4">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <h3 class="text-white text-lg font-bold">Image 4 Description</h3>
                    </div>
                </div>
                <!-- Seventh Image -->
                <div class="relative group">
                    <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('assets/gallery/image9.jpg') }}" alt="Gallery Image 4">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <h3 class="text-white text-lg font-bold">Image 4 Description</h3>
                    </div>
                </div>
                <!-- Seventh Image -->
                <div class="relative group">
                    <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('assets/gallery/image10.jpg') }}" alt="Gallery Image 4">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <h3 class="text-white text-lg font-bold">Image 4 Description</h3>
                    </div>
                </div>
                <!-- Seventh Image -->
                <div class="relative group">
                    <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('assets/gallery/image11.jpg') }}" alt="Gallery Image 4">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <h3 class="text-white text-lg font-bold">Image 4 Description</h3>
                    </div>
                </div>
                <!-- Seventh Image -->
                <div class="relative group">
                    <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('assets/gallery/image12.jpg') }}" alt="Gallery Image 4">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <h3 class="text-white text-lg font-bold">Image 4 Description</h3>
                    </div>
                </div>
                <!-- Seventh Image -->
                <div class="relative group">
                    <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('assets/gallery/image13.jpg') }}" alt="Gallery Image 4">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <h3 class="text-white text-lg font-bold">Image 4 Description</h3>
                    </div>
                </div>
                <!-- Seventh Image -->
                <div class="relative group">
                    <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('assets/gallery/image14.jpg') }}" alt="Gallery Image 4">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <h3 class="text-white text-lg font-bold">Image 4 Description</h3>
                    </div>
                </div>
                <!-- Seventh Image -->
                <div class="relative group">
                    <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('assets/gallery/image15.jpg') }}" alt="Gallery Image 4">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <h3 class="text-white text-lg font-bold">Image 4 Description</h3>
                    </div>
                </div>
                <!-- Seventh Image -->
                <div class="relative group">
                    <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('assets/gallery/image16.jpg') }}" alt="Gallery Image 4">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <h3 class="text-white text-lg font-bold">Image 4 Description</h3>
                    </div>
                </div>
                <!-- Seventh Image -->
                <div class="relative group">
                    <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('assets/gallery/image17.jpg') }}" alt="Gallery Image 4">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <h3 class="text-white text-lg font-bold">Image 4 Description</h3>
                    </div>
                </div>
                <!-- Seventh Image -->
                <div class="relative group">
                    <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('assets/gallery/image18.jpg') }}" alt="Gallery Image 4">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <h3 class="text-white text-lg font-bold">Image 4 Description</h3>
                    </div>
                </div>
                <!-- Seventh Image -->
                <div class="relative group">
                    <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('assets/gallery/image19.jpg') }}" alt="Gallery Image 4">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <h3 class="text-white text-lg font-bold">Image 4 Description</h3>
                    </div>
                </div>
                <!-- Seventh Image -->
                <div class="relative group">
                    <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('assets/gallery/image20.jpg') }}" alt="Gallery Image 4">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <h3 class="text-white text-lg font-bold">Image 4 Description</h3>
                    </div>
                </div>
                <!-- Seventh Image -->
                <div class="relative group">
                    <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('assets/gallery/image21.jpg') }}" alt="Gallery Image 4">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <h3 class="text-white text-lg font-bold">Image 4 Description</h3>
                    </div>
                </div>
                <!-- Seventh Image -->
                <div class="relative group">
                    <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('assets/gallery/image22.jpg') }}" alt="Gallery Image 4">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <h3 class="text-white text-lg font-bold">Image 4 Description</h3>
                    </div>
                </div>
                <!-- Seventh Image -->
                <div class="relative group">
                    <img class="w-full h-64 object-cover rounded-lg shadow-lg transform transition duration-300 hover:scale-105" src="{{ asset('assets/gallery/image23.jpg') }}" alt="Gallery Image 4">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <h3 class="text-white text-lg font-bold">Image 4 Description</h3>
                    </div>
                </div>

                <!-- Add more images similarly as needed -->
            </div>
        </div>
    </section>
@endsection
