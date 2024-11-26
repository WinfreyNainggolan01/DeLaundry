<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!--=============== FAVICON ===============-->
    <link
    rel="shortcut icon"
    href="{{ asset('img/Logo-DeLaundry.png') }}"
    type="image/x-icon"
    />
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')

    @yield('head')
</head>


<body class="h-full">
<div class="min-h-full">
    <!-- Navbar Section -->
    <nav class="bg-white" x-data="{ isOpen: false }">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <a href="" class="flex items-center">
              <div class="flex-shrink-0">
                <img class="h-12 w-12" src="{{ asset('img/Logo-DeLaundry.png') }}" alt="DeLaundry Logo">
              </div>
              <h1 class="text-dark-blue text-xl font-bold ml-3">DeLaundry</h1>
            </a>
            <div class="hidden md:block">
              <div class="flex items-baseline space-x-4 ml-10">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <nav class="flex space-x-4">
                  <a href="{{ route('homepage') }}" 
                     class="{{ request()->routeIs('homepage') ? 'bg-gray-200 text-black' : 'text-black hover:bg-gray-300 hover:text-sky-700' }} rounded-md px-3 py-2 text-sm font-semibold" 
                     aria-current="page">Home</a>
              
                  <a href="{{ route('order') }}" 
                     class="{{ request()->routeIs('order') ? 'bg-gray-200 text-black' : 'text-black hover:bg-gray-300 hover:text-sky-700' }} rounded-md px-3 py-2 text-sm font-semibold">Order</a>
              
                  <a href="{{ route('finance') }}" 
                     class="{{ request()->routeIs('finance') ? 'bg-gray-200 text-black' : 'text-black hover:bg-gray-300 hover:text-sky-700' }} rounded-md px-3 py-2 text-sm font-semibold">Finance</a>
              
                  <a href="{{ route('complaint') }}" 
                     class="{{ request()->routeIs('complaint') ? 'bg-gray-200 text-black' : 'text-black hover:bg-gray-300 hover:text-sky-700' }} rounded-md px-3 py-2 text-sm font-semibold">Complaint</a>
              
                  <a href="{{ route('tracking') }}" 
                     class="{{ request()->routeIs('tracking') ? 'bg-gray-200 text-black' : 'text-black hover:bg-gray-300 hover:text-sky-700' }} rounded-md px-3 py-2 text-sm font-semibold">Tracking</a>
              </nav>
              
              </div>
            </div>
          </div>

          <div x-data="{ isNotificationOpen: false, isProfileOpen: false }" class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
              <!-- Notification -->
              <div class="relative ml-3" x-data="{ isNotificationOpen: false, isProfileOpen: false }">
                <!-- Button Notification -->
                <button @click="isNotificationOpen = !isNotificationOpen; isProfileOpen = false" 
                    class="relative flex max-w-xs items-center rounded-full text-gray-400 bg-gray-800 text-sm focus:outline-none focus:ring-2
                    hover:text-sky-500 focus:ring-sky-300 focus:ring-offset-2 focus:ring-offset-gray-800" 
                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="sr-only">View notifications</span>
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                </button>
            
                <!-- Notification Dropdown -->
                <div 
                    x-show="isNotificationOpen" 
                    
                    x-transition:enter="transition ease-out duration-100 transform"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75 transform"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none z-20"
                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700">Notification 1</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700">Notification 2</a>
                </div>
            </div>
        
                <!-- Profile -->
                <div class="relative ml-3">
                    <button type="button" 
                        @click="isProfileOpen = !isProfileOpen; isNotificationOpen = false" 
                        class="relative flex max-w-xs items-center rounded-full text-gray-400 bg-gray-800 text-sm focus:outline-none focus:ring-2
                        hover:text-sky-500 focus:ring-sky-300 focus:ring-offset-2 focus:ring-offset-gray-800" 
                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">Open user menu</span>
                        <svg class="w-8 h-8 text-gray-800 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="-2 -2 20 21">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                        </svg>
                    </button>
        
                    <!-- Profile Dropdown -->
                    <div 
                        x-show="isProfileOpen" 
                        x-transition:enter="transition ease-out duration-100 transform"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75 transform"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none z-20"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                        <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700">Your Profile</a>
                        <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700">Your Orders</a>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700">Sign Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        

          <div class="-mr-2 flex md:hidden">
            <!-- Mobile menu button -->
            <button @click="isOpen = !isOpen" type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
              <span class="absolute -inset-0.5"></span>
              <span class="sr-only">Open main menu</span>
              <!-- Menu open: "hidden", Menu closed: "block" -->
              <svg :class="{'hidden': isOpen, 'block': !isOpen }
              class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
              <!-- Menu open: "block", Menu closed: "hidden" -->
              <svg :class="{'block': isOpen, 'hidden': !isOpen } 
              class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Mobile menu, show/hide based on menu state. -->
      <div x-show="isOpen" class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-semibold text-white" aria-current="page">Dashboard</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-semibold text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-semibold text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-semibold text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-semibold text-gray-300 hover:bg-gray-700 hover:text-white">Reports</a>
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
          <div class="flex items-center px-5">
            <div class="flex-shrink-0">
              <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </div>
            <div class="ml-3">
              <div class="text-base font-semibold leading-none text-white">Tom Cook</div>
              <div class="text-sm font-semibold leading-none text-gray-400">tom@example.com</div>
            </div>
            <button type="button" class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">View notifications</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
              </svg>
            </button>
          </div>
          <div class="mt-3 space-y-1 px-2">
            <a href="#" class="block rounded-md px-3 py-2 text-base font-semibold text-gray-400 hover:bg-gray-700 hover:text-white">Your Profile</a>
            <a href="#" method="" class="block rounded-md px-3 py-2 text-base font-semibold text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</a>
          </div>
        </div>
      </div>
    </nav>
  
    <!-- Header -->
      @include('student.layout.auth-header')
      
    <!-- Main content -->
    @yield('content')

    </div>
</body>

<!-- Footer -->
@include('student.layout.footer')


</html>