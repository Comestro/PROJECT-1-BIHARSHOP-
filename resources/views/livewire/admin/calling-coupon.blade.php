<div>
<!-- Static Table for Displaying Coupons -->
<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-100 border-b">
                <th class="py-2 px-4 text-left text-gray-600">Code</th>
                <th class="py-2 px-4 text-left text-gray-600">Discount Type</th>
                <th class="py-2 px-4 text-left text-gray-600">Discount Value</th>
                <th class="py-2 px-4 text-left text-gray-600">Expiration Date</th>
                <th class="py-2 px-4 text-left text-gray-600">Status</th>
                <th class="py-2 px-4 text-left text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($coupons as $coupon)
            <tr class="border-b">
                <td class="py-2 px-4">{{$coupon->code}}</td>
                <td class="py-2 px-4">{{$coupon->discount_type}}</td>
                <td class="py-2 px-4">{{$coupon->discount_value}}</td>
                <td class="py-2 px-4">{{$coupon->expiration_date}}</td>
                
                <td class="py-2 px-4">
                    <button wire:click="toggleStatus({{ $coupon->id }})" class="text-blue-500 hover:text-blue-700">
                        @if($coupon->status)
                        <span class="inline-flex items-center px-3 py-1 text-sm font-medium leading-5 bg-green-100 text-green-800 font-semibold rounded-full">Active</span>

                        @else
                        <span class="inline-flex items-center px-3 py-1 text-sm font-medium leading-5 bg-red-100 text-red-800 font-semibold rounded-full">Inactive</span>
                        @endif
                    </button>
                </td>
                <td class="py-2 px-4">
                    <a href="{{ route('admin.edit-coupon', ['id' => $coupon->id]) }}" class="text-blue-500 hover:text-blue-700">
                        Edit
                    </a>
                </td>
            </tr>
            
            @endforeach
            <!-- Add more rows as needed -->
        </tbody>
    </table>
</div></div>
