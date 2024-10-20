@extends('student.layout.main')

@section('head')
    <title>Profile | DeLaundry</title>
@endsection

@section('content')
    <main>
    <section class="profile mx-auto max-w-5xl p-4">
        <h2 class="text-lg font-bold text-left mb-2">Welcome, Jaka</h2>
        <p class="text-left text-gray-500 text-sm mb-2">Tue, 07 June 2022</p>
        <hr class="my-4 border-gray-300">
    </section>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- User Information -->
        <div class="border border-gray-200 p-6 rounded-lg">
            <div class="flex items-center mb-4">
                <img src="{{ asset('img/user.jpg') }}" class="h-20 w-20 rounded-full" alt="Profile Image">
                <div class="ml-4">
                    <p class="text-lg font-medium">Jaka Sembung</p>
                    <p class="text-gray-500">iss22060@students.del.ac.id</p>
                </div>
            </div>
            <div class="space-y-4">
                <div>
                    <label class="text-sm font-medium">Name</label>
                    <input type="text" value="Jaka Sembung" disabled class="mt-1 block w-1/2 bg-white rounded-md shadow-sm sm:text-sm">
                </div>
                <div>
                    <label class="text-sm font-medium">NIM</label>
                    <input type="text" value="12S25060" disabled class="mt-1 block w-1/2 bg-white rounded-md shadow-sm sm:text-sm">
                </div>
                <div>
                    <label class="text-sm font-medium">Program Study</label>
                    <input type="text" value="Information System" disabled class="mt-1 block w-1/2 bg-white rounded-md shadow-sm sm:text-sm">
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="border border-gray-200 p-6 rounded-lg">
            <div class="space-y-4" style="margin-top: 97px;"> 
                <div>
                    <label class="text-sm font-medium">Mobile Phone</label>
                    <input type="text" value="081234567890" disabled class="mt-1 block w-1/2 bg-white rounded-md shadow-sm sm:text-sm">
                </div>
            <div>
                <label class="text-sm font-medium">Gender</label>
                <input type="text" value="Male" disabled class="mt-1 block w-1/2 bg-white rounded-md shadow-sm sm:text-sm">
            </div>
                <div>
                    <label class="text-sm font-medium">Dormitory</label>
                    <input type="text" value="Jati" disabled class="mt-1 block w-1/2 bg-white rounded-md shadow-sm sm:text-sm">
                </div>
            </div>
            <div class="mt-10">
            <button class="bg-dark-blue text-white px-2 py-1 rounded-md">Edit Profile</button>
            </div>
        </div>
    </div>
    </main>
@endsection