@extends('users.layout')
@section('title')
    Membership
@endsection
@section('content')
    <div class="flex flex-wrap  lg:flex-nowrap p-6">
        <livewire:user.user-sidebar />
        <div class="flex flex-1 h-auto sm:px-5">
              
            <livewire:user.member-edit/>
          
        </div>

    </div>
@endsection
