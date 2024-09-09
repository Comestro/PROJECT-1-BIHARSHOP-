@extends('users.layout')
@section('title')

Coupon Page

@endsection

@section('content')

    <!-- Main Content Area -->
    <div class="flex p-5 space-x-6">

        <!-- Sidebar -->
        <x-user-navbar/>

        <!-- Main Content -->
        <div class="flex-1 p-4">
            <div class="bg-white p-6 rounded-lg shadow-md">

                <div class="w-9/12">
                    <div class="container mx-auto p-5">
                        <div class="text-gray-600 text-sm mb-4">
                            <a href="#" class="hover:text-blue-500">Help Center</a>
                        </div>

                        <div class="mb-8">
                            <h2 class="text-xl font-semibold text-gray-800 mb-4">Available Coupons</h2>
                            <div class="space-y-4">
                                {{-- Available coupon loop goes here --}}
                                <div class="border border-gray-200 p-4 rounded-md bg-white shadow-sm">
                                    <div class="flex justify-between items-center">
                                        <div class="flex-1">
                                            <div class="flex justify-between">
                                                <div class="text-green-500 font-medium mb-4">Extra 20% Off On PUMA</div>
                                                <div class="text-gray-500 text-sm font-bold">Valid till 30 Sep, 2024</div>
                                            </div>
                                            <div class="flex justify-between">
                                                <div class="text-sm">Extra 20% Off On PUMA <span>(Valid till: 11:59 PM, 30
                                                        Sep)</span></div>
                                                <a href="#" class="text-blue-500 hover:underline">View T&C</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Available coupon loop ends here --}}

                            </div>
                        </div>

                        <div class="mb-8">
                            <h2 class="text-xl font-semibold text-gray-800 mb-4">Upcoming Coupons</h2>

                            <div class="space-y-4">
                                {{-- upcoming coupon loop goes here --}}
                                <div class="border border-gray-200 p-4 rounded-md bg-white shadow-sm">
                                    <div class="flex justify-between items-center">
                                        <div class="flex-1">
                                            <div class="flex justify-between">
                                                <div class="text-green-500 font-medium mb-4">20% Off On Men's clothing</div>
                                                <div class="text-gray-500 text-sm font-bold">Valid till 30 Sep, 2024</div>
                                            </div>
                                            <div class="flex justify-between">
                                                <div class="text-sm">Extra 20% Off On PUMA <span>(Valid till: 11:59 PM, 30
                                                        Sep)</span></div>
                                                <a href="#" class="text-blue-500 hover:underline">View T&C</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- upcoming coupon loop ends here --}}
                            </div>
                        </div>

                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 mb-4">Expired Coupons</h2>
                            <div class="space-y-4">
                                {{-- expired coupons loop goes here --}}
                                <div class="border border-gray-200 p-4 rounded-md bg-white shadow-sm">
                                    <div class="flex justify-between items-center">
                                        <div class="flex-1">
                                            <div class="flex justify-between">
                                                <div class="text-gray-00 font-medium mb-4">Flat 13% off on HRX</div>
                                                <div class="text-gray-500 text-sm font-bold">Expired on 5 Sep, 2024</div>
                                            </div>
                                            <div class="flex justify-between">
                                                <div class="text-sm">Extra 20% Off On PUMA <span>(Valid till: 11:59 PM, 30
                                                        Sep)</span></div>
                                                <a href="#" class="text-blue-500 hover:underline">View T&C</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- expired coupon loop ends here --}}
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>

@endsection
