@extends('public.layout')

@section('title')
    Filter Page
@endsection

@section('content')
        <!-- Sidebar Filters -->
        <livewire:public.filter.product-filters :category="$category"/>
        <!-- Product Grid -->
@endsection
