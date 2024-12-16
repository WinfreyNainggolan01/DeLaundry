@extends('admin.layout.main')

@section('head')
    <title>Profile | Admin - DeLaundry</title>
@endsection

@section('content')
<main>
    <body class="bg-gray-100 min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-4xl mx-auto mt-10">
            <h1 class="text-3xl font-bold mb-6 text-gray-800">Your Profile</h1>
            <div class="flex justify-center mb-6">
                @if (Auth::guard('admin')->user()->photo != null)
                    <img alt="Profile Photo" class="rounded-full w-32 h-32 object-cover" height="128" src="{{ url('storage/'. Auth::guard('admin')->user()->photo) }}" width="128"/>
                @else
                    <img alt="Profile Photo" class="rounded-full w-32 h-32 object-cover" height="128" src="{{ url('storage/default/default-profile.jpg') }}" width="128"/>
                @endif
                {{-- <img alt="Profile Photo" class="rounded-full w-32 h-32 object-cover" height="128" src="{{ asset('img/default-profile.jpg') }}" width="128"/> --}}
            </div>
            <div class="space-y-6">
                <div class="flex items-center">
                    <label class="w-1/4 text-gray-700">Admin ID</label>
                    <input class="w-3/4 mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" readonly type="text" value="{{ Auth::guard('admin')->user()->code_admin}}"/>
                </div>
                <div class="flex items-center">
                    <label class="w-1/4 text-gray-700">Name</label>
                    <input class="w-3/4 mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" readonly type="text" value="{{ Auth::guard('admin')->user()->name }}"/>
                </div>
                <div class="flex items-center">
                    <label class="w-1/4 text-gray-700">Gender</label>
                    <input class="w-3/4 mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" readonly type="text" value="{{ ucfirst( Auth::guard('admin')->user()->gender ) }}"/>
                </div>
                <div class="flex items-center">
                    <label class="w-1/4 text-gray-700">Phone Number</label>
                    <input class="w-3/4 mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" readonly type="text" value="{{ Auth::guard('admin')->user()->phone_number }}"/>
                </div>
            </div>
            <div class="flex justify-between mt-8">
                <a href="{{ route('admin_dashboard') }}" class="inline-block">
                    <button class="bg-gray-600 text-white px-6 py-2 rounded-md hover:bg-gray-700">Back</button>
                </a>
                <button onclick="openEditModal()" class="bg-sky-700 text-white px-6 py-2 rounded-md hover:bg-sky-900">Edit profile</button>
            </div>
        </div>
    </body> 
</main>

<!-- Modal Edit Profile -->
<div id="editProfileModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-10">
    <div class="bg-white p-8 rounded-lg w-1/3">
        <h2 class="text-xl font-bold mb-4">Edit Profile</h2>
        <form method="POST" action="{{ route('admin_editProfile') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                <input type="text" id="name" name="name" value="{{ Auth::guard('admin')->user()->name }}" class="w-full px-3 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="phone_number" class="block text-gray-700 font-bold mb-2">Mobile Phone</label>
                <input type="text" id="phone_number" name="phone_number" value="{{ Auth::guard('admin')->user()->phone_number }}" class="w-full px-3 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="photo" class="block text-gray-700 font-bold mb-2">Profile Photo</label>
                <input type="file" accept="image/*" id="photo" name="photo" class="w-full px-3 py-2 border rounded">
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