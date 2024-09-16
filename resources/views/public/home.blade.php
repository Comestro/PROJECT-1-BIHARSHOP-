@extends('public.layout')

@section('title')

home page

@endsection

@section('content')

<x-hero-section/>
<livewire:public.product.new-arrivals/>
<livewire:public.product.top-selling/>
<x-product-category/>


@endsection
