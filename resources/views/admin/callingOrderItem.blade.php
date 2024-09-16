@extends('admin.adminBase')
@section('title', 'Add Product')
@section('content')

<div class="mx-auto w-full p-4 md:p-6 2xl:p-10">
    <!-- Breadcrumb Start -->
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
       
    </div>
    <!-- Breadcrumb End -->

    @if (session('error'))
       <!-- ====== Form Layout Section Start -->
<div class="grid grid-cols-1 gap-6 sm:gap-9">
    <div class="flex flex-col gap-6 sm:gap-9">
        <div class="container p-4 sm:p-6">
            <h1 class="text-2xl sm:text-3xl font-bold mb-4 sm:mb-6">Order Details </h1>
        
            @if ($order)
            <div class="bg-gray-100 shadow-lg rounded-lg p-4 sm:p-6 mx-auto mt-6 sm:mt-8 w-full">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4 sm:mb-6">Order: {{ $order->order_number }}</h2>
        
                <table class="table-auto w-full text-left border-collapse">
                    <tbody>
                        <tr class="border-b hover:bg-gray-200">
                            <th class="py-2 px-2 sm:px-4 font-semibold text-gray-700">Customer</th>
                            <td class="py-2 px-2 sm:px-4">{{ $order->user->name }}</td>
                        </tr>
                        <tr class="border-b hover:bg-gray-200">
                            <th class="py-2 px-2 sm:px-4 font-semibold text-gray-700">Address</th>
                            <td class="py-2 px-2 sm:px-4">{{ $order->address ? $order->address->full_address : 'N/A' }}</td>
                        </tr>
                        <tr class="border-b hover:bg-gray-200">
                            <th class="py-2 px-2 sm:px-4 font-semibold text-gray-700">Status</th>
                            <td class="py-2 px-2 sm:px-4">{{ ucfirst($order->status) }}</td>
                        </tr>
                        <tr class="border-b hover:bg-gray-200">
                            <th class="py-2 px-2 sm:px-4 font-semibold text-gray-700">Total Amount</th>
                            <td class="py-2 px-2 sm:px-4">${{ number_format($order->total_amount, 2) }}</td>
                        </tr>
                        <tr class="border-b hover:bg-gray-200">
                            <th class="py-2 px-2 sm:px-4 font-semibold text-gray-700">Shipping Charge</th>
                            <td class="py-2 px-2 sm:px-4">${{ number_format($order->shipping_charge, 2) }}</td>
                        </tr>
                        <tr class="border-b hover:bg-gray-200">
                            <th class="py-2 px-2 sm:px-4 font-semibold text-gray-700">Payment Status</th>
                            <td class="py-2 px-2 sm:px-4">{{ ucfirst($order->payment_status) }}</td>
                        </tr>
                        <tr class="border-b hover:bg-gray-200">
                            <th class="py-2 px-2 sm:px-4 font-semibold text-gray-700">Payment Method</th>
                            <td class="py-2 px-2 sm:px-4">{{ $order->payment_method ?? 'N/A' }}</td>
                        </tr>
                        <tr class="border-b hover:bg-gray-200">
                            <th class="py-2 px-2 sm:px-4 font-semibold text-gray-700">Tracking Number</th>
                            <td class="py-2 px-2 sm:px-4">{{ $order->tracking_number ?? 'N/A' }}</td>
                        </tr>
                        <tr class="border-b hover:bg-gray-200">
                            <th class="py-2 px-2 sm:px-4 font-semibold text-gray-700">Coupon Code</th>
                            <td class="py-2 px-2 sm:px-4">{{ $order->coupon_code ?? 'N/A' }}</td>
                        </tr>
                    </tbody>
                </table>
        
                <div class="mt-4 sm:mt-6 flex justify-end">
                    <a href="{{ route('orders.index') }}" class="text-green-600 hover:text-green-800 underline">Back to Orders List</a>
                </div>
            </div>
        
            @else
                <p class="text-red-500">Order not found.</p>
            @endif
        </div>
        
        <!-- Order Items Table -->
        <div class="mt-6 sm:mt-8">
            <h3 class="text-lg sm:text-xl font-semibold mb-4 text-gray-900">Order Items</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-2 px-4 border-b text-center">Product</th>
                            <th class="py-2 px-4 border-b text-center">Color</th>
                            <th class="py-2 px-4 border-b text-center">Size</th>
                            <th class="py-2 px-4 border-b text-center">Quantity</th>
                            <th class="py-2 px-4 border-b text-center">Discount Price</th>
                            <th class="py-2 px-4 border-b text-center">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item)
                            <tr>
                                <td class="py-2 px-4 border-b text-center">{{ $item->products->name }}</td>
                                <td class="py-2 px-4 border-b text-center">
                                    @if($item->colorVariant)
                                        <div class="w-6 h-6 rounded-full" style="background-color: {{ $item->colorVariant->variant_value }};"></div>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b text-center">{{ $item->sizeVariant->variant_value ?? 'NULL' }}</td>
                                <td class="py-2 px-4 border-b text-center">{{ $item->quantity }}</td>
                                <td class="py-2 px-4 border-b text-center">₹{{ number_format($item->products->discount_price, 2) }}</td>
                                <td class="py-2 px-4 border-b text-center">
                                    ₹{{ number_format($item->quantity * $item->products->discount_price, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    @endif

    <!-- ====== Form Layout Section Start -->
    <div class="grid grid-cols-1 gap-9">
        <div class="flex flex-col gap-9">
            <div class="container  p-6">
                <h1 class="text-3xl font-bold mb-6">Order Details </h1>
            
                @if ($order)
                <div class="bg-gray-100 shadow-lg rounded-lg p-6  mx-auto mt-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Order :{{ $order->order_number }}</h2>
            
                    <table class="table-auto w-full text-left border-collapse">
                        <tbody>
                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Customer</th>
                                <td class="py-2 px-4">{{ $order->user->name }}</td>
                            </tr>
                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Address</th>
                                <td class="py-2 px-4">{{ $order->address ? $order->address->full_address : 'N/A' }}</td>
                            </tr>
                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Status</th>
                                <td class="py-2 px-4">{{ ucfirst($order->status) }}</td>
                            </tr>
                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Total Amount</th>
                                <td class="py-2 px-4">${{ number_format($order->total_amount, 2) }}</td>
                            </tr>
                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Shipping Charge</th>
                                <td class="py-2 px-4">${{ number_format($order->shipping_charge, 2) }}</td>
                            </tr>
                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Payment Status</th>
                                <td class="py-2 px-4">{{ ucfirst($order->payment_status) }}</td>
                            </tr>
                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Payment Method</th>
                                <td class="py-2 px-4">{{ $order->payment_method ?? 'N/A' }}</td>
                            </tr>
                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Tracking Number</th>
                                <td class="py-2 px-4">{{ $order->tracking_number ?? 'N/A' }}</td>
                            </tr>
                            <tr class="border-b  hover:bg-gray-200">
                                <th class="py-2 px-4 font-semibold text-gray-700">Coupon Code</th>
                                <td class="py-2 px-4">{{ $order->coupon_code ?? 'N/A' }}</td>
                            </tr>
                        </tbody>
                    </table>
            
                        <div class="mt-6 flex justify-end">
                            <a href="{{ route('orders.index') }}" class="text-green-600 hover:text-green-800 underline">Back to Orders List</a>
                        </div>
                </div>
            
                @else
                    <p class="text-red-500">Order not found.</p>
                @endif
            </div>
            
            {{-- {{dd($order->orderItems)}} --}}
             <!-- Order Items Table -->
            <div class="mt-8">
                <h3 class="text-xl font-semibold mb-4 text-gray-900">Order Items</h3>
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="py-2 px-4 border-b text-center">Product</th>
                                <th class="py-2 px-4 border-b text-center">Color</th>
                                <th class="py-2 px-4 border-b text-center">Size</th>
                                <th class="py-2 px-4 border-b text-center">Quantity</th>
                                <th class="py-2 px-4 border-b text-center">Discount Price</th>
                                <th class="py-2 px-4 border-b text-center">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $item)
                                <tr>
                                    <td class="py-2 px-4 border-b text-center">{{$item->products->name}}</td>
                                    <td class="py-2 px-4 border-b text-center">
                                        @if($item->colorVariant)
                                            <div class="w-6 h-6 rounded-full text-center" style="background-color: {{ $item->colorVariant->variant_value }};"></div>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="py-2 px-4 border-b text-center">{{$item->sizeVariant->variant_value ?? 'NULL'}}</td>
                                    <td class="py-2 px-4 border-b text-center">{{$item->quantity}}</td>
                                    <td class="py-2 px-4 border-b text-center">₹{{ number_format($item->products->discount_price, 2) }}</td>
                                    <td class="py-2 px-4 border-b text-center">
                                        ₹{{ number_format($item->quantity * $item->products->discount_price, 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                
            </div>
            <!-- Contact Form -->
        </div>


    </div>
</div>




@endsection
