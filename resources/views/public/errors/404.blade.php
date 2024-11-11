@extends('public.layout')

@section('content')
    <div class="flex flex-col justify-center items-center h-screen bg-gray-100 text-center">
        <!-- Sad Emoji with Animation -->
        <h1 class="text-8xl font-bold text-red-500 animate-bounce">😞</h1>

        <p class="text-6xl font-bold text-gray-800 mt-4 animate-fade-in">Page Not Found</p>

        <p class="text-lg text-gray-600 mt-4 animate-fade-in">Oops! Looks like the page you're trying to find doesn't exist.
        </p>

        <a href="/"
            class="mt-6 inline-block bg-blue-500 text-white py-3 px-6 rounded-lg hover:bg-blue-600 transition-all duration-300 ease-in-out transform hover:scale-105">
            Go Back to Home
        </a>
    </div>

    <style>
        @keyframes fade-in {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .animate-fade-in {
            animation: fade-in 1s ease-in-out;
        }
    </style>
@endsection
