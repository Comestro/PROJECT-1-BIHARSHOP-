@extends('admin.adminBase')
@section('title', 'Manage Coupons')
@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Manage Coupons</h1>

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
                <tr class="border-b">
                    <td class="py-2 px-4">CODE123</td>
                    <td class="py-2 px-4">Percentage</td>
                    <td class="py-2 px-4">10%</td>
                    <td class="py-2 px-4">2024-12-31</td>
                    <td class="py-2 px-4">Active</td>
                    <td class="py-2 px-4">
                        <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a>
                        <form action="#" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>
@endsection
