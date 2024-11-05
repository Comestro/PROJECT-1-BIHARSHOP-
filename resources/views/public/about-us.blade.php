@extends('public.layout')

@section('title')
    About Us
@endsection

@section('content')
    <div class="sm:px-[5%] px-2">
        <!-- About Section -->
        <section class="bg-white py-12">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl font-bold text-gray-800 text-center">About Us</h1>
                <p class="mt-6 text-gray-600 text-lg leading-relaxed">
                    Welcome to <strong>BiharShop</strong>! We are an exciting new e-commerce platform, founded in 2024,
                    dedicated
                    to providing a seamless and convenient shopping experience. Our platform offers a wide range of
                    products,
                    from electronics and fashion to home essentials, catering to customers across the country.
                </p>
                <p class="mt-4 text-gray-600 ">
                    At BiharShop, our mission is to empower small businesses and bring quality products to customers'
                    doorsteps
                    with ease. We focus on innovation, customer satisfaction, and reliable service to make online shopping
                    accessible for everyone.
                </p>
                <img src="{{ asset('assets/assets_admin/images/logo/Originals/logo copy.png') }}" loading="lazy" alt="About Us"
                    class="mt-9 mx-auto rounded-lg md:max-w-3xl sm:h-[300px] h-[200px] py-0">
            </div>
        </section>

        <!-- Journey Section -->
        <section class="mb-5">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-semibold text-gray-800 text-center">Our Journey</h2>
                <div class="mt-8 space-y-6 text-gray-600 leading-relaxed">
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


    </div>
@endsection
