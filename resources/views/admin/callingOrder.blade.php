@extends('admin.adminBase')
@section('title', 'Add Product')
@section('content')

<div class="mx-auto w-full p-4 md:p-6 2xl:p-10">
    
    <!-- Breadcrumb End -->

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- ====== Form Layout Section Start -->
        <div class="flex flex-col gap-9">
            <!-- Contact Form -->
          <livewire:admin.calling-order :userId="$userId"/>
        </div>


</div>




@endsection
