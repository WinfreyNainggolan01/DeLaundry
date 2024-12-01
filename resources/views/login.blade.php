<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title> 
    <link
      rel="shortcut icon"
      href="{{ asset('img/Logo-DeLaundry.png') }}"
      type="image/x-icon"
    />
</head>
<body class="bg-dark-blue">
    <div class="flex min-h-screen items-center justify-center px-6 py-12 lg:px-8">
        <div class="font-inter grid grid-cols-1 lg:grid-cols-2 gap-16 items-center lg:px-20">
            <!-- Left Section: Image and Text -->
            <div class="relative text-white">
                <img class="absolute inset-0 bg-no-repeat bg-cover bg-center opacity-20 scale-110 -my-24" src="{{ asset('img/well-done-baloon.png') }}" alt="balloon">
                <div class="relative z-10">
                    <h1 class="text-sm font-semibold uppercase tracking-wide text-teal-300">Best Laundry</h1>
                    <h2 class="mt-4 text-4xl font-bold">Your Trusted Professional Laundry Service</h2>
                    <p class="mt-6 text-lg">We provide high-quality laundry services with convenience and reliability. Please log in to get started.</p>
                </div>
            </div>

            <!-- Right Section: Login Form -->
            <div class="w-full max-w-md bg-white p-8 shadow-lg rounded-lg">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <img class="mx-auto h-12 w-auto" src="{{ asset('img/Logo-DeLaundry.png') }}" alt="Logo DeLaundry">
                    <h2 class="mt-6 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Account Login</h2>
                </div>

                <!-- Success message -->
                @if(session()->has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-6" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <!-- Error message -->
                @if(session()->has('loginError'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-6" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('loginError') }}</span>
                    </div>
                @endif

                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="/login" method="POST">
                        @csrf
                        <div>
                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                            <div class="mt-2">
                                <input id="username" name="username" type="text" autocomplete="username" class="block w-full rounded-md border-0 py-1.5  text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-800 sm:text-sm sm:leading-6 p-3 
                                @error('username') border-red-500 @enderror" autofocus required>
                            </div>
                            @error('username')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    
                        <div>
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            <div class="mt-2">
                                <input id="password" name="password" type="password" autocomplete="current-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-800 sm:text-sm sm:leading-6 p-3" required>
                            </div>
                        </div>
                    
                        <div>
                            <button type="submit" class="flex w-full justify-center rounded-md bg-dark-blue px-3 py-2 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
