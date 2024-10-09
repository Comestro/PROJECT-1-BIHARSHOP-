@extends('admin.adminBase')
@section('title', 'View Membership')
@section('content')

<main>

    <livewire:admin.membership.view-membership :id="$member"/>


</main>

@endsection
