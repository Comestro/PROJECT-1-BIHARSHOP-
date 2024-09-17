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
    <div class="flex flex-1 justify-between items-center">
        <h2 class="text-2xl font-bold mb-4">{{ $user->name }}'s Wishlist</h2>
     <a href="{{route('users.index')}}" class="px-3 py-2 text-white rounded-lg  bg-blue-400">Manage User</a>
    </div>

    <!-- ====== Form Layout Section Start -->
    <div class="grid grid-cols-1 gap-9">
        <div class="flex flex-col gap-9">
            <!-- Contact Form -->
            <div class="container mx-auto px-4 py-8">
            
                @if($user->wishlists->isEmpty())
                    <p class="text-gray-600">No products in the wishlist.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full bg-white shadow-md rounded-lg">
                            <thead>
                                <tr class="bg-gray-200 text-left">
                                    <th class="px-4 py-2">Number</th>
                                    <th class="px-4 py-2">Product Name</th>
                                    <th class="px-4 py-2">Description</th>
                                    <th class="px-4 py-2">Price</th>
                                    <th class="px-4 py-2">Brand</th>
                                    <th class="px-4 py-2">Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->wishlists as $key => $wishlist)
                                    <tr class="border-b">
                                        <td class="px-4 py-2">{{ $key+1 }}</td>
                                        <td class="px-4 py-2">{{ $wishlist->product->name }}</td>
                                        <td class="px-4 py-2">{{ Str::limit($wishlist->product->description, 50) }}</td>
                                        <td class="px-4 py-2">{{ $wishlist->product->price }}</td>
                                        <td class="px-4 py-2">{{ $wishlist->product->brand }}</td>
                                        <td class="px-4 py-2">  
                                            <img src="{{ asset('storage/image/product/' . $wishlist->product->image) }}" alt="{{ $wishlist->product->name }}" class="w-16 h-16 object-cover rounded-md">
                                        </td>

                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

        </div>


    </div>
</div>




@endsection
