<!-- resources/views/errors/500.blade.php -->
@extends('public.layout')

@section('title', '500 Internal Server Error')

@section('content')
    <div class="text-center p-6 bg-white shadow-lg rounded-lg">
        <div class="text-6xl font-extrabold text-red-600">
            500
        </div>
        <p class="mt-4 text-xl text-gray-700">
            Oops! Something went wrong on our end.
        </p>
        <p class="mt-2 text-lg text-gray-500">
            We are experiencing some technical difficulties. Our team has been notified and will look into it as soon as
            possible. Please try again later.
        </p>
        <a href="/"
            class="mt-6 inline-block text-white bg-blue-500 hover:bg-blue-600 py-2 px-4 rounded-lg transition duration-300">
            Go Back to Home
        </a>
    </div>
@endsection
