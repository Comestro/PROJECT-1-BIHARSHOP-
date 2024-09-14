@extends('admin.adminBase')

@section('title', 'Manage Attribute')

@section('content')
<div class="flex flex-col w-full">
    <div class="p-4">
        <h1 class="text-2xl font-bold mb-4 ml-5 relative">
            Attribute Management
            <span class="absolute left-0 bottom-[-3px] w-24 h-0.5 bg-blue-500"></span>
        </h1>
    </div>
    <div class="container mx-auto p-6 relative flex gap-10 ">    
        <livewire:admin.product.insert-attribute/>
        <livewire:admin.product.insert-attribute-value/>

    </div>
    <div class="container mx-auto p-6 relative">    
        <livewire:admin.product.calling-attribute-value/>
    </div>
</div>
@endsection
