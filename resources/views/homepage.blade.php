<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <title>Beranda</title>
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
                <a href="/" class="{{ request()->is('/') ? "bg-gray-200 text-black" : "text-gray-300 hover:bg-gray-700 hover:text-white"}} rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
                <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:text-sky-500">Order</a>
                <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:text-sky-500">Payment</a>
                <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:text-sky-500">Complaint</a>
              </div>
            </div>
          </div>
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
              <!-- Notification -->
              <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400  focus:outline-none focus:ring-2 hover:text-sky-500 focus:ring-sky-300 focus:ring-offset-2 focus:ring-offset-gray-800">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">View notifications</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>
              </button>
  
              <!-- Profile -->
              <div class="relative ml-3">
                <div>
                  <button type="button" @click="isOpen = !isOpen" 
                  class="relative flex max-w-xs items-center rounded-full text-gray-400 bg-gray-800 text-sm focus:outline-none focus:ring-2
                  hover:text-sky-500  focus:ring-sky-300 focus:ring-offset-2 focus:ring-offset-gray-800 " id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">Open user menu</span>

                    <svg class="w-8 h-8 text-gray-800 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-person" viewBox="-2 -2 20 21">
                      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                    </svg>
                  </button>
                </div>

                <div 
                  x-show="isOpen"
                  x-transition:enter="transition ease-out duration-100 transform"
                  x-transition:enter-start="opacity-0 scale-95"
                  x-transition:enter-end="opacity-100 scale-100"
                  x-transition:leave="transition ease-in duration-75 transform"
                  x-transition:leave-start="opacity-100 scale-100"
                  x-transition:leave-end="opacity-0 scale-95"
                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                  <!-- Active: "bg-gray-100", Not Active: "" -->
                  <a href="/profile" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                  <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Sign out
                    </button>
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
          <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Dashboard</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Reports</a>
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
          <div class="flex items-center px-5">
            <div class="flex-shrink-0">
              <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </div>
            <div class="ml-3">
              <div class="text-base font-medium leading-none text-white">Tom Cook</div>
              <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>
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
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your Profile</a>
            <a href="#" method="" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</a>
          </div>
        </div>
      </div>
    </nav>
  
    <!-- Header -->
    @auth
    <header class="bg-dark-blue shadow">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold tracking-tight text-gray-100">Welcome, {{ auth()->student()->name}}</h1>
      </div>
    </header>
    @else
    <header class="bg-dark-blue shadow">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold tracking-tight text-gray-100">DeLaundry</h1>
      </div>
    </header>
    @endauth
      

    <!-- Main content -->
    <main>
      <div class="mx-auto max-w-7xl py-10 px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-28">
        <!-- Left Image Section -->
        <div class="flex justify-center items-center">
            <img src="{{ asset('img/laundry-basket.jpg') }}" alt="Laundry Basket" class="max-w-full h-auto shadow-lg rounded-lg">
        </div>

        <!-- Right Text Section -->
        <div class="flex flex-col justify-center">
            <p class="text-lg mb-6">Welcome to DeLaundry, a professional laundry service designed specifically to meet the needs of IT Del students. We understand how busy college schedules and campus activities can be, and we are committed to providing efficient and reliable laundry solutions.</p>
            <p class="text-lg mb-8">With our convenient laundry service, we ensure your clothes are always clean and tidy. Focus your energy on your studies and campus activities, while we handle your laundry needs with high-quality standards.</p>
            
            <!-- Buttons -->
            
        </div>
    </div>

    
    <section class="bg-white">
      <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
          <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
              <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-black ">Our Services</h2>
              <p class="font-light text-black sm:text-xl">At DeLaundry, we focus on delivering clean, fresh clothes with a service that adapts to your needs. Fast, reliable, and customer-centered, we make laundry easier for you.</p>
          </div> 
          <div class="grid gap-16 lg:grid-cols-3 py-6">
            <!-- Card 1 -->
              <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-200 dark:border-gray-100">
                  <div class=" flex justify-center">
                    <img src="{{ asset('img/laundry-place.svg') }}" alt="laundry place" class="max-w-md h-auto shadow-lg rounded-lg justify-center">
                  </div>
                  <h2 class="mb-2 mt-7 text-2xl font-bold tracking-tight text-gray-900"><a href="#">Laundry Your Items</a></h2>
                  <p class="mb-5 font-light text-gray-600 ">Static websites are now used to bootstrap lots of websites and are becoming the basis for a variety of tools that even influence both web designers and developers influence both web designers and developers.</p>
                  <div class="flex justify-center items-center">
                      
                      <!-- Buttons -->
                      <a href="#" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500">
                        <button class="bg-blue-500 text-white px-6 py-2 rounded-2xl shadow hover:bg-blue-600">Add Request
                        </button>
                      </a>
                  </div>
              </article>
             
              <!-- Card 2 -->
              <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-200 dark:border-gray-100">
                  <div class=" flex justify-center py-2">
                    <img src="{{ asset('img/customer-service.svg') }}" alt="customer service" class="max-w-md h-auto shadow-lg rounded-lg">
                  </div>
                  <h2 class="mb-2 mt-7 text-2xl font-bold tracking-tight text-gray-900"><a href="#">Complaint Your Problems</a></h2>
                  <p class="mb-5 font-light text-gray-600">Static websites are now used to bootstrap lots of websites and are becoming the basis for a variety of tools that even influence both web designers and developers influence both web designers and developers.</p>
                  <div class="flex justify-center items-center">
                      
                      <!-- Buttons -->
                      <a href="#" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500">
                        <button class="bg-blue-500 text-white px-6 py-2 rounded-2xl shadow hover:bg-blue-600">Complaint</button>
                      </a>
                  </div>
              </article>

              <!-- Card 3 -->
              <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-200 dark:border-gray-100">
                <div class=" flex justify-center py-2 mt-11">
                  <img src="{{ asset('img/track-order.svg') }}" alt="track" class="max-w-md h-auto shadow-lg rounded-lg">
                </div>
                <h2 class="mb-2 mt-7 text-2xl font-bold tracking-tight text-gray-900"><a href="#">Track Your Orders</a></h2>
                <p class="mb-5 font-light text-gray-600">Static websites are now used to bootstrap lots of websites and are becoming the basis for a variety of tools that even influence both web designers and developers influence both web designers and developers.</p>
                <div class="flex justify-center items-center">
                    
                    <!-- Buttons -->
                    <a href="#" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500">
                      <button class="bg-blue-500 text-white px-6 py-2 rounded-2xl shadow hover:bg-blue-600">Track</button>
                    </a>
                </div>
            </article>                    
          </div>  
      </div>
    </section>
    </main>
  </div>
  
