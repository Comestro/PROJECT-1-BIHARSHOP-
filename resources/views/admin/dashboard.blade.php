@extends('admin.adminBase')
@section('title', 'Dashboard')
@section('content')


<!-- ===== Content Area Start ===== -->


<!-- ===== Header End ===== -->

<!-- ===== Main Content Start ===== -->
<main>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
       <div class="flex flex-wrap justify-between gap-4">
    <!-- Card Item Start -->
    <div class="w-full md:w-[48%] lg:w-[23%] shadow-md rounded-lg bg-gradient-to-r from-green-400 to-green-600 text-white px-5 py-6">
        <div class="flex items-center justify-between">
            <div>
                <!-- User SVG Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>

                </svg>
                
            </div>
            <div>
                <h4 class="text-2xl font-bold text-center">
                    {{count($userCount)}}
                </h4>
                <span class="text-sm">Total User</span>
            </div>
        </div>
    </div>
    <!-- Card Item End -->

    <!-- Card Item Start -->
    <div class="w-full md:w-[48%] lg:w-[23%] shadow-md rounded-lg bg-gradient-to-r from-orange-400 to-orange-600 text-white px-5 py-6">
        <div class="flex items-center justify-between">
            <div>
                <!-- Eye SVG Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7l9-4 9 4-9 4-9-4z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 10v10a2 2 0 01-2 2H5a2 2 0 01-2-2V10" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10l9 4 9-4" />
                </svg>
            </div>
            <div>
                <h4 class="text-2xl font-bold text-center">
                    {{count($proCount)}}
                </h4>
                <span class="text-sm">Total Product</span>
            </div>
        </div>
    </div>
    <!-- Card Item End -->

    <!-- Card Item Start -->
    <div class="w-full md:w-[48%] lg:w-[23%] shadow-md rounded-lg bg-gradient-to-r from-blue-400 to-blue-600 text-white px-5 py-6">
        <div class="flex items-center justify-between">
            <div>
                <!-- Envelope SVG Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M3 7a4 4 0 014-4h2.586a2 2 0 011.414.586l7.414 7.414a2 2 0 010 2.828l-6 6a2 2 0 01-2.828 0l-7.414-7.414A2 2 0 013 9.586V7z" />
                </svg>
            </div>
            <div>
                <h4 class="text-2xl font-bold text-center">
                    {{count($catCount)}}
                </h4>
                <span class="text-sm">Total Category</span>
            </div>
        </div>
    </div>
    <!-- Card Item End -->

    <!-- Card Item Start -->
    <div class="w-full md:w-[48%] lg:w-[23%] shadow-md rounded-lg bg-gradient-to-r from-red-400 to-red-600 text-white px-5 py-6">
        <div class="flex items-center justify-between">
            <div>
                <!-- Truck SVG Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="1" y="3" width="15" height="13"></rect>
                    <polygon points="16 8 20 8 23 11 23 16 16 16"></polygon>
                    <circle cx="5.5" cy="18.5" r="2.5"></circle>
                    <circle cx="18.5" cy="18.5" r="2.5"></circle>
                </svg>
            </div>
            <div>
                <h4 class="text-2xl font-bold text-center">
                    {{count($orderCount)}}
                </h4>
                <span class="text-sm">Total Delivery</span>
            </div>
        </div>
    </div>
    <!-- Card Item End -->
