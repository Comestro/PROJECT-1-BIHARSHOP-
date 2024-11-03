@extends('users.layout')
@section('title')
    Address Page
@endsection
@section('content')
    <div class="flex flex-wrap  lg:flex-nowrap p-6">

        <div class="flex flex-1 h-auto sm:px-5">

            <livewire:user.address/>

        </div>

    </div>
@endsection
