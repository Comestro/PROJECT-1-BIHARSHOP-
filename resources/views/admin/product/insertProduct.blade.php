@extends('admin.adminBase')
@section('title', 'Add Product')
@section('content')

<div class="mx-auto w-full p-4 md:p-6 2xl:p-10">
    <!-- Breadcrumb Start -->
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white">
            Product Insertion Form
        </h2>

        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium" href="javascript:void(0)">Products /</a>
                </li>
                <li class="font-medium text-primary">Add Product</li>
            </ol>
        </nav>
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
