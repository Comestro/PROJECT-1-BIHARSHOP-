@extends('public.layout')

@section('404 Not Found')
    Not found 404 error
@endsection

@section('content')
    <div class="flex flex-col justify-center items-center h-screen">
        <h1 class="text-6xl font-bold text-red-500">404</h1>
        <p class="text-lg text-gray-600 mt-4">Sorry, the page you are looking for does not exist.</p>
        <a href="/"
            class="mt-6 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-200">
            Go Back to Home
        </a>
    </div>
@endsection
