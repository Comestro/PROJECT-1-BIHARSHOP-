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
    <div class="flex flex-1 justify-between items-center">
        <h2 class="text-2xl font-bold mb-4">Address for {{ $user->name }}</h2>
     <a href="{{route('users.index')}}" class="px-3 py-2 text-white rounded-lg  bg-blue-400">Manage User</a>
    </div>
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
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" {{ $address->status ? 'checked' : '' }} disabled>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 rounded-full peer 
                                    peer-checked:bg-green-500 peer-checked:after:translate-x-full peer-checked:after:border-white 
                                    after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 
                                    after:border after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                                {{-- <span class="ml-3 text-sm font-medium {{ $address->status ? 'text-green-500' : 'text-red-500' }}">
                                    {{ $address->status ? 'Active' : 'Inactive' }}
                                </span> --}}
                            </label>
                        </td>
                        
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
</div>

@endsection
