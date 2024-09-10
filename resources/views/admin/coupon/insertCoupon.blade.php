@extends('admin.adminBase')

@section('title', 'Create Coupon')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Create New Coupon</h1>

    <!-- Coupon Creation Form -->
    <livewire:admin.create-coupon/>
</div>
@endsection
