@extends('public.layout')

@section('title')
    cart
@endsection

@section('content')
<livewire:public.cart-page :order="$order"/>
@endsection
