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
                <div class="flex flex-wrap items-start justify-between gap-3 sm:flex-nowrap ">
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
                </div>
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
                            <h4 class="text-xl font-bold text-zinc-800  dark:text-white ">
                                Premium User
                            </h4>
                        </div>
                        <div>
                            <div class="relative z-20 inline-block mb-8 rounded-md">
                                <select name="#" id="#"
                                    class="relative z-20 inline-flex appearance-none rounded-md border-slate-400 bg-transparent py-1 pl-3 pr-8 text-sm font-medium outline-none">
                                    <option value="">This Week</option>
                                    <option value="">Last Week</option>
                                </select>
                                <span class="absolute right-3 top-1/2 z-10 -translate-y-1/2">
                                    
                                        
                                        
                                </span>
                            </div>
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