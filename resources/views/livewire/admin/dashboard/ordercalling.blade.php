<div>
  <!-- Recent Orders -->
  <div class="bg-white shadow-md rounded-md">

    @if($orderItems->isEmpty())
        <p class="p-4">No recent orders available.</p>
    @else
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-6 py-2 text-left text-gray-600 font-medium border border-gray-200">Order ID</th>
                    <th class="px-6 py-2 text-left text-gray-600 font-medium border border-gray-200">Customer Name</th>
                    <th class="px-6 py-2 text-left text-gray-600 font-medium border border-gray-200">Product</th>
                    <th class="px-6 py-2 text-left text-gray-600 font-medium border border-gray-200">Qty</th>
                    <th class="px-6 py-2 text-left text-gray-600 font-medium border border-gray-200">Total Price</th>
                    <th class="px-6 py-2 text-left text-gray-600 font-medium border border-gray-200">Status</th>
                    <th class="px-6 py-2 text-left text-gray-600 font-medium border border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderItems as $order)
                    <tr class="border-b">
                        <td class="px-6 py-4 text-sm">{{ $order->order->order_number }}</td>
                        <td class="px-6 py-4 text-sm">{{ $order->order->user->name }}</td>
                        <td class="px-6 py-4 text-sm">{{ $order->products->name }}</td>
                        <td class="px-6 py-4 text-sm">{{ $order->quantity }}</td>
                        <td class="px-6 py-4 text-sm">                                      
                            ₹{{ number_format($order->quantity * $order->products->discount_price, 2) }}
                        </td>
                        <td class="px-6 py-2 border text-sm border-gray-200">
                            @if($order->order->status === 'completed')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">Completed</span>
                            @elseif($order->order->status === 'pending')
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">Pending</span>
                            @elseif($order->order->status === 'processing')
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">Processing</span>
                            @elseif($order->order->status === 'canceled')
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">Canceled</span>
                            @endif
                        </td>
                        <td class="py-3 px-6 text-center flex justify-center mt-4 space-x-2">
                            <a href="{{ route('order.view', ['orderId' => $order->order_id]) }}" class="bg-blue-400 hover:bg-blue-600 flex px-3 gap-1 py-2 text-white rounded-lg"><svg class="w-[22px] h-[22px] text-white-800  dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            </svg>
                            Order </a>
                        </td>

                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div></div>
