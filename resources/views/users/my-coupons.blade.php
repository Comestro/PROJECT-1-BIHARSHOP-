@extends('users.layout')
@section('title')
Coupon Page
@endsection

@section('content')

<!-- Main Content Area -->
<div class="flex flex-wrap lg:flex-nowrap p-6">
    <!-- Sidebar -->
    <livewire:user.user-sidebar/>

    <!-- Main Content -->
    <div class="flex-1 sm:px-5 lg:px-6">
        <div class="bg-white p-4 sm:p-6 rounded-lg shadow-md">

            <div class="w-full max-w-full lg:max-w-9/12 mx-auto">
                <div class="container mx-auto p-4 sm:p-5">
                    <div class="text-gray-600 text-sm mb-4">
                        <a href="#" class="hover:text-blue-500">Help Center</a>
                    </div>

                    <!-- Available Coupons -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Available Coupons</h2>
                        <div class="space-y-4">
                            {{-- Available coupon loop goes here --}}
                            <div class="border border-gray-200 p-4 rounded-md bg-white shadow-sm">
                                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                                    <div class="flex-1">
                                        <div class="flex flex-col sm:flex-row justify-between mb-2">
                                            <div class="text-green-500 font-medium mb-2 sm:mb-0">Extra 20% Off On PUMA</div>
                                            <div class="text-gray-500 text-sm font-bold">Valid till 30 Sep, 2024</div>
                                        </div>
                                        <div class="flex flex-col sm:flex-row justify-between">
                                            <div class="text-sm mb-2 sm:mb-0">Use code: <span class="font-semibold">PUMA20</span></div>
                                            <a href="#" class="text-blue-500 hover:underline">View T&C</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Available coupon loop ends here --}}
                        </div>
                    </div>

                    <!-- Upcoming Coupons -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Upcoming Coupons</h2>
                        <div class="space-y-4">
                            {{-- Upcoming coupon loop goes here --}}
                            <div class="border border-gray-200 p-4 rounded-md bg-white shadow-sm">
                                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                                    <div class="flex-1">
                                        <div class="flex flex-col sm:flex-row justify-between mb-2">
                                            <div class="text-green-500 font-medium mb-2 sm:mb-0">20% Off On Men's Clothing</div>
                                            <div class="text-gray-500 text-sm font-bold">Valid from 1 Oct, 2024</div>
                                        </div>
                                        <div class="flex flex-col sm:flex-row justify-between">
                                            <div class="text-sm mb-2 sm:mb-0">Use code: <span class="font-semibold">MEN20</span></div>
                                            <a href="#" class="text-blue-500 hover:underline">View T&C</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Upcoming coupon loop ends here --}}
                        </div>
                    </div>

                    <!-- Expired Coupons -->
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Expired Coupons</h2>
                        <div class="space-y-4">
                            {{-- Expired coupons loop goes here --}}
                            <div class="border border-gray-200 p-4 rounded-md bg-white shadow-sm">
                                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                                    <div class="flex-1">
                                        <div class="flex flex-col sm:flex-row justify-between mb-2">
                                            <div class="text-gray-400 font-medium mb-2 sm:mb-0">Flat 13% Off on HRX</div>
                                            <div class="text-gray-500 text-sm font-bold">Expired on 5 Sep, 2024</div>
                                        </div>
                                        <div class="flex flex-col sm:flex-row justify-between">
                                            <div class="text-sm text-gray-500 mb-2 sm:mb-0">This coupon has expired.</div>
                                            <a href="#" class="text-blue-500 hover:underline">View T&C</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Expired coupon loop ends here --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
