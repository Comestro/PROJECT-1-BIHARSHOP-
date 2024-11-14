@extends('public.layout')

@section('title', '505 HTTP Version Not Supported')


@section('content')
    <div class="text-center p-6 bg-white shadow-lg rounded-lg">
        <div class="text-6xl font-extrabold text-red-600">
            505
        </div>
        <p class="mt-4 text-xl text-gray-700">
            HTTP Version Not Supported
        </p>
        <p class="mt-2 text-lg text-gray-500">
            Sorry, the server does not support the HTTP protocol version used in the request.
        </p>
        <a href="/"
            class="mt-6 inline-block text-white bg-blue-500 hover:bg-blue-600 py-2 px-4 rounded-lg transition duration-300">
            Go Back to Home
        </a>
    </div>
@endsection
