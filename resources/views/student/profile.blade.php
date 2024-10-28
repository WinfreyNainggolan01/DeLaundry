@extends('student.layout.main')

@section('head')
    <title>Profile | DeLaundry</title>
@endsection

@section('content')
<main class="pb-6">
    <section class="profile mx-auto max-w-5xl px-6 py-4">
        <h2 class="text-lg font-bold text-left mb-2">Welcome, {{ Auth::guard('student')->user()->name }}</h2>
        <p class="text-left text-gray-500 text-sm mb-2">{{ now()->format('D, d F Y') }}</p>
        <hr class="my-4 border-gray-300">
    </section>

    <div class="max-w-5xl mx-auto px-6">
        <div class="flex items-center mb-4">
            <img src="{{ asset('img/user.jpg') }}" class="h-20 w-20 rounded-full" alt="Profile Image">
            <div class="ml-4">
                <p class="text-lg font-medium">{{ Auth::guard('student')->user()->name}}</p>
                <p class="text-gray-500">iss22060@students.del.ac.id</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto px-6">
        <!-- User Information -->
        <div class="border border-gray-200 p-6 rounded-lg">
            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="name">Name</label>
                    <input type="text" value="{{ Auth::guard('student')->user()->name }}" disabled class="mt-1 block w-full bg-white rounded-md shadow-sm sm:text-sm px-3 py-2">
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="nim">NIM </label>
                    <input type="text" value="{{ Auth::guard('student')->user()->nim }}" disabled class="mt-1 block w-full bg-white rounded-md shadow-sm sm:text-sm px-3 py-2">
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="program-stud">Program Study</label>
                    <input type="text" value="Information System" disabled class="mt-1 block w-full bg-white rounded-md shadow-sm sm:text-sm px-3 py-2">
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="border border-gray-200 p-6 rounded-lg">
            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="mobile-phone">Mobile Phone</label>
                    <input type="text" value="{{ Auth::guard('student')->user()->phone_number }}" disabled class="mt-1 block w-full bg-white rounded-md shadow-sm sm:text-sm px-3 py-2">
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="gender">Gender</label>
                    <input type="text" value="{{ ucfirst( Auth::guard('student')->user()->gender )}}" disabled class="mt-1 block w-full bg-white rounded-md shadow-sm sm:text-sm px-3 py-2">
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="dormitory">Dormitory</label>
                    <input type="text" value="{{ Auth::guard('student')->user()->dormitory->name }}" disabled class="mt-1 block w-full bg-white rounded-md shadow-sm sm:text-sm px-3 py-2">
                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <button class="bg-sky-800 text-white px-4 py-2 rounded-md hover:bg-blue-700">Edit Profile</button>
            </div>
        </div>
    </div>
    
</main>


@endsection