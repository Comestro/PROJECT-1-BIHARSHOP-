@extends('admin.adminBase')

@section('title', 'Manage Products')

@section('content')
<main>
    <div class="max-w-7xl mx-auto p-6 w-full">
        <div class="flex flex-1 justify-between">
            <h2 class="text-2xl font-bold mb-6">Edit Product</h2>
        <div class="">
            <a wire:navigate href="{{ route('product.index') }}" class="bg-blue-500  hover:bg-blue-700  text-white font-semibold py-2 px-4 rounded shadow-md transition duration-200 ease-in-out">
                View product
            </a>
        </div>
        </div>
        <livewire:admin.view-product :slug="$slug"/>

       
    </div>
   
</main>
@endsection
