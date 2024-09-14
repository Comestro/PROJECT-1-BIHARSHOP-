@extends('admin.adminBase')
@section('title', 'Manage Products')
@section('content')


<main>
    <div class="">
        <!-- Breadcrumb Start -->
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            {{-- <h2 class="text-title-md2 font-bold text-black dark:text-gray">
                Manage Products
            </h2> --}}
            {{-- <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium" href="javascript:void(0)">Products /</a>
                    </li>
                    <li class="font-medium text-primary">Manage Products</li>
                </ol>
            </nav> --}}
        </div>
        <!-- Breadcrumb End -->

        <!-- ====== Table Section Start -->
       <livewire:admin.calling-product/>
        <!-- ====== Table Section End -->
    </div>
</main>

@endsection
