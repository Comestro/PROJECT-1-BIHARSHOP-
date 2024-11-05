<div class="container mx-auto py-8">
    <!-- Header Section -->
    <div class="flex flex-col lg:flex-row justify-between items-center mb-5">
        <h2 class="text-2xl font-bold text-gray-800 mb-2 lg:mb-0">Order List</h2>

        {{-- dropdown menu for filtering orders based on status --}}
        <select wire:model.live="filterStatus" class="px-3 py-2 rounded">
            <option value="null" disabled>Select Status</option>
            <option value="pending">Pending</option>
            <option value="processing">Processing</option>
            <option value="completed">Completed</option>
            <option value="canceled">Cancelled</option>
        </select>

        {{-- dropdown menu for filtering the orders based on the months --}}
        <select wire:model.live="filterMonth" class="px-3 py-2 rounded">
            <option value="null" selected disabled>Select month</option>
            <option value="1">january</option>
            <option value="2">february</option>
            <option value="3">march</option>
            <option value="4">april</option>
            <option value="5">may</option>
            <option value="6">june</option>
            <option value="7">july</option>
            <option value="8">august</option>
            <option value="9">september</option>
            <option value="10">october</option>
            <option value="11">november</option>
            <option value="12">december</option>
        </select>



        <!-- Search Bar -->
        <div class="relative">
            <input type="search"
                class="border w-[300px] pl-8 pr-2 py-2 rounded-2xl border-none ring-1 ring-gray-300 focus:ring-gray-400 focus:ring-2"
                placeholder="Search orders..." wire:model.live='search' />
            <svg xmlns="http://www.w3.org/2000/svg"
                class="absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-400" width="20" height="20"
                viewBox="0 0 48 48">
                <path
                    d="M 20.5 6 C 12.509634 6 6 12.50964 6 20.5 C 6 28.49036 12.509634 35 20.5 35 C 23.956359 35 27.133709 33.779044 29.628906 31.75 L 39.439453 41.560547 A 1.50015 1.50015 0 1 0 41.560547 39.439453 L 31.75 29.628906 C 33.779044 27.133709 35 23.956357 35 20.5 C 35 12.50964 28.490366 6 20.5 6 z M 20.5 9 C 26.869047 9 32 14.130957 32 20.5 C 32 23.602612 30.776198 26.405717 28.791016 28.470703 A 1.50015 1.50015 0 0 0 28.470703 28.791016 C 26.405717 30.776199 23.602614 32 20.5 32 C 14.130953 32 9 26.869043 9 20.5 C 9 14.130957 14.130953 9 20.5 9 z">
                </path>
            </svg>
        </div>

        <!-- Add Order Button -->

    </div>

    <!-- Order Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow-lg">
            <thead>
                <tr class="bg-gray-100 text-left text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-center">Order Number</th>
                    <th class="py-3 px-6 text-center">Status</th>
                    <th class="py-3 px-6 text-center">Total Amount</th>
                    <th class="py-3 px-6 text-center">Payment Status</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>


                @forelse ($orders as $order)
                    <tr class="border-b">
                        <td class="py-3 px-6 text-center">{{ $order->order_number }}</td>
                        <td class="py-3 px-6 text-center">{{ $order->status }}</td>
                        <td class="py-3 px-6 text-center"> ₹
                            {{ $order->total_amount }}
                        </td>

                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center justify-center space-x-2">
                                <span
                                    class="inline-block w-4 h-4 rounded-full 
                            @if ($order->payment_status === 'paid') bg-green-500 
                            @else bg-red-500 @endif">
                                </span>
                                <span>{{ $order->payment_status }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center flex justify-center space-x-2">
                            <a href="{{ route('order.view', ['orderId' => $order->id]) }}"
                                class="bg-blue-400 hover:bg-blue-600 flex px-3 gap-1 py-2 text-white rounded-lg"><svg
                                    class="w-[22px] h-[22px] text-white-800  " aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2"
                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                    <path stroke="currentColor" stroke-width="2"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                View Order </a>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <th colspan="5">
                            <h1>not found any order please try to filter or change search term</h1>
                        </th>
                    </tr>
                @endforelse




            </tbody>
        </table>
    </div>

</div>
