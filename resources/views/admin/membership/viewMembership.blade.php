@extends('admin.adminBase')
@section('title', 'View Membership')
@section('content')

    <main>

        {{-- {{dd($member)}} --}}
        <livewire:admin.membership.view-membership :member="$member"/>

    </main>

@endsection
