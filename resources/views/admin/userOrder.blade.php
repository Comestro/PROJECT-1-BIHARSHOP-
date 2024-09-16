@extends('admin.adminBase')
@section('title', 'Add Product')
@section('content')

<div class="mx-auto w-full p-4 md:p-6 2xl:p-10">
    <!-- Breadcrumb Start -->
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
       
    </div>
    <!-- Breadcrumb End -->

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- ====== Form Layout Section Start -->
    <div class="grid grid-cols-1 gap-9">
        <div class="flex flex-col gap-9">
            <!-- Contact Form -->
            <div class="container mx-auto p-4">
                <h2 class="text-2xl font-bold mb-4">Orders for {{ $user->name }}</h2>
            
                @if($user->orders->isEmpty())
                    <p class="text-gray-600">No orders found for this user.</p>
                @else
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100 border-b">
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Order Number</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Status</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Total Amount</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Payment Status</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Tracking Number</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->orders as $order)
                                <tr class="border-b">
                                    <td class="px-6 py-4">{{ $order->order_number }}</td>
                                    <td class="px-6 py-4 capitalize">{{ $order->status }}</td>
                                    <td class="px-6 py-4">${{ number_format($order->total_amount, 2) }}</td>
                                    <td class="px-6 py-4 capitalize">{{ $order->payment_status }}</td>
                                    <td class="px-6 py-4">{{ $order->tracking_number ?? 'NULL' }}</td>
                                    <td class="px-6 py-4">
                                        <a href="#" class="text-blue-500 hover:underline">View</a>
                                        <a href="#" class="text-red-500 hover:underline ml-4">Cancel</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>


    </div>
</div>




@endsection
