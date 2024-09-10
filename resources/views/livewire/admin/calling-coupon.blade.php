<div>
    <div class="flex flex-1 justify-between">
        <h1 class="text-2xl font-bold mb-4">Manage Coupons</h1>
        <input type="search" class="border w-[200px] px-3 py-2" wire:model.live="search"/>
    </div>
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
                    <td class="py-2 px-4">{{$coupon->expriation_date}}</td>
                    <td class="py-2 px-4">{{$coupon->status}}</td>
                    <td class="py-2 px-4">
                        <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a>

                    </td>
                </tr>
                @endforeach
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>
