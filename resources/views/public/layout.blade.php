<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') {{env('APP_NAME')}}</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css"  rel="stylesheet" />
    @vite('resources/css/app.css')
    @livewireStyles


    <style>
        @keyframes pop-up {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .animate-pop-up {
            animation: pop-up 0.5s ease-out forwards;
        }

        @keyframes slide-in-up {
            0% {
                transform: translateY(50%);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-slide-in-up {
            animation: slide-in-up 0.8s ease-out forwards;
        }
    </style>

</head>
<body >

<livewire:public.public-header/>
<br>
<br>
<br>
    @section('content')

    @show
    <livewire:public.footer-bar/>
    <x-footer/>


@livewireScripts
</body>
</html>
