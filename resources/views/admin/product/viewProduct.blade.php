@extends('admin.adminBase')

@section('title', 'Manage Products')

@section('content')
<main>
    <div class="max-w-7xl mx-auto p-6 w-full">
        <h2 class="text-2xl font-bold mb-6">View Products</h2>
        <livewire:admin.view-product :slug="$slug"/>
    </div>
</main>
@endsection
