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
                <livewire:admin.dashboard.static-card />

            </div>

            <div class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5">


                <div
                    class="col-span-12 rounded-md shadow-md border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-8  py-4">

                    <livewire:admin.dashboard.graph-chart />

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
                <div
                class="col-span-12 h-[480px] overflow-y-scroll md:col-span-4 rounded-md shadow-md border border-stroke bg-white py-6  px-4 shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-4">
                <h4 class="mb-6 px-7.5 text-xl font-bold text-black ">
                    Recent User
                </h4>

                <livewire:admin.dashboard.calling-user />


            </div>

                

            </div>

            {{-- order table form --}}
            <div class="container mt-10 mx-auto ">
                <h3 class="text-xl font-bold mb-2 mt-4">Recent Orders</h3>

                <livewire:admin.dashboard.ordercalling />

            </div>
            <!-- ====== Map One End -->

        </div>

        </div>
    </main>
    <!-- ===== Main Content End ===== -->
    <!-- ===== Content Area End ===== -->
@endsection
