@extends('users.layout')
@section('title')
    Membership Payment
@endsection
@section('content')
<div class="flex flex-wrap  lg:flex-nowrap p-6">

    <livewire:user.membership-scanner :token="$data" />
</div>


@endsection
