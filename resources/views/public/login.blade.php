@extends('public.layout')

@section('title')
    Login Page
@endsection

@section('content')
    <div class="font-[sans-serif]">
        <div class="h-[90%] flex flex-col items-center justify-center md:px-[15%]">
            <div class="grid md:grid-cols-2 items-center gap-4 max-md:gap-8 max-w-6xl max-md:max-w-lg w-full p-4 m-4">
                <div class="md:h-full bg-[#000842] rounded-xl lg:p-12 p-8 flex items-center justify-center">
                    <img src="https://readymadeui.com/signin-image.webp" class="md:w-full w-[50%] md:h-full h-[50%] object-contain" alt="login-image" />
                </div>
                <div class="md:max-w-md w-full px-4 py-4">
                    @if ($errors->any())
                        <div class="mb-4 text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <h3 class="text-gray-800 text-3xl font-extrabold">Sign in</h3>
                            <p class="text-sm mt-4 text-gray-800">
                                Don't have an account? <a href="{{ route('signup') }}" class="text-blue-600 font-semibold hover:underline ml-1 whitespace-nowrap">Register here?</a>
                                <a href="{{ route('membership.signup') }}" class="text-blue-600 font-semibold hover:underline ml-1 whitespace-nowrap">Join as Member?</a>
                            </p>
                        </div>

                        <div>
                            <!-- Social Login Options -->
                            <div class="space-y-3 mt-4">
                                <a href="{{ route('google.login') }}" class="w-full flex items-center justify-center py-2.5 px-4 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-100">
                                    <img src="/google-logo.png" alt="Google logo" class="h-6 w-6 mr-1">
                                    Continue with Google
                                </a>
                            </div>
                            <!-- Divider -->
                            <div class="flex items-center justify-center mt-4 mb-4">
                                <span class="border-b w-full border-gray-300"></span>
                                <span class="px-3 text-sm text-gray-500">or</span>
                                <span class="border-b w-full border-gray-300"></span>
                            </div>
                            <div class="flex items-center">
                                <input name="email" type="email" required class="w-full rounded-md text-gray-800 text-sm border-b border-gray-300 focus:border-blue-600 px-2 py-3 outline-none hover:shadow-lg transition-all duration-200 ease-in-out" placeholder="Enter email" />                                
                            </div>
                        </div>

                        <div class="mt-8">
                            <div class="flex items-center">
                                <input name="password" type="password" required class="w-full rounded-md text-gray-800 text-sm border-b border-gray-300 focus:border-blue-600 px-2 py-3 outline-none hover:shadow-lg transition-all duration-200 ease-in-out" placeholder="Enter password" />
                              
                            </div>
                        </div>

                        <div class="flex flex-wrap items-center justify-between gap-4 mt-6">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                                <label for="remember-me" class="ml-3 block text-sm text-gray-800">Remember me</label>
                            </div>
                            <div>
                                <a href="javascript:void(0);" class="text-blue-600 font-semibold text-sm hover:underline">Forgot Password?</a>
                            </div>
                        </div>

                        <div class="mt-5">
                            <button type="submit" class="w-full shadow-xl py-2.5 px-4 text-sm tracking-wide rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                                Sign in
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
