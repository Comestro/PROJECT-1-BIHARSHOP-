@extends('admin.adminBase')
@section('title', 'Add Product')
@section('content')

<div class="mx-auto w-full p-4 md:p-6 2xl:p-10">
    <!-- Breadcrumb Start -->
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black ">
            Product Insertion Form / <a href="{{route('product.index')}}" class="font-medium hover:text-blue-500 text-xl " href="javascript:void(0)">View Products </a>

        </h2>

        {{-- <nav>
            <ol class="flex items-center gap-2">
                <li>
                </li>
                <li class="font-medium text-primary">Add Product</li>
            </ol>
        </nav> --}}
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
          <livewire:admin.insert-product/>
        </div>


    </div>
</div>




@endsection
