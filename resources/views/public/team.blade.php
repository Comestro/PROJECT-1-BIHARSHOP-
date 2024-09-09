@extends('public.layout')

@section('title')
    Team Page
@endsection

@section('content')
    <!-- Team Section -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl leading-9 font-extrabold text-gray-900">
                    Meet Our Team
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500">
                    The people behind the success of our e-commerce store.
                </p>
            </div>

            <div class="flex flex-wrap justify-center gap-8">
                <!-- Team Member 1 -->
                <div class="max-w-xs bg-white rounded-lg shadow-lg overflow-hidden">
                    <img class="w-full h-56 object-cover" src="https://via.placeholder.com/300" alt="Team Member 1">
                    <div class="p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Sadique Hussain</h3>
                        <p class="mt-1 text-sm text-gray-500">CEO & Founder</p>
                        <div class="mt-4">
                            <a href="#" class="text-blue-500 hover:text-blue-700">LinkedIn</a>
                        </div>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="max-w-xs bg-white rounded-lg shadow-lg overflow-hidden">
                    <img class="w-full h-56 object-cover" src="https://via.placeholder.com/300" alt="Team Member 2">
                    <div class="p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Sarita Roni</h3>
                        <p class="mt-1 text-sm text-gray-500">CTO</p>
                        <div class="mt-4">
                            <a href="#" class="text-blue-500 hover:text-blue-700">GitHub</a>
                        </div>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="max-w-xs bg-white rounded-lg shadow-lg overflow-hidden">
                    <img class="w-full h-56 object-cover" src="https://via.placeholder.com/300" alt="Team Member 3">
                    <div class="p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Gorav Saumya</h3>
                        <p class="mt-1 text-sm text-gray-500">Head of Marketing</p>
                        <div class="mt-4">
                            <a href="#" class="text-blue-500 hover:text-blue-700">Twitter</a>
                        </div>
                    </div>
                </div>

                <!-- Team Member 4 -->
                <div class="max-w-xs bg-white rounded-lg shadow-lg overflow-hidden">
                    <img class="w-full h-56 object-cover" src="https://via.placeholder.com/300" alt="Team Member 4">
                    <div class="p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Rahul Saurav</h3>
                        <p class="mt-1 text-sm text-gray-500">Lead Developer</p>
                        <div class="mt-4">
                            <a href="#" class="text-blue-500 hover:text-blue-700">GitHub</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
