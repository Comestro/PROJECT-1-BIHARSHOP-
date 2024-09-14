@extends('admin.adminBase')

@section('title', 'Create Coupon')

@section('content')
<div class="container mx-auto p-6 relative ">
    <h1 class="text-2xl font-bold mb-4">Create New Coupon / <a wire:navigate href="{{ route('coupon.index') }}" class="font-medium hover:text-blue-500 " href="javascript:void(0)">view Coupon</a></h1>
   
    <!-- Coupon Creation Form -->
    <livewire:admin.create-coupon/>
</div>
@endsection
