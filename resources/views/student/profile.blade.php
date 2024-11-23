@extends('student.layout.main')

@section('head')
    <title>Profile | DeLaundry</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection

@section('content')
<main class="pb-6">
    <section class="profile mx-auto max-w-5xl px-6 py-4">
        <h2 id="welcome" class="text-lg font-bold text-left mb-2"></h2>
        <p class="text-left text-gray-500 text-sm mb-2">{{ now()->format('D, d F Y') }}</p>
        <hr class="my-4 border-gray-300">
    </section>

    <div class="max-w-5xl mx-auto px-6">
        <div class="flex items-center mb-4">
            <img src="{{ asset('img/user.jpg') }}" class="h-20 w-20 rounded-full" alt="Profile Image">
            <div class="ml-4">
                <p id="name" class="text-lg font-medium"></p>
                <p id="email" class="text-gray-500"></p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto px-6">
        <!-- User Information -->
        <div class="border border-gray-200 p-6 rounded-lg">
            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="name">Name</label>
                    <input id="user-name" type="text" disabled class="mt-1 block w-full bg-white rounded-md shadow-sm sm:text-sm px-3 py-2">
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="nim">NIM </label>
                    <input id="nim" type="text" disabled class="mt-1 block w-full bg-white rounded-md shadow-sm sm:text-sm px-3 py-2">
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="program-study">Program Study</label>
                    <input id="program-study" type="text" disabled class="mt-1 block w-full bg-white rounded-md shadow-sm sm:text-sm px-3 py-2">
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="border border-gray-200 p-6 rounded-lg">
            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="phone">Mobile Phone</label>
                    <input id="phone" type="text" disabled class="mt-1 block w-full bg-white rounded-md shadow-sm sm:text-sm px-3 py-2">
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="gender">Gender</label>
                    <input id="gender" type="text" disabled class="mt-1 block w-full bg-white rounded-md shadow-sm sm:text-sm px-3 py-2">
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="dormitory">Dormitory</label>
                    <input id="dormitory" type="text" disabled class="mt-1 block w-full bg-white rounded-md shadow-sm sm:text-sm px-3 py-2">
                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <button id="edit-profile-btn" class="bg-sky-800 text-white px-4 py-2 rounded-md hover:bg-blue-700">Edit Profile</button>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const token = localStorage.getItem('auth_token'); // Simpan token saat login
        if (!token) {
            alert('You are not logged in!');
            window.location.href = '/login';
        }

        axios.get('/api/profile', {
            headers: {
                'Authorization': `Bearer ${token}`
            }
        })
        .then(response => {
            const data = response.data;
            document.getElementById('welcome').textContent = `Welcome, ${data.name}`;
            document.getElementById('name').textContent = data.name;
            document.getElementById('email').textContent = data.email;
            document.getElementById('user-name').value = data.name;
            document.getElementById('nim').value = data.nim;
            document.getElementById('program-study').value = data.program_study;
            document.getElementById('phone').value = data.phone_number;
            document.getElementById('gender').value = data.gender;
            document.getElementById('dormitory').value = data.dormitory_name || 'N/A';
        })
        .catch(error => {
            console.error(error);
            alert('Failed to fetch profile data. Please login again.');
            localStorage.removeItem('auth_token');
            window.location.href = '/login';
        });
    });
</script>
@endsection
