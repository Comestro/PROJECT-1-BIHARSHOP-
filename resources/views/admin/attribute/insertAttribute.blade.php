@extends('admin.adminBase')

@section('title', 'Manage Attribute')

@section('content')
<div class="flex flex-col w-full">
    <div class="container mx-auto p-6 relative flex gap-10 ">    
        <livewire:admin.product.insert-attribute/>
        <livewire:admin.product.insert-attribute-value/>

    </div>
    <div class="container mx-auto p-6 relative">    
        <livewire:admin.product.calling-attribute-value/>
    </div>
</div>
@endsection
