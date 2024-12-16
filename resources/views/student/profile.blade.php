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
            <!-- Display Profile Photo -->
<<<<<<< Updated upstream
            <img src="{{ asset('storage/' . (Auth::guard('student')->user()->photo ?? 'img/user.jpg')) }}" class="h-20 w-20 rounded-full" alt="Profile Image">
=======
            <img src="{{ url(Auth::guard('student')->user()->photo) }}" class="h-20 w-20 rounded-full" alt="Profile Image">
           
>>>>>>> Stashed changes
            <div class="ml-4">
                <p class="text-lg font-medium">{{ Auth::guard('student')->user()->name }}</p>
                <p class="text-gray-500">{{ Auth::guard('student')->user()->generateEmail(Auth::guard('student')->user()->nim) }}</p>
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
                    <label class="block text-gray-700 font-bold mb-2" for="nim">NIM</label>
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
                <!-- Button to Open Modal for Editing -->
                <button onclick="openEditModal()" class="bg-sky-800 text-white px-4 py-2 rounded-md hover:bg-blue-700">Edit Profile</button>
            </div>
        </div>
    </div>
</main>

<!-- Modal Edit Profile -->
<div id="editProfileModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-8 rounded-lg w-1/3">
        <h2 class="text-xl font-bold mb-4">Edit Profile</h2>
        <form method="POST" action="{{ route('edit.profile') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="dormitory_id" class="block text-gray-700 font-bold mb-2">Dormitory</label>
                <select id="dormitory_id" name="dormitory_id" class="w-full px-3 py-2 border rounded">
                    @foreach($dormitories as $dormitory)
                        @if($dormitory->gender == Auth::guard('student')->user()->gender)
                            <option value="{{ $dormitory->id }}" {{ $dormitory->id == Auth::guard('student')->user()->dormitory_id ? 'selected' : '' }}>{{ $dormitory->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="phone_number" class="block text-gray-700 font-bold mb-2">Mobile Phone</label>
                <input type="text" id="phone_number" name="phone_number" value="{{ Auth::guard('student')->user()->phone_number }}" class="w-full px-3 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="profile_photo" class="block text-gray-700 font-bold mb-2">Profile Photo</label>
<<<<<<< Updated upstream
                <input type="file" id="profile_photo" name="profile_photo" class="w-full px-3 py-2 border rounded">
=======
                <input type="file" accept="image/*" id="profile_photo" name="profile_photo" class="w-full px-3 py-2 border rounded">
>>>>>>> Stashed changes
            </div>
            <div class="mt-6 flex justify-end space-x-4">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 rounded-lg bg-gray-500 text-white">Cancel</button>
                <button type="submit" class="px-4 py-2 rounded-lg bg-sky-700 text-white">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Open the modal to edit profile
    function openEditModal() {
        document.getElementById('editProfileModal').classList.remove('hidden');
    }

    // Close the modal without saving
    function closeEditModal() {
        document.getElementById('editProfileModal').classList.add('hidden');
    }
</script>
@endsection
