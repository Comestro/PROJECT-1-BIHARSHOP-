<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bihar shop | Admin - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="favicon.ico">
    @livewireStyles
    {{-- floabite linkin css --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css"  rel="stylesheet" />


</head>

<body x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark text-bodydark bg-boxdark-2': darkMode === true }">

    <!-- ===== Preloader End ===== -->

    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen">
        <!-- ===== Sidebar Start ===== -->
        @include('admin.includes.sidebar')
        <!-- ===== Header Start ===== -->
        <div class="sm:ml-64 flex-1">
            @include('admin.includes.adminHeader')
            <div class="p-4 overflow-y-scroll">
                @yield('content')
                    @show
        </div>
    </div>



</div>
<!-- ===== Sidebar End ===== -->
</div>
<!-- ===== Page Wrapper End ===== -->
@livewireScripts


{{-- floabite js linking --}}
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

</body>

</html>
