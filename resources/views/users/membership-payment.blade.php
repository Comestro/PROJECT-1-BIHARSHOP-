@extends('users.layout')
@section('title')
    Membership Payment
@endsection
@section('content')
    <div class="flex flex-wrap  lg:flex-nowrap md:p-6 p-2">
        <livewire:user.membership-payment :token="$data" />
    </div>
@endsection
