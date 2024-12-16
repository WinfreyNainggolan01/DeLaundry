@extends('admin.layout.main')

@section('head')
    <title>Profile | Admin - DeLaundry</title>
@endsection

@section('content')
<main>
    <body class="bg-gray-100 min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-4xl mx-auto mt-10">
            <h1 class="text-3xl font-bold mb-6 text-gray-800">
                Your Profile
            </h1>
            <div class="flex justify-center mb-6">
                <img alt="Profile picture showing various icons and text" class="rounded-full w-32 h-32 object-cover" height="128" src="https://storage.googleapis.com/a1aa/image/bVdQI1ZfCSy0DitAUhwrOgEVxuCYxBc3mv1MSZze6F8s7s1TA.jpg" width="128"/>
            </div>
            <div class="space-y-6">
                <div class="flex items-center">
                    <label class="w-1/4 text-gray-700">
                        Admin ID
                    </label>
                    <input class="w-3/4 mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" readonly type="text" value="ADL3425"/>
                </div>
                <div class="flex items-center">
                    <label class="w-1/4 text-gray-700">
                        Name
                    </label>
                    <input class="w-3/4 mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" value="John Doe"/>
                </div>
                <div class="flex items-center">
                    <label class="w-1/4 text-gray-700">
                        Email
                    </label>
                    <input class="w-3/4 mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="email" value="johndoe@example.com"/>
                </div>
                <div class="flex items-center">
                    <label class="w-1/4 text-gray-700">
                        Phone
                    </label>
                    <input class="w-3/4 mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="tel" value="123-456-7890"/>
                </div>
            </div>
            <div class="flex justify-end mt-8">
                <button class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">
                    Save Changes
                </button>
            </div>
        </div>
    </body>
</main>

@endsection