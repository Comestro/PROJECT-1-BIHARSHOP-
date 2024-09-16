@extends('public.layout')

@section('title')
    checkout
@endsection


@section('content')
<livewire:public.checkout.checkout :order="$order" />
@endsection
