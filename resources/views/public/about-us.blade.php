@extends('public.layout')

@section('title')
    About Us
@endsection

@section('content')
    <!-- About Section -->
    <section class="bg-white py-12">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold text-gray-800 text-center">About Us</h1>
            <p class="mt-6 text-gray-600 text-center text-lg leading-relaxed">
                Welcome to <strong>BiharShop</strong>! We are an exciting new e-commerce platform, founded in 2024, dedicated
                to providing a seamless and convenient shopping experience. Our platform offers a wide range of products,
                from electronics and fashion to home essentials, catering to customers across the country.
            </p>
            <p class="mt-4 text-gray-600 text-center">
                At BiharShop, our mission is to empower small businesses and bring quality products to customers' doorsteps
                with ease. We focus on innovation, customer satisfaction, and reliable service to make online shopping
                accessible for everyone.
            </p>
            <img src="/team-mates/person1.jpg"  alt="About Us" class="mt-8 mx-auto rounded-lg shadow-lg max-w-3xl">
        </div>
    </section>

    <!-- Journey Section -->
    <section class="bg-gray-50 py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-semibold text-gray-800 text-center">Our Journey</h2>
            <div class="mt-8 space-y-6 text-gray-600 text-center leading-relaxed">
                <p>Since our launch in 2024, BiharShop has been focused on revolutionizing the e-commerce landscape by
                    offering customers a vast selection of products and empowering sellers to grow their businesses with
                    ease.</p>
                <p>Our platform has quickly expanded, and we now offer a diverse range of categories, ensuring there’s
                    something for everyone. We are committed to continuously enhancing the shopping experience with
                    innovative features and services.</p>
                <p>As part of our journey, we aim to simplify digital payments and improve logistics to ensure fast,
                    reliable, and secure delivery of products to your doorstep.</p>
            </div>
        </div>
    </section>

    <!-- Leadership Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 text-center">Meet Our Leaders</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12 mt-12">

                <!-- Leader 1 -->
                <div class="text-center">
                    <img src="/team-mates/person6.jpg" alt="John Doe"
                        class="rounded-full w-32 h-32 mx-auto shadow-lg">
                    <h3 class="mt-4 text-xl font-semibold text-gray-800">Rupesh K Ranjan</h3>
                    <p class="text-gray-600 mt-2">Chief Executive Officer</p>
                </div>

                <!-- Leader 2 -->
                <div class="text-center">
                    <img src="/team-mates/person2.jpg" alt="Jane Smith"
                        class="rounded-full w-32 h-32 mx-auto shadow-lg">
                    <h3 class="mt-4 text-xl font-semibold text-gray-800">R.K. Ray</h3>
                    <p class="text-gray-600 mt-2">Chief Financial Officer</p>
                </div>

                <!-- Leader 3 -->
                <div class="text-center">
                    <img src="/team-mates/person3.jpg" alt="Michael Johnson"
                        class="rounded-full w-32 h-32 mx-auto shadow-lg">
                    <h3 class="mt-4 text-xl font-semibold text-gray-800">S.K. Dey</h3>
                    <p class="text-gray-600 mt-2">Chief Product & Tech Officer</p>
                </div>

                <!-- Leader 4 -->
                <div class="text-center">
                    <img src="/team-mates/person5.jpg" alt="Emily Davis"
                        class="rounded-full w-32 h-32 mx-auto shadow-lg">
                    <h3 class="mt-4 text-xl font-semibold text-gray-800">Sadique Hussain</h3>
                    <p class="text-gray-600 mt-2">Chief Marketing Officer</p>
                </div>
            </div>
        </div>
    </section>
@endsection