</body>

<!-- Footer -->
<footer class="bg-gray-900
  shadow sm:flex sm:items-center sm:justify-between p-4 sm:p-6 xl:p-8 antialiased">
  <p class="mb-4 text-sm text-center text-gray-500 dark:text-gray-200 sm:mb-0">
      &copy; 2024-2029 <a href="https://flowbite.com/" class="hover:underline" target="_blank">DeLaundry.com</a>. All rights reserved.
  </p>
  <div class="flex justify-center items-center space-x-1">
    <a href="#" data-tooltip-target="tooltip-facebook" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer dark:text-gray-200 dark:hover:text-white hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
            <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
        </svg>
        <span class="sr-only">Facebook</span>
    </a>
    <div id="tooltip-facebook" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
        Like us on Facebook
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
    <a href="#" data-tooltip-target="tooltip-twitter" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer dark:text-gray-200 dark:hover:text-white hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path fill="currentColor" d="M12.186 8.672 18.743.947h-2.927l-5.005 5.9-4.44-5.9H0l7.434 9.876-6.986 8.23h2.927l5.434-6.4 4.82 6.4H20L12.186 8.672Zm-2.267 2.671L8.544 9.515 3.2 2.42h2.2l4.312 5.719 1.375 1.828 5.731 7.613h-2.2l-4.699-6.237Z"/>
        </svg>
        <span class="sr-only">Twitter</span>
    </a>
    <div id="tooltip-twitter" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
        Follow us on Twitter
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
    <a href="#" data-tooltip-target="tooltip-github" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer dark:text-gray-200 dark:hover:text-white hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd"/>
        </svg>
        <span class="sr-only">Github</span>
    </a>
    <div id="tooltip-github" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
        Star us on GitHub
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
    <a href="#" data-tooltip-target="tooltip-dribbble" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer dark:text-gray-200 dark:hover:text-white hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd"/>
        </svg>
        <span class="sr-only">Dribbble</span>
    </a>
    <div id="tooltip-dribbble" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
        Follow us on Dribbble
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
</div>
</footer>

</html>