</div>

        <div class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5">
            <!-- ====== Chart One Start -->
            <div
                class="col-span-12 rounded-md shadow-md border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-8  py-4">
                <div class="flex flex-wrap items-start justify-between gap-3 sm:flex-nowrap ">
                    <div class="flex w-full flex-wrap gap-3 sm:gap-5 px-2 py-2 ">
                        <div class="flex min-w-47.5 ">
                            <span
                                class="mr-2 mt-1 flex h-4 w-full max-w-4 items-center justify-center rounded-full bg-purple-500 border border-primary">
                                <span class="block h-2.5 w-full max-w-2.5 rounded-full bg-primary"></span>
                            </span>
                            <div class="w-full">
                                <p class="font-semibold text-primary">Total Revenue</p>
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
                            Profit this week
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
            <div
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
            </div>

            <!-- ====== Chart Three End -->

            <!-- ====== Map One Start -->
            <div
                class="col-span-12 rounded-md shadow-md border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-7">
                <h4 class="mb-2 text-xl font-bold px-4 py-2 text-black dark:text-white">
                    Region labels
                </h4>
                <div id="mapOne" class="mapOne map-btn h-90"></div>
            </div>

            <!-- ====== Map One End -->

            <!-- ====== Table One Start -->
            <div class="col-span-12 xl:col-span-8">
                <div
                    class="rounded-md shadow-md border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
                    <h4 class="mb-6 text-xl font-bold text-black dark:text-white">
                        Top Channels
                    </h4>

                    <div class="flex flex-col">
                        <div class="grid grid-cols-3 rounded-sm bg-gray-2 dark:bg-meta-4 sm:grid-cols-5">
                            <div class="p-2.5 xl:p-5">
                                <h5 class="text-sm font-medium uppercase xsm:text-base">Source</h5>
                            </div>
                            <div class="p-2.5 text-center xl:p-5">
                                <h5 class="text-sm font-medium uppercase xsm:text-base">Visitors</h5>
                            </div>
                            <div class="p-2.5 text-center xl:p-5">
                                <h5 class="text-sm font-medium uppercase xsm:text-base">Revenues</h5>
                            </div>
                            <div class="hidden p-2.5 text-center sm:block xl:p-5">
                                <h5 class="text-sm font-medium uppercase xsm:text-base">Sales</h5>
                            </div>
                            <div class="hidden p-2.5 text-center sm:block xl:p-5">
                                <h5 class="text-sm font-medium uppercase xsm:text-base">Conversion</h5>
                            </div>
                        </div>

                        <div
                            class="grid grid-cols-3 border-b border-stroke dark:border-strokedark sm:grid-cols-5">
                            <div class="flex items-center gap-3 p-2.5 xl:p-5">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('assets/assets_admin/images/brand/brand-01.svg')}}" alt="Brand" />
                                </div>
                                <p class="hidden font-medium text-black dark:text-white sm:block">
                                    Google
                                </p>
                            </div>

                            <div class="flex items-center justify-center p-2.5 xl:p-5">
                                <p class="font-medium text-black dark:text-white">3.5K</p>
                            </div>

                            <div class="flex items-center justify-center p-2.5 xl:p-5">
                                <p class="font-medium text-meta-3">$5,768</p>
                            </div>

                            <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                                <p class="font-medium text-black dark:text-white">590</p>
                            </div>

                            <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                                <p class="font-medium text-meta-5">4.8%</p>
                            </div>
                        </div>

                        <div
                            class="grid grid-cols-3 border-b border-stroke dark:border-strokedark sm:grid-cols-5">
                            <div class="flex items-center gap-3 p-2.5 xl:p-5">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('assets/assets_admin/images/brand/brand-02.svg')}}" alt="Brand" />
                                </div>
                                <p class="hidden font-medium text-black dark:text-white sm:block">
                                    Twitter
                                </p>
                            </div>

                            <div class="flex items-center justify-center p-2.5 xl:p-5">
                                <p class="font-medium text-black dark:text-white">2.2K</p>
                            </div>

                            <div class="flex items-center justify-center p-2.5 xl:p-5">
                                <p class="font-medium text-meta-3">$4,635</p>
                            </div>

                            <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                                <p class="font-medium text-black dark:text-white">467</p>
                            </div>

                            <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                                <p class="font-medium text-meta-5">4.3%</p>
                            </div>
                        </div>

                        <div
                            class="grid grid-cols-3 border-b border-stroke dark:border-strokedark sm:grid-cols-5">
                            <div class="flex items-center gap-3 p-2.5 xl:p-5">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('assets/assets_admin/images/brand/brand-03.svg')}}" alt="Brand" />
                                </div>
                                <p class="hidden font-medium text-black dark:text-white sm:block">
                                    Github
                                </p>
                            </div>

                            <div class="flex items-center justify-center p-2.5 xl:p-5">
                                <p class="font-medium text-black dark:text-white">2.1K</p>
                            </div>

                            <div class="flex items-center justify-center p-2.5 xl:p-5">
                                <p class="font-medium text-meta-3">$4,290</p>
                            </div>

                            <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                                <p class="font-medium text-black dark:text-white">420</p>
                            </div>

                            <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                                <p class="font-medium text-meta-5">3.7%</p>
                            </div>
                        </div>

                        <div
                            class="grid grid-cols-3 border-b border-stroke dark:border-strokedark sm:grid-cols-5">
                            <div class="flex items-center gap-3 p-2.5 xl:p-5">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('assets/assets_admin/images/brand/brand-04.svg')}}" alt="Brand" />
                                </div>
                                <p class="hidden font-medium text-black dark:text-white sm:block">
                                    Vimeo
                                </p>
                            </div>

                            <div class="flex items-center justify-center p-2.5 xl:p-5">
                                <p class="font-medium text-black dark:text-white">1.5K</p>
                            </div>

                            <div class="flex items-center justify-center p-2.5 xl:p-5">
                                <p class="font-medium text-meta-3">$3,580</p>
                            </div>

                            <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                                <p class="font-medium text-black dark:text-white">389</p>
                            </div>

                            <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                                <p class="font-medium text-meta-5">2.5%</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 sm:grid-cols-5">
                            <div class="flex items-center gap-3 p-2.5 xl:p-5">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('assets/assets_admin/images/brand/brand-05.svg')}}" alt="Brand" />
                                </div>
                                <p class="hidden font-medium text-black dark:text-white sm:block">
                                    Facebook
                                </p>
                            </div>

                            <div class="flex items-center justify-center p-2.5 xl:p-5">
                                <p class="font-medium text-black dark:text-white">1.2K</p>
                            </div>

                            <div class="flex items-center justify-center p-2.5 xl:p-5">
                                <p class="font-medium text-meta-3">$2,740</p>
                            </div>

                            <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                                <p class="font-medium text-black dark:text-white">230</p>
                            </div>

                            <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                                <p class="font-medium text-meta-5">1.9%</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- ====== Table One End -->

            <!-- ====== Chat Card Start -->
            <div
                class="col-span-12 rounded-md shadow-md border border-stroke bg-white py-6  px-4 shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-4">
                <h4 class="mb-6 px-7.5 text-xl font-bold text-black dark:text-white">
                    Chats
                </h4>

                <div>
                    <a href="messages.html"
                        class="flex items-center gap-5 px-7.5 py-3 hover:bg-gray-3 dark:hover:bg-meta-4">
                        <div class="relative h-14 w-14 rounded-full">
                            <img src="{{ asset('assets/assets_admin/images/user/user-03.png')}}" alt="User" />
                            <span
                                class="absolute bottom-0 right-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-meta-3"></span>
                        </div>

                        <div class="flex flex-1 items-center justify-between">
                            <div>
                                <h5 class="font-medium text-black dark:text-white">
                                    Devid Heilo
                                </h5>
                                <p>
                                    <span class="text-sm font-medium text-black dark:text-white">Hello, how
                                        are you?</span>
                                    <span class="text-xs"> . 12 min</span>
                                </p>
                            </div>
                            <div class="flex h-6 w-6 items-center justify-center rounded-full bg-primary">
                                <span class="text-sm font-medium text-white">3</span>
                            </div>
                        </div>
                    </a>
                    <a href="messages.html"
                        class="flex items-center gap-5 px-7.5 py-3 hover:bg-gray-3 dark:hover:bg-meta-4">
                        <div class="relative h-14 w-14 rounded-full">
                            <img src="{{ asset('assets/assets_admin/images/user/user-04.png')}}" alt="User" />
                            <span
                                class="absolute bottom-0 right-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-meta-3"></span>
                        </div>

                        <div class="flex flex-1 items-center justify-between">
                            <div>
                                <h5 class="font-medium">Henry Fisher</h5>
                                <p>
                                    <span class="text-sm font-medium">I am waiting for you</span>
                                    <span class="text-xs"> . 5:54 PM</span>
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="messages.html"
                        class="flex items-center gap-5 px-7.5 py-3 hover:bg-gray-3 dark:hover:bg-meta-4">
                        <div class="relative h-14 w-14 rounded-full">
                            <img src="{{ asset('assets/assets_admin/images/user/user-05.png')}}" alt="User" />
                            <span
                                class="absolute bottom-0 right-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-meta-6"></span>
                        </div>

                        <div class="flex flex-1 items-center justify-between">
                            <div>
                                <h5 class="font-medium">Wilium Smith</h5>
                                <p>
                                    <span class="text-sm font-medium">Where are you now?</span>
                                    <span class="text-xs"> . 10:12 PM</span>
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="messages.html"
                        class="flex items-center gap-5 px-7.5 py-3 hover:bg-gray-3 dark:hover:bg-meta-4">
                        <div class="relative h-14 w-14 rounded-full">
                            <img src="{{ asset('assets/assets_admin/images/user/user-01.png')}}" alt="User" />
                            <span
                                class="absolute bottom-0 right-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-meta-3"></span>
                        </div>

                        <div class="flex flex-1 items-center justify-between">
                            <div>
                                <h5 class="font-medium text-black dark:text-white">
                                    Henry Deco
                                </h5>
                                <p>
                                    <span class="text-sm font-medium text-black dark:text-white">Thank you
                                        so much!</span>
                                    <span class="text-xs"> . Sun</span>
                                </p>
                            </div>
                            <div class="flex h-6 w-6 items-center justify-center rounded-full bg-primary">
                                <span class="text-sm font-medium text-white">2</span>
                            </div>
                        </div>
                    </a>
                    <a href="messages.html"
                        class="flex items-center gap-5 px-7.5 py-3 hover:bg-gray-3 dark:hover:bg-meta-4">
                        <div class="relative h-14 w-14 rounded-full">
                            <img src="{{ asset('assets/assets_admin/images/user/user-02.png')}}" alt="User" />
                            <span
                                class="absolute bottom-0 right-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-meta-7"></span>
                        </div>

                        <div class="flex flex-1 items-center justify-between">
                            <div>
                                <h5 class="font-medium">Jubin Jack</h5>
                                <p>
                                    <span class="text-sm font-medium">I really love that!</span>
                                    <span class="text-xs"> . Oct 23</span>
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="messages.html"
                        class="flex items-center gap-5 px-7.5 py-3 hover:bg-gray-3 dark:hover:bg-meta-4">
                        <div class="relative h-14 w-14 rounded-full">
                            <img src="{{ asset('assets/assets_admin/images/user/user-05.png')}}" alt="User" />
                            <span
                                class="absolute bottom-0 right-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-meta-6"></span>
                        </div>

                        <div class="flex flex-1 items-center justify-between">
                            <div>
                                <h5 class="font-medium">Wilium Smith</h5>
                                <p>
                                    <span class="text-sm font-medium">Where are you now?</span>
                                    <span class="text-xs"> . Sep 20</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- ====== Chat Card End -->
        </div>
    </div>
</main>
<!-- ===== Main Content End ===== -->
<!-- ===== Content Area End ===== -->
@endsection