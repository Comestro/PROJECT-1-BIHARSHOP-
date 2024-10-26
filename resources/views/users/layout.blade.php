<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') {{ env('APP_NAME') }}</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100" x-data="{ sidebarOpen: false }">





 <aside id="default-sidebar" :class="{ '-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen }"  class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <livewire:user.user-sidebar />
    </div>
 </aside>

 <div class="sm:ml-64" >
    <livewire:user.user-header />

    @section('content')
    @show


 </div>


</body>

</html>
