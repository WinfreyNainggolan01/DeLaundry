<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <title>Profil</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
</head>

<body class="h-full">

<div class="min-h-full">
    <!-- Navbar Section -->
    <nav class="bg-white" x-data="{ isOpen: false }">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <img class="h-12 w-12" src="{{ asset('img/Logo-DeLaundry.png') }}" alt="DeLaundry Logo">
            </div>
            <h1 class="text-dark-blue text-xl font-bold ml-3">DeLaundry</h1>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <a href="/" class="{{ request()->is('/') ? "bg-gray-200 text-black" : "text-gray-300 hover:bg-gray-700 hover:text-white"}} rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
                <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:text-sky-500">Order</a>
                <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:text-sky-500">Payment</a>
                <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:text-sky-500">Complaint</a>
              </div>
            </div>
          </div>
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
              <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 focus:outline-none focus:ring-2 hover:text-sky-500 focus:ring-sky-300 focus:ring-offset-2 focus:ring-offset-gray-800">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">View notifications</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>
              </button>
  
              <!-- Profile dropdown -->
              <div class="relative ml-3">
                <div>
                  <button type="button" @click="isOpen = !isOpen" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 hover:text-sky-500 focus:ring-sky-300 focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">Open user menu</span>
                    <svg class="w-8 h-8 text-gray-800 dark:text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                      </svg>
                  </button>
                </div>

                <div x-show="isOpen"
                x-transition:enter="transition ease-out duration-100 transform"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75 transform"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                  <a href="/profile" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  
    <header class="bg-dark-blue shadow">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-100">PROFIL</h1>
      </div>
    </header>

    <!-- Main content -->
    <main>
      <section class="profile mx-auto max-w-5xl p-4">
          <h2 class="text-xl font-bold text-center mb-4">Welcome, Jaka</h2>
          <p class="text-center text-gray-500 mb-4">Tue, 07 June 2022</p>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- User Information -->
            <div class="border border-gray-200 p-6 rounded-lg bg-white">
              <div class="flex items-center mb-4">
                <img src="{{ asset('img/user-avatar.png') }}" class="h-20 w-20 rounded-full" alt="Profile Image">
                <div class="ml-4">
                  <p class="text-lg font-medium">Jaka Sembung</p>
                  <p class="text-gray-500">iss22060@students.del.ac.id</p>
                </div>
              </div>
              <div class="space-y-4">
                <div>
                  <label class="text-sm font-medium">NIM</label>
                  <input type="text" value="12S25060" disabled class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                </div>
                <div>
                  <label class="text-sm font-medium">Program Study</label>
                  <input type="text" value="Information System" disabled class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                </div>
                <div>
                  <label class="text-sm font-medium">Status</label>
                  <input type="text" value="Student" disabled class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                </div>
              </div>
            </div>

            <!-- Contact Information -->
            <div class="border border-gray-200 p-6 rounded-lg bg-white">
              <div class="space-y-4">
                <div>
                  <label class="text-sm font-medium">Mobile Phone</label>
                  <input type="text" value="081234567890" disabled class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                </div>
                <div>
                  <label class="text-sm font-medium">Gender</label>
                  <input type="text" value="Male" disabled class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                </div>
                <div>
                  <label class="text-sm font-medium">Dormitory</label>
                  <input type="text" value="Jati" disabled class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                </div>
              </div>
              <div class="mt-6">
                <button class="bg-dark-blue text-white px-4 py-2 rounded-md">Edit Profile</button>
              </div>
            </div>
          </div>
      </section>
    </main>
  </div>
</body>

</html>
