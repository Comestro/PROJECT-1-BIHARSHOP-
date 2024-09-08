@extends('public.layout')

@section('title')

home page

@endsection

@section('content')

<x-new-arrivals/>
<x-top-selling/>
<x-product-category/>

@endsection