@extends('public.layout')

@section('title')
    Membership Signup Page
@endsection

@section('content')
    <!-- Signup Page Container -->
    <div class="flex justify-center items-center min-h-screen ">
        <div
            class="w-full max-w-lg p-10 bg-white rounded-3xl shadow-lg transform transition-transform duration-500 mt-5 mb-5">

            <!-- Logo -->
            <div class="flex justify-center mb-8">
                <img src="/logo.png" alt="E-commerce Logo" class="h-20 w-20">
            </div>

            <!-- Page Title -->
            <h2 class="text-center text-3xl font-extrabold text-gray-900 mb-2">
                Create Membership Account
            </h2>

            <!-- Form -->
            <form action="{{ route('membership.register') }}" method="POST" class="space-y-6 mt-4">
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2 sm:col-span-1">
                        <label for="name" class="block text-sm font-semibold text-gray-700">Full Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            class="w-full mt-2 px-5 py-3 border border-gray-300 rounded-2xl focus:outline-none focus:ring-2 focus:ring-purple-400 transition duration-300"
                            placeholder="Roni Saha">
                        @error('name')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="email" class="block text-sm font-semibold text-gray-700">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="w-full mt-2 px-5 py-3 border border-gray-300 rounded-2xl focus:outline-none focus:ring-2 focus:ring-purple-400 transition duration-300"
                            placeholder="comestro@domain.com">
                        @error('email')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="mobile" class="block text-sm font-semibold text-gray-700">Mobile No.</label>
                        <input type="tel" id="mobile" name="mobile" value="{{ old('mobile') }}"
                            class="w-full mt-2 px-5 py-3 border border-gray-300 rounded-2xl focus:outline-none focus:ring-2 focus:ring-purple-400 transition duration-300"
                            placeholder="e.g 9546805580">
                        @error('mobile')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>

                <!-- Password Fields -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2 sm:col-span-1">
                        <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                        <input type="password" id="password" name="password"
                            class="w-full mt-2 px-5 py-3 border border-gray-300 rounded-2xl focus:outline-none focus:ring-2 focus:ring-purple-400 transition duration-300"
                            placeholder="••••••••">
                        @error('password')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="confirm-password" class="block text-sm font-semibold text-gray-700">Confirm
                            Password</label>
                        <input type="password" id="confirm-password" name="password_confirmation"
                            class="w-full mt-2 px-5 py-3 border border-gray-300 rounded-2xl focus:outline-none focus:ring-2 focus:ring-purple-400 transition duration-300"
                            placeholder="••••••••">
                        @error('confirm-password')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full py-3 px-4 bg-black text-white font-semibold rounded-2xl shadow-lg hover:shadow-lg transition-transform duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-400">
                        Proceed Now
                    </button>
                </div>

                <!-- Login Redirect -->
                <p class="text-center text-sm text-gray-600 mt-6">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-purple-500 hover:text-purple-700">Log in</a>
                </p>
            </form>
        </div>
    </div>
@endsection
