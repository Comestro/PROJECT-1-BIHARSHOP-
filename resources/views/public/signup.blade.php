@extends('public.layout')

@section('title')
    Sigup page
@endsection

@section('content')
    <!-- Signup Page Container -->
    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-xl p-8 space-y-6 bg-white rounded-lg shadow-md">

            <!-- Logo -->
            <div class="flex justify-center">
                <img src="/logo.png" alt="E-commerce Logo" class="h-16 w-16">
            </div>

            <!-- Page Title -->
            <h2 class="text-center text-2xl font-bold text-gray-700">Create Your Account</h2>

            <!-- Form -->
            <form action="{{ route('public.register') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="flex justify-between">
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500"
                            placeholder="Enter your name" >
                            @error('name')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500"
                            placeholder="Enter your email" >
                            @error('email')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                    </div>
                </div>

                <div class="flex justify-between">
                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password"
                            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500"
                            placeholder="Enter your password" >
                            @error('password')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                    </div>

                    <!-- Confirm Password Field -->
                    <div>
                        <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm
                            Password</label>
                        <input type="password" id="confirm-password" name="password_confirmation"
                            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500"
                            placeholder="Confirm your password" >
                            @error('confirm-password')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                    </div>

                </div>
                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Sign
                        Up</button>
                </div>

                <!-- Divider -->
                <div class="flex items-center justify-center">
                    <span class="border-b w-full border-gray-300"></span>
                    <span class="px-3 text-sm text-gray-500">or</span>
                    <span class="border-b w-full border-gray-300"></span>
                </div>

                <!-- Social Signup Options -->
                <div class="space-y-3">
                    <button type="button"
                        class="w-full flex justify-center py-2 px-4 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-100">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path
                                d="M21.805 10.023h-9.982v3.974h6.537c-.285 1.47-1.242 2.718-2.566 3.554v2.89h4.148c2.422-2.22 3.814-5.487 3.814-9.277 0-.83-.075-1.64-.21-2.414z">
                            </path>
                            <path
                                d="M12 22.638c2.362 0 4.337-.763 5.784-2.068l-2.742-2.118c-.832.583-1.884.923-3.042.923-2.338 0-4.316-1.577-5.023-3.69H4.007v2.307c1.436 2.77 4.35 4.646 7.993 4.646z">
                            </path>
                            <path
                                d="M6.977 13.685c-.19-.58-.3-1.195-.3-1.835s.11-1.255.3-1.835V7.708H4.007C3.367 9.017 3 10.473 3 12s.367 2.983 1.007 4.292l2.97-2.607z">
                            </path>
                            <path
                                d="M12 5.368c1.304 0 2.47.448 3.389 1.321l2.542-2.542C16.335 2.496 14.36 1.362 12 1.362c-3.644 0-6.557 1.876-7.993 4.646l2.97 2.606C7.683 6.945 9.661 5.368 12 5.368z">
                            </path>
                        </svg>
                        Sign up with Google
                    </button>
                </div>

                <!-- Login Redirect -->
                <p class="text-center text-sm text-gray-500 mt-4">
                    Already have an account?
                    <a href="{{ route('public.login') }}" class="text-blue-500 hover:text-blue-700">Log in</a>
                </p>
            </form>
        </div>
    </div>
@endsection
