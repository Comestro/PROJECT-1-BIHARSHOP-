@extends('users.layout')
@section('title')
    Wishlist Page
@endsection

@section('content')
    <!-- Main Content Area -->
    <div class="flex flex-wrap lg:flex-nowrap p-6">

        <!-- Sidebar -->
        <livewire:user.user-sidebar/>
        <livewire:user.wish-list/>

        <!-- Main Content -->
    

    </div>
@endsection
