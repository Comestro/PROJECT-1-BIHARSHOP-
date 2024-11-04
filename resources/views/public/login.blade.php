@extends('public.layout')

@section('title')
    Login Page
@endsection

@section('content')
    <div class="font-[sans-serif] min-h-screen flex items-center justify-center bg-gray-100">
        <div class="flex flex-col items-center justify-center px-4 md:px-[10%] lg:px-[15%] w-full">
            <div class="grid md:grid-cols-2 items-center gap-4 max-md:gap-8 max-w-6xl max-md:max-w-lg w-full bg-white rounded-lg  p-6 md:p-8">
                
                <!-- Left Section: Image -->
                <div class="hidden md:flex md:h-full bg-[#000842] rounded-lg p-8 items-center justify-center">
                    <img src="https://readymadeui.com/signin-image.webp" class="w-full h-auto object-contain" alt="login-image" />
                </div>
                
                <!-- Right Section: Form -->
                <div class="w-full max-md:px-4 py-4">
                    <form action="{{ route('login') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="mb-4">
                            <h3 class="text-gray-800 text-2xl md:text-3xl font-bold">Sign in</h3>
                            <p class="text-sm mt-2 text-gray-800">
                                Don't have an account? 
                                <a href="{{ route('signup') }}" class="text-blue-600 font-semibold hover:underline">Register here</a> 
                                or <a href="{{ route('membership.signup') }}" class="text-blue-600 font-semibold hover:underline">Join as Member</a>
                            </p>
                        </div>

                        <!-- Social Login Button -->
                        <a href="{{ route('google.login') }}" class="w-full flex items-center justify-center py-2.5 px-4 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-100 transition">
                            <img src="/google-logo.png" alt="" class="h-6 w-6 mr-1">
                            Continue with Google
                        </a>

                        <!-- Divider -->
                        <div class="flex items-center justify-center mt-4">
                            <span class="border-b w-full border-gray-300"></span>
                            <span class="px-3 text-sm text-gray-500">or</span>
                            <span class="border-b w-full border-gray-300"></span>
                        </div>

                        <!-- Email Input -->
                        <div class="relative">
                            <input name="email" type="email" required
                                class="w-full rounded-md text-gray-800 text-sm border-b border-gray-300 focus:border-blue-600 px-2 py-3 outline-none hover:shadow-md transition duration-200"
                                placeholder="Enter email" />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-2 top-1/2 transform -translate-y-1/2" viewBox="0 0 682.667 682.667">
                                <!-- SVG icon path -->
                            </svg>
                        </div>

                        <!-- Password Input -->
                        <div class="relative">
                            <input name="password" type="password" required
                                class="w-full rounded-md text-gray-800 text-sm border-b border-gray-300 focus:border-blue-600 px-2 py-3 outline-none hover:shadow-md transition duration-200"
                                placeholder="Enter password" />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-2 top-1/2 transform -translate-y-1/2 cursor-pointer" viewBox="0 0 128 128">
                                <!-- SVG icon path -->
                            </svg>
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex flex-wrap items-center justify-between mt-4">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox"
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                                <label for="remember-me" class="ml-2 block text-sm text-gray-800">
                                    Remember me
                                </label>
                            </div>
                            <a href="javascript:void(0);" class="text-blue-600 font-semibold text-sm hover:underline">
                                Forgot Password?
                            </a>
                        </div>

                        <!-- Sign In Button -->
                        <button type="submit"
                            class="w-full py-3 rounded-md text-white bg-blue-600 hover:bg-blue-700 transition text-sm font-semibold shadow-lg focus:outline-none">
                            Sign in
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
