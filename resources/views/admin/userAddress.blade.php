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
  {{-- {{dd($user)}} --}}


<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Address for {{ $user->name }}</h2>

    @if($user->addresses->isEmpty())
        <p class="text-gray-600">No addresses found for this user.</p>
    @else
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Phone</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Alt Phone</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Address Type</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">City</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">State</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Postal Code</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Status</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->addresses as $address)
                    <tr class="border-b">
                        <td class="px-6 py-4">{{ $address->name }}</td>
                        <td class="px-6 py-4">{{ $address->phone }}</td>
                        <td class="px-6 py-4">{{ $address->alt_phone ?? 'N/A' }}</td>
                        <td class="px-6 py-4">{{ $address->address_type ?? 'N/A' }}</td>
                        <td class="px-6 py-4">{{ $address->city }}</td>
                        <td class="px-6 py-4">{{ $address->state }}</td>
                        <td class="px-6 py-4">{{ $address->postal_code }}</td>
                        <td class="px-6 py-4">
                            @if($address->status)
                                <span class="text-green-500">Active</span>
                            @else
                                <span class="text-red-500">Inactive</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="text-blue-500 hover:underline">Edit</a>
                            <a href="#" class="text-red-500 hover:underline ml-4">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
</div>

@endsection
