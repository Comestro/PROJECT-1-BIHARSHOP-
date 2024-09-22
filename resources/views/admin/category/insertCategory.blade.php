@extends('admin.adminBase')
@section('title', 'Add Category')
@section('content')

        <div class="mx-auto w-full p-4 md:p-6 2xl:p-10">
            <!-- Breadcrumb Start -->
            <div class="mb-6 flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
                <h2 class="text-title-md2 font-bold text-black text-sm lg:text-xl ">
                    Categories Insertion Form /  <a wire:navigate href="{{ route('category.index') }}" class="font-medium hover:text-blue-500 text-xl" href="javascript:void(0)">Categories</a>

                </h2>

                
            </div>
            <!-- Breadcrumb End -->

            <!-- ====== Form Layout Section Start -->
            <div class="grid grid-cols-1 gap-9">
                <div class="flex flex-col gap-9">
                    <!-- Contact Form -->
                  <livewire:admin.insert-category/>
                </div>


            </div>
        </div>



@endsection
