@extends('users.layout')
@section('title')
    Membership
@endsection
@section('content')
    <div class="flex flex-wrap  lg:flex-nowrap md:p-6 p-2">
        <div class="flex flex-1 h-auto sm:px-2">

            <livewire:user.member-edit/>

        </div>

    </div>
@endsection
