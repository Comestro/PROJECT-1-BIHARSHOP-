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

            {{-- team members images with given details here --}}
            <div class="grid gap-4">
                <!-- First Row: One Image -->
                <div class="max-w-xs bg-white rounded-lg shadow-lg overflow-hidden mx-auto">
                    <img class="w-full h-56 object-cover" src="/team-mates/person1.jpg" alt="Team Member 1">
                    <div class="p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Rupesh Kumar Ranjan</h3>
                        <p class="mt-1 text-sm text-gray-500">CEO & Founder</p>
                        <div class="mt-4">
                            <a href="#" class="text-blue-500 hover:text-blue-700">LinkedIn</a>
                        </div>
                    </div>
                </div>

                <!-- Second Row: Two Images -->
                <div class="flex justify-center gap-4">
                    <div class="max-w-xs bg-white rounded-lg shadow-lg overflow-hidden mx-auto">
                        <img class="w-full h-56 object-cover" src="/team-mates/person2.jpg" alt="Team Member 2">
                        <div class="p-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Ranjeet kumar Ray</h3>
                            <p class="mt-1 text-sm text-gray-500">Team Developer</p>
                            <div class="mt-4">
                                <a href="#" class="text-blue-500 hover:text-blue-700">LinkedIn</a>
                            </div>
                        </div>
                    </div>
                    <div class="max-w-xs bg-white rounded-lg shadow-lg overflow-hidden mx-auto">
                        <img class="w-full h-56 object-cover" src="/team-mates/person3.jpg" alt="Team Member 3">
                        <div class="p-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Subir Kumar dey</h3>
                            <p class="mt-1 text-sm text-gray-500">Team Developer</p>
                            <div class="mt-4">
                                <a href="#" class="text-blue-500 hover:text-blue-700">LinkedIn</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Third Row: Three Images -->
                <div class="flex justify-center gap-4">
                    <div class="max-w-xs bg-white rounded-lg shadow-lg overflow-hidden mx-auto">
                        <img class="w-full h-56 object-cover" src="/team-mates/person4.jpg" alt="Team Member 4">
                        <div class="p-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Sadique Hussain</h3>
                            <p class="mt-1 text-sm text-gray-500">CEO & Founder</p>
                            <div class="mt-4">
                                <a href="#" class="text-blue-500 hover:text-blue-700">LinkedIn</a>
                            </div>
                        </div>
                    </div>
                    <div class="max-w-xs bg-white rounded-lg shadow-lg overflow-hidden mx-auto">
                        <img class="w-full h-56 object-cover" src="/team-mates/person5.jpg" alt="Team Member 5">
                        <div class="p-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Sadique Hussain</h3>
                            <p class="mt-1 text-sm text-gray-500">CEO & Founder</p>
                            <div class="mt-4">
                                <a href="#" class="text-blue-500 hover:text-blue-700">LinkedIn</a>
                            </div>
                        </div>
                    </div>
                    <div class="max-w-xs bg-white rounded-lg shadow-lg overflow-hidden mx-auto">
                        <img class="w-full h-56 object-cover" src="/team-mates/person6.jpg" alt="Team Member 6">
                        <div class="p-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Sadique Hussain</h3>
                            <p class="mt-1 text-sm text-gray-500">CEO & Founder</p>
                            <div class="mt-4">
                                <a href="#" class="text-blue-500 hover:text-blue-700">LinkedIn</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
