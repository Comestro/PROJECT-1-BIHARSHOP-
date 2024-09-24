{{-- {{dd($payments)}} --}}
<div>
            {{-- <div
                class="rounded-md shadow-md border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
                <h4 class="mb-6 text-xl font-bold text-black ">
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
                            <p class="hidden font-medium text-black  sm:block">
                                Google
                            </p>
                        </div>

                        <div class="flex items-center justify-center p-2.5 xl:p-5">
                            <p class="font-medium text-black ">3.5K</p>
                        </div>

                        <div class="flex items-center justify-center p-2.5 xl:p-5">
                            <p class="font-medium text-meta-3">$5,768</p>
                        </div>

                        <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                            <p class="font-medium text-black ">590</p>
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
                            <p class="hidden font-medium text-black  sm:block">
                                Twitter
                            </p>
                        </div>

                        <div class="flex items-center justify-center p-2.5 xl:p-5">
                            <p class="font-medium text-black ">2.2K</p>
                        </div>

                        <div class="flex items-center justify-center p-2.5 xl:p-5">
                            <p class="font-medium text-meta-3">$4,635</p>
                        </div>

                        <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                            <p class="font-medium text-black ">467</p>
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
                            <p class="hidden font-medium text-black  sm:block">
                                Github
                            </p>
                        </div>

                        <div class="flex items-center justify-center p-2.5 xl:p-5">
                            <p class="font-medium text-black ">2.1K</p>
                        </div>

                        <div class="flex items-center justify-center p-2.5 xl:p-5">
                            <p class="font-medium text-meta-3">$4,290</p>
                        </div>

                        <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                            <p class="font-medium text-black ">420</p>
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
                            <p class="hidden font-medium text-black  sm:block">
                                Vimeo
                            </p>
                        </div>

                        <div class="flex items-center justify-center p-2.5 xl:p-5">
                            <p class="font-medium text-black ">1.5K</p>
                        </div>

                        <div class="flex items-center justify-center p-2.5 xl:p-5">
                            <p class="font-medium text-meta-3">$3,580</p>
                        </div>

                        <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                            <p class="font-medium text-black ">389</p>
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
                            <p class="hidden font-medium text-black  sm:block">
                                Facebook
                            </p>
                        </div>

                        <div class="flex items-center justify-center p-2.5 xl:p-5">
                            <p class="font-medium text-black ">1.2K</p>
                        </div>

                        <div class="flex items-center justify-center p-2.5 xl:p-5">
                            <p class="font-medium text-meta-3">$2,740</p>
                        </div>

                        <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                            <p class="font-medium text-black ">230</p>
                        </div>

                        <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                            <p class="font-medium text-meta-5">1.9%</p>
                        </div>
                    </div>
                </div>
            </div> --}}


            <div class="p-2">
    <h2 class="text-lg font-bold mb-4">Payment Table</h2>
    <div class="overflow-x-auto">
        <table class="table-auto w-full">
            <thead>
                <tr class="bg-gray-100 text-sm truncate">
                    <th class="px-6 py-2 ">Order ID</th>
                    <th class="px-4 py-2 text-sm">User ID</th>
                    <th class="px-4 py-2">Amount</th>
                    <th class="px-4 py-2">Currency</th>
                    <th class="px-4 py-2">Payment Status</th>
                    <th class="px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr class="text-sm sm:text-base">
                        <td class="border px-2 py-1 sm:px-4 sm:py-2">{{ $payment->order->order_number }}</td>
                        <td class="border px-2 py-1 sm:px-4 sm:py-2">{{ $payment->user->name }}</td>
                        <td class="border px-2 py-1 sm:px-4 sm:py-2">{{ $payment->amount }}</td>
                        <td class="border px-2 py-1 sm:px-4 sm:py-2">{{ $payment->currency }}</td>
                        <td class="border px-2 py-1 sm:px-4 sm:py-2">{{ $payment->payment_status }}</td>
                        <td class="border px-2 py-1 sm:px-4 sm:py-2">
                            @if ($payment->status==1)
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs sm:text-sm">Paid</span>
                            @elseif($payment->status==0)
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs sm:text-sm">UnPaid</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


</div>
