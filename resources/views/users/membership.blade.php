@extends('users.layout')
@section('title')
    Membership
@endsection
@section('content')
    <div class="flex flex-wrap  lg:flex-nowrap p-2">

        <div class="flex flex-1 h-auto sm:px-2">

            <livewire:user.membership/>

        </div>

    </div>
Become a Member
@endsection
@section('content')

<div class="bg-gray-50 p-10 min-h-screen">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-lg">
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8 underline">Become a Member</h2>
        <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="col-span-2">
                <label for="fullname" class="block text-gray-600 font-medium mb-2">Full Name</label>
                <input type="text" id="fullname" class="w-full border border-gray-300 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-black" placeholder="Enter your full name" required>
            </div>

            <div>
                <label for="dob" class="block text-gray-600 font-medium mb-2">Date of Birth</label>
                <input type="date" id="dob" class="w-full border border-gray-300 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-black" required>
            </div>

            <div>
                <label for="gender" class="block text-gray-600 font-medium mb-2">Gender</label>
                <select id="gender" class="w-full border border-gray-300 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-black" required>
                    <option value="" disabled selected>Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div>
                <label for="nationality" class="block text-gray-600 font-medium mb-2">Nationality</label>
                <select id="nationality" class="w-full border border-gray-300 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-black" required>
                    <option value="" disabled selected>Select your nationality</option>
                    <option value="indian">Indian</option>
                    <option value="nri">NRI</option>
                    <option value="others">Others (specify)</option>
                </select>
            </div>

            <div>
                <label for="marital-status" class="block text-gray-600 font-medium mb-2">Marital Status</label>
                <select id="marital-status" class="w-full border border-gray-300 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-black" required>
                    <option value="" disabled selected>Select your marital status</option>
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="divorced">Divorced</option>
                </select>
            </div>

            <div class="col-span-2">
                <label for="religion" class="block text-gray-600 font-medium mb-2">Religion</label>
                <input type="text" id="religion" class="w-full border border-gray-300 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-black" placeholder="Enter your religion" required>
            </div>

            <div class="col-span-2">
                <button type="submit" class="w-full bg-black text-white font-semibold py-3 rounded-xl  focus:outline-none focus:ring-2 focus:ring-offset-2">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection
