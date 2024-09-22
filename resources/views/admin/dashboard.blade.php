@extends('admin.adminBase')
@section('title', 'Dashboard')
@section('content')


<!-- ===== Content Area Start ===== -->


<!-- ===== Header End ===== -->

<!-- ===== Main Content Start ===== -->
<main>
<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
 <div class="">
    {{-- <livewire:admin.dashboard.card/> --}}
    <livewire:admin.dashboard.static-card/>

</div>


{{-- order table form --}}
    <div class="container mt-10 mx-auto ">
        <h3 class="text-xl font-bold mb-2 mt-4">Recent Orders</h3>

        <livewire:admin.dashboard.ordercalling/>

    </div>
   
     <div class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5">
     
            <!-- ====== Table One Start -->
            <div class="col-span-12 md:col-span-8 xl:col-span-8">
               
                <livewire:admin.dashboard.payment-table/>

            </div>
            <!-- ====== Table One End -->

            <!-- ====== Chat Card Start -->
            <div
                class="col-span-12 md:col-span-4 rounded-md shadow-md border border-stroke bg-white py-6  px-4 shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-4">
                <h4 class="mb-6 px-7.5 text-xl font-bold text-black dark:text-white">
                 Recent User
                </h4>

                <livewire:admin.dashboard.calling-user/>

                
            </div>
            <!-- ====== Chat Card End -->

            <!-- ====== Chart One Start -->
   
            <div
                class="col-span-12 rounded-md shadow-md border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-8  py-4">
                {{-- <div class="flex flex-wrap items-start justify-between gap-3 sm:flex-nowrap ">
                    <div class="flex w-full flex-wrap gap-3 sm:gap-5 px-2 py-2 ">
                        <div class="flex min-w-47.5 ">
                            <span
                                class="mr-2 mt-1 flex h-4 w-full max-w-4 items-center justify-center rounded-full bg-green-500 border border-primary">
                                <span class="block h-2.5 w-full max-w-2.5 rounded-full bg-primary"></span>
                            </span>
                            <div class="w-full">
                                <p class="font-semibold text-primary">Total Order</p>
                                <p class="text-sm font-medium">12.04.2022 - 12.05.2022</p>
                            </div>
                        </div>
                        <div class="flex min-w-47.5">
                            <span
                                class="mr-2 mt-1 flex h-4 w-full max-w-4 items-center justify-center rounded-full bg-yellow-500 border border-secondary">
                                <span
                                    class="block h-2.5 w-full max-w-2.5 rounded-full bg-secondary"></span>
                            </span>
                            <div class="w-full">
                                <p class="font-semibold text-secondary">Total Sales</p>
                                <p class="text-sm font-medium">12.04.2022 - 12.05.2022</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex w-full max-w-45 justify-end">
                        <div class="inline-flex items-center rounded-md bg-whiter p-1.5 dark:bg-meta-4">
                            <button
                                class="rounded bg-white px-3 py-1 text-xs font-medium text-black shadow-card hover:bg-white hover:shadow-card dark:bg-boxdark dark:text-white dark:hover:bg-boxdark">
                                Day
                            </button>
                            <button
                                class="rounded px-3 py-1 text-xs font-medium text-black hover:bg-white hover:shadow-card dark:text-white dark:hover:bg-boxdark">
                                Week
                            </button>
                            <button
                                class="rounded px-3 py-1 text-xs font-medium text-black hover:bg-white hover:shadow-card dark:text-white dark:hover:bg-boxdark">
                                Month
                            </button>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="  mr pr-5">
                    <!-- Title -->
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg md:text-xl font-semibold text-gray-700">Total Order</h2>
                        <div>
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18"></path>
                            </svg>
                        </div>
                    </div>
                
                    <!-- Chart -->
                    <div class="relative h-64">
                        <!-- Y-axis labels (Date values on the left side) -->
                        <div class="absolute left-0 top-0 mt-2 flex flex-col justify-between h-full text-xs md:text-sm text-gray-500">
                            <span>25</span>
                            <span>20</span>
                            <span>15</span>
                            <span>10</span>
                            <span>5</span>
                            <span>0</span>
                        </div>
                
                        <!-- SVG Chart Area -->
                        <svg class="absolute inset-0 w-full h-full ml-6" viewBox="0 0 100 50" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Grid lines -->
                            <line x1="0" y1="10" x2="100" y2="10" stroke="#e5e7eb" stroke-width="0.5"></line>
                            <line x1="0" y1="20" x2="100" y2="20" stroke="#e5e7eb" stroke-width="0.5"></line>
                            <line x1="0" y1="30" x2="100" y2="30" stroke="#e5e7eb" stroke-width="0.5"></line>
                            <line x1="0" y1="40" x2="100" y2="40" stroke="#e5e7eb" stroke-width="0.5"></line>
                            <line x1="0" y1="50" x2="100" y2="50" stroke="#e5e7eb" stroke-width="0.5"></line>
                
                            <!-- Orders Line -->
                            <path d="M 0 50 Q 10 40, 20 30 Q 30 20, 40 15 Q 50 10, 60 15 Q 70 20, 80 30 Q 90 40, 100 60 
                                     L 100 100 L 0 100 " 
                                  fill="rgba(59, 130, 246, 0.2)" 
                                  stroke="rgba(59, 130, 246, 1)" 
                                  stroke-width="1" />
                
                            <!-- Canceled Orders Line -->
                            <path d="M 0 50 Q 10 40, 20 32 Q 30 15, 40 10 Q 50 5, 60 10 Q 70 15, 80 18 Q 90 24, 100 50 
                                     L 100 100 L 0 100 Z" 
                                  fill="rgba(34, 197, 94, 0.2)" 
                                  stroke="rgba(34, 197, 94, 1)" 
                                  stroke-width="1" />
                        </svg>
                    </div>
                
                    <!-- X-axis labels (Months on the bottom) -->
                    <div class="flex justify-between mt-4  md:ml-5 text-xs md:text-sm text-gray-500">
                        <span>May</span>
                        <span>June</span>
                        <span>July</span>
                        <span>August</span>
                        <span>September</span>
                        <span>October</span>
                        <span>November</span>
                        <span>December</span>
                    </div>
                
                    <!-- Legend -->
                    <div class="flex flex-col sm:flex-row items-center justify-center mt-4 space-x-0 sm:space-x-4 space-y-2 sm:space-y-0">
                        <div class="flex items-center">
                            <span class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"></span>
                            <span class="text-xs md:text-sm text-gray-600">Total Sales</span>
                        </div>
                        <div class="flex items-center">
                            <span class="inline-block w-3 h-3 mr-1 bg-green-500 rounded-full"></span>
                            <span class="text-xs md:text-sm text-gray-600">Canceled Orders</span>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="mr pr-5">
                    <!-- Title -->
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg md:text-xl font-semibold text-gray-700">Total Order</h2>
                        <div>
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18"></path>
                            </svg>
                        </div>
                    </div>
                
                    <!-- Chart -->
                    <div class="relative h-64">
                        <!-- Y-axis labels -->
                        <div class="absolute left-0 top-0 mt-2 flex flex-col justify-between h-full text-xs md:text-sm text-gray-500">
                            <span>25</span>
                            <span>20</span>
                            <span>15</span>
                            <span>10</span>
                            <span>5</span>
                            <span>0</span>
                        </div>
                
                        <!-- SVG Chart Area -->
                        <svg class="absolute inset-0 w-full h-full ml-6" viewBox="0 0 100 50" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Horizontal Grid Lines -->
                            <line x1="0" y1="10" x2="100" y2="10" stroke="#e5e7eb" stroke-width="0.5"></line>
                            <line x1="0" y1="20" x2="100" y2="20" stroke="#e5e7eb" stroke-width="0.5"></line>
                            <line x1="0" y1="30" x2="100" y2="30" stroke="#e5e7eb" stroke-width="0.5"></line>
                            <line x1="0" y1="40" x2="100" y2="40" stroke="#e5e7eb" stroke-width="0.5"></line>
                            <line x1="0" y1="50" x2="100" y2="50" stroke="#e5e7eb" stroke-width="0.5"></line>
                
                            <!-- Orders Line -->
                            <path d="M {{ collect(range(1, 12))->map(function($month) use ($salesData) {
                                $y = isset($salesData[$month]) ? 50 - ($salesData[$month] / 1000 * 50) : 50;
                                return (($month - 1) * 10) . ' ' . $y;
                            })->implode(' L ') }}" 
                            fill="rgba(59, 130, 246, 0.2)" stroke="rgba(59, 130, 246, 1)" stroke-width="1" />
                
                            <!-- Canceled Orders Line -->
                            <path d="M {{ collect(range(1, 12))->map(function($month) use ($canceledOrdersData) {
                                $y = isset($canceledOrdersData[$month]) ? 50 - ($canceledOrdersData[$month] * 2) : 50;
                                return (($month - 1) * 10) . ' ' . $y;
                            })->implode(' L ') }}" 
                            fill="rgba(34, 197, 94, 0.2)" stroke="rgba(34, 197, 94, 1)" stroke-width="1" />
                        </svg>
                    </div>
                
                    <!-- X-axis labels (Months) -->
                    <div class="flex justify-between mt-4 md:ml-5 text-xs md:text-sm text-gray-500">
                        <span>May</span>
                        <span>June</span>
                        <span>July</span>
                        <span>August</span>
                        <span>September</span>
                        <span>October</span>
                        <span>November</span>
                        <span>December</span>
                    </div>
                
                    <!-- Legend -->
                    <div class="flex flex-col sm:flex-row items-center justify-center mt-4 space-x-0 sm:space-x-4 space-y-2 sm:space-y-0">
                        <div class="flex items-center">
                            <span class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"></span>
                            <span class="text-xs md:text-sm text-gray-600">Total Sales</span>
                        </div>
                        <div class="flex items-center">
                            <span class="inline-block w-3 h-3 mr-1 bg-green-500 rounded-full"></span>
                            <span class="text-xs md:text-sm text-gray-600">Canceled Orders</span>
                        </div>
                    </div>
                </div> --}}

             
                <livewire:admin.dashboard.graph-chart/>
                
                <style>
                    /* Hide tooltips by default */
                    .tooltip {
                        visibility: hidden;
                        opacity: 0;
                        transition: opacity 0.3s;
                    }
                
                    /* Show tooltip on hover */
                    .hover-group:hover .tooltip {
                        visibility: visible;
                        opacity: 1;
                    }
                </style>
                
                
                
                <div>
                    <div id="chartOne" class="-ml-5"></div>
                </div>
            </div>
             <!-- ====== Chart One End -->
            <!-- ====== Chart Two Start -->
                <div
                    class="col-span-12 rounded-md shadow-md border border-stroke bg-white p-7.5 shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-4">
                    <div class="mb-4 justify-between gap-4 sm:flex px-4 py-3">
                        <div>
                            <h4 class="text-xl font-bold mb-4 text-zinc-800  ">
                                Premium User
                            </h4>
                        </div>
                        <div>
                            {{-- <div class="relative z-20 inline-block mb-8 rounded-md">
                                <select name="#" id="#"
                                    class="relative z-20 inline-flex appearance-none rounded-md border-slate-400 bg-transparent py-1 pl-3 pr-8 text-sm font-medium outline-none">
                                    <option value="">This Week</option>
                                    <option value="">Last Week</option>
                                </select>
                                <span class="absolute right-3 top-1/2 z-10 -translate-y-1/2">
                                    
                                        
                                        
                                </span>
                            </div> --}}
                        </div>
                    </div>

                    <div>
                        <div id="chartTwo" class="-mb-9 -ml-5"></div>
                    </div>
                </div>

        <!-- ====== Chart Two End -->

        <!-- ====== Chart Three Start -->
        {{-- <div
            class="col-span-12 rounded-md shadow-md border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-5 py-5">
            <div class="mb-3 justify-between gap-4 sm:flex">
                <div>
                    <h4 class="text-xl font-bold text-black dark:text-white">
                        Visitors Analytics
                    </h4>
                </div>
                <div>
                    <div class="relative z-20 inline-block">
                        <select name="" id=""
                            class="relative z-20 inline-flex appearance-none bg-transparent border border-slate-400 rounded-md py-1 pl-3 pr-8 text-sm font-medium outline-none">
                            <option value="">Monthly</option>
                            <option value="">Yearly</option>
                        </select>
                    
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div id="chartThree" class="mx-auto flex justify-center mb-5">Device Engament</div>
            </div>
            <div class="-mx-8 flex flex-wrap items-center justify-center gap-y-3">
                <div class="w-full px-8 sm:w-1/2">
                    <div class="flex w-full items-center">
                        <span class="mr-2 block h-3 w-full max-w-3 bg-blue-600 rounded-full bg-primary"></span>
                        <p
                            class="flex w-full justify-between text-sm font-medium text-black dark:text-white">
                            <span> Desktop </span>
                            <span> 65% </span>
                        </p>
                    </div>
                </div>
                <div class="w-full px-8 sm:w-1/2">
                    <div class="flex w-full items-center">
                        <span class="mr-2 block h-3 w-full max-w-3 rounded-full bg-[#6577F3]"></span>
                        <p
                            class="flex w-full justify-between text-sm font-medium text-black dark:text-white">
                            <span> Tablet </span>
                            <span> 34% </span>
                        </p>
                    </div>
                </div>
                <div class="w-full px-8 sm:w-1/2">
                    <div class="flex w-full items-center">
                        <span class="mr-2 block h-3 w-full max-w-3 rounded-full bg-[#8FD0EF]"></span>
                        <p
                            class="flex w-full justify-between text-sm font-medium text-black dark:text-white">
                            <span> Mobile </span>
                            <span> 45% </span>
                        </p>
                    </div>
                </div>
                <div class="w-full px-8 sm:w-1/2">
                    <div class="flex w-full items-center">
                        <span class="mr-2 block h-3 w-full max-w-3 rounded-full bg-[#0FADCF]"></span>
                        <p
                            class="flex w-full justify-between text-sm font-medium text-black dark:text-white">
                            <span> Unknown </span>
                            <span> 12% </span>
                        </p>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- ====== Chart Three End -->
         <!-- ====== Map One Start -->
         {{-- <div
         class="col-span-12 rounded-md shadow-md border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-7">
         <h4 class="mb-2 text-xl font-bold px-4 py-2 text-black dark:text-white">
             Region labels
         </h4>
         <div id="mapOne" class="mapOne map-btn h-90"></div> --}}
     </div>

     <!-- ====== Map One End -->

        </div>
        
    </div>
</main>
<!-- ===== Main Content End ===== -->
<!-- ===== Content Area End ===== -->
@endsection