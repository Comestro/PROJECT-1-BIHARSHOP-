@extends('users.layout')

@section('title')
    My Order Page
@endsection

@section('content')
    <div class="p-6">
        <!-- Home Navigation -->
        <livewire:order.my-order/>
    </div>

    <!-- Filter Sidebar Script -->
    <script>
        const filterButton = document.getElementById('filterButton');
        const filterSidebar = document.getElementById('filterSidebar');

        filterButton.addEventListener('click', function() {
            filterSidebar.classList.toggle('hidden');
        });
    </script>
@endsection
