@extends('admin.adminBase')
@section('title', 'Edit Membership')
@section('content')

<main>

    <livewire:admin.membership.edit-membership :member="$member"/>


</main>

@endsection
