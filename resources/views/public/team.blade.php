@extends('public.layout')

@section('title')
    Team Page
@endsection

@section('content')
    <!-- Team Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-extrabold text-gray-900">
                    Meet Our Team
                </h2>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-600">
                    The people who drive our success.
                </p>
            </div>

            {{-- Responsive team members grid with improved design --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- First Member -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                    <img class="w-full md:h-72 object-cover object-top" src="{{ asset('team-mates/person3.png') }}" alt="Team Member 3">
                    <div class="p-6 text-center">
                        <h3 class="text-lg font-bold text-gray-900">SANJAY KUMAR</h3>
                        <p class="mt-2 text-sm text-gray-500">( C.E.O. & FOUNDER)</p>
                        <div class="mt-4">
                            <a href="#" class="text-blue-500 hover:text-blue-700 font-semibold">LinkedIn</a>
                        </div>
                    </div>
                </div>

                <!-- Second Member -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                    <img class="w-full md:h-72 object-cover object-top" src="{{ asset('team-mates/person5.png') }}" alt="Team Member 5">
                    <div class="p-6 text-center">
                        <h3 class="text-lg font-bold text-gray-900">Mithun Lakshman</h3>
                        <p class="mt-2 text-sm text-gray-500">Marketing Head & C.O.O.</p>
                        <div class="mt-4">
                            <a href="#" class="text-blue-500 hover:text-blue-700 font-semibold">LinkedIn</a>
                        </div>
                    </div>
                </div>

                <!-- Third Member -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                    <img class="w-full md:h-72 object-cover object-top" src="{{ asset('team-mates/person6.png') }}" alt="Team Member 1">
                    <div class="p-6 text-center">
                        <h3 class="text-lg font-bold text-gray-900">Samit Kumar Das</h3>
                        <p class="mt-2 text-sm text-gray-500">Team Developer</p>
                        <div class="mt-4 text-start text-sm text-gray-500">
                            <p>
                                <i class="icon fal fa-phone"></i>
                                <span>Contact : <a href="tel:+91-9931009735">+91-9931009735</a></span>
                            </p>
                           <p><i class="icon fal fa-envelope"></i>
                                <span>Email : <a href="mailto:samitkumar9931@gmail.com">samitkumar9931@gmail.com</a>
                               </span>
                            </p>
                            {{-- <a href="#" class="text-blue-500 hover:text-blue-700 font-semibold">LinkedIn</a> --}}
                        </div>
                    </div>
                </div>

                <!-- Fourth Member -->
                

                <!-- Fifth Member -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                    <img class="w-full md:h-72 object-cover object-top" src="{{ asset('team-mates/person4.png') }}" alt="Team Member 2">
                    <div class="p-6 text-center">
                        <h3 class="text-lg font-bold text-gray-900">Subir Kumar Dey</h3>
                        <p class="mt-2 text-sm text-gray-500">Team Developer</p>
                        <div class="mt-4 text-start text-sm text-gray-500">
                            <p>
                                <i class="icon fal fa-phone"></i>
                                <span>Contact : <a href="tel:+91-9204544639">+91-9204544639</a></span>
                            </p>
                           <p><i class="icon fal fa-envelope"></i>
                                <span>Email : <a href="mailto:subirdey4586@gmail.com">subirdey4586@gmail.com</a>
                               </span>
                            </p>
                            {{-- <a href="#" class="text-blue-500 hover:text-blue-700 font-semibold">LinkedIn</a> --}}
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                    <img class="w-full md:h-72 object-cover object-top" src="{{ asset('team-mates/person1.png') }}" alt="Team Member 4">
                    <div class="p-6 text-center">
                        <h3 class="text-lg font-bold text-gray-900">Rupesh Kumar Ranjan</h3>
                        <p class="mt-2 text-sm text-gray-500">Team Developer</p>
                        <div class="mt-4 text-start text-sm text-gray-500">
                            <p>
                                <i class="icon fal fa-phone"></i>
                                <span>Contact : <a href="tel:+91-7903370681">+91-7903370681</a>, <a href="tel:+91-9570226505">+91-9570226505</a></span>
                            </p>
                           <p><i class="icon fal fa-envelope"></i>
                                <span>Email : <a href="mailto:rupeshkumarranjan7@gmail.com">rupeshkumarranjan7@gmail.com</a>
                               </span>
                            </p>
                            {{-- <a href="#" class="text-blue-500 hover:text-blue-700 font-semibold">LinkedIn</a> --}}
                        </div>
                    </div>
                </div>

                <!-- Sixth Member -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                    <img class="w-full md:md:h-72 object-cover object-top" src="{{ asset('team-mates/person2.png') }}" alt="Team Member 6">
                    <div class="p-6 text-center">
                        <h3 class="text-lg font-bold text-gray-900">Ranjeet Kumar Ray</h3>
                        <p class="mt-2 text-sm text-gray-500">Team Developer</p>
                        <div class="mt-4 text-start text-sm text-gray-500">
                            <p>
                                <i class="icon fal fa-phone"></i>
                                <span>Contact : <a href="tel:+91-9939961605">+91-9939961605</a></span>
                            </p>
                           <p><i class="icon fal fa-envelope"></i>
                                <span>Email : <a href="mailto:ranjeetray8875@gmail.com">ranjeetray8875@gmail.com</a>
                               </span>
                            </p>
                            {{-- <a href="#" class="text-blue-500 hover:text-blue-700 font-semibold">LinkedIn</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
