<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/konrix/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 08:31:03 GMT -->
<head>
    <meta charset="utf-8">
    <title>Dashboard | DeLaundry - Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="coderthemes" name="author">

    <!-- Theme Config Js -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex min-h-screen">
        <!-- Sidenav Menu -->
        <div class="w-64 bg-white shadow-lg">

            <!-- Sidenav Brand Logo -->
            <div class="p-4">
                <a href="#" class="flex items-center space-x-2">
                    <img class="h-12 w-12" src="{{ asset('img/Logo-DeLaundry.png') }}" class="h-6" alt="Dark logo">
                    <span class="text-dark-blue text-xl font-bold ml-3">DeLaundry</span>
                </a>
            </div>

            <!-- Menu -->
            <nav class="mt-4">
                <ul>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 text-blue-600 hover:bg-gray-200 group">
                            <i class="mgc_home_3_line mr-2"></i>
                            <img class="mx-3 group-hover:scale-110 group-hover:opacity-80 transition-transform duration-200 ease-in-out" 
                                src="{{ asset('img/house-door.svg') }}" 
                                alt="Dashboard Icon">
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="mt-4">
                        <span class="px-4 text-gray-500 text-sm uppercase tracking-wider">Manager</span>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-200 group">
                            <i class="mgc_home_3_line mr-2"></i>
                            <img class="mx-3 group-hover:scale-110 group-hover:opacity-80 transition-transform duration-200 ease-in-out" 
                                src="{{ asset('img/people.svg') }}" 
                                alt="User Icon">
                            <span>User</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-200 group">
                            <i class="mgc_home_3_line mr-2"></i>
                            <img class="mx-3 group-hover:scale-110 group-hover:opacity-80 transition-transform duration-200 ease-in-out" 
                                src="{{ asset('img/collection.svg') }}" 
                                alt="Dashboard Icon">
                            <span>Order</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2  hover:bg-gray-200 group">
                            <i class="mgc_home_3_line mr-2"></i>
                            <img class="mx-3 group-hover:scale-110 group-hover:opacity-80 transition-transform duration-200 ease-in-out" 
                                src="{{ asset('img/bell.svg') }}" 
                                alt="Notification Icon">
                            <span>Notification</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2  hover:bg-gray-200 group">
                            <i class="mgc_home_3_line mr-2"></i>
                            <img class="mx-3 group-hover:scale-110 group-hover:opacity-80 transition-transform duration-200 ease-in-out" 
                                src="{{ asset('img/chat-right-text.svg') }}" 
                                alt="Complaint Icon">
                            <span>Complaint</span>
                        </a>
                    </li>

                    <li class="mt-4">
                        <span class="px-4 text-gray-500 text-sm uppercase tracking-wider">Custom</span>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-200">
                            <i class="mgc_user_3_line mr-2"></i>
                            <span>Auth Pages</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Sidenav Menu End  -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

        <nav>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-end">
                  <div class="flex items-center">
                    <div class="hidden md:block">
                      <div class="inline-flex items-baseline space-x-4 ml-10">
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
                          <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                          <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
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
        </nav>

            <!-- Topbar Start -->
            <header class="bg-gray-200 flex items-center px-4 gap-3">
                <!-- Sidenav Menu Toggle Button -->
                <button id="button-toggle-menu" class="nav-link p-2">
                    <span class="sr-only">Menu Toggle Button</span>
                    <span class="flex items-center justify-center h-6 w-6">
                        <i class="mgc_menu_line text-xl"></i>
                    </span>
                </button>
        
                <!-- Topbar Brand Logo -->
                <a href="index.html" class="logo-box">
                    <!-- Light Brand Logo -->
                    <div class="logo-light">
                        <img src="assets/images/logo-light.png" class="logo-lg h-6" alt="Light logo">
                        <img src="assets/images/logo-sm.png" class="logo-sm" alt="Small logo">
                    </div>
        
                    
                </a>
        
                <!-- Topbar Search Modal Button -->
                <button type="button" data-fc-type="modal" data-fc-target="topbar-search-modal" class="nav-link p-2 me-auto">
                    <span class="sr-only">Search</span>
                    <span class="flex items-center justify-center h-6 w-6">
                        <i class="mgc_search_line text-2xl"></i>
                    </span>
                </button>   
        
                <!-- Notification Bell Button -->
                <div class="relative md:flex hidden">
                    <button data-fc-type="dropdown" data-fc-placement="bottom-end" type="button" class="nav-link p-2">
                        <span class="sr-only">View notifications</span>
                        <span class="flex items-center justify-center h-6 w-6">
                            <i class="mgc_notification_line text-2xl"></i>
                        </span>
                    </button>
                    <div class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-80 z-50 mt-2 transition-[margin,opacity] duration-300 bg-white shadow-lg border border-gray-200 rounded-lg">
        
                        <div class="p-2 border-b border-dashed border-gray-200">
                            <div class="flex items-center justify-between">
                                <h6 class="text-sm"> Notification</h6>
                                <a href="javascript: void(0);" class="text-gray-500 underline">
                                    <small>Clear All</small>
                                </a>
                            </div>
                        </div>
        
                        <div class="p-4 h-80 overflow-auto">
        
                            <h5 class="text-xs text-gray-500 mb-2">Today</h5>
        
                            <a href="javascript:void(0);" class="block mb-4">
                                <div class="card-body">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="flex justify-center items-center h-9 w-9 rounded-full bg-primary text-white">
                                                <i class="mgc_message_3_line text-lg"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow truncate ms-2">
                                            <h5 class="text-sm font-semibold mb-1">Datacorp <small class="font-normal text-gray-500 ms-1">1 min ago</small></h5>
                                            <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on Admin</small>
                                        </div>
                                    </div>
                                </div>
                            </a>
        
                            <a href="javascript:void(0);" class="block mb-4">
                                <div class="card-body">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="flex justify-center items-center h-9 w-9 rounded-full bg-info text-white">
                                                <i class="mgc_user_add_line text-lg"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow truncate ms-2">
                                            <h5 class="text-sm font-semibold mb-1">Admin <small class="font-normal text-gray-500 ms-1">1 hr ago</small></h5>
                                            <small class="noti-item-subtitle text-muted">New user registered</small>
                                        </div>
                                    </div>
                                </div>
                            </a>
        
                            <a href="javascript:void(0);" class="block mb-4">
                                <div class="card-body">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <img src="assets/images/users/avatar-2.jpg" class="rounded-full h-9 w-9" alt="">
                                        </div>
                                        <div class="flex-grow truncate ms-2">
                                            <h5 class="text-sm font-semibold mb-1">Cristina Pride <small class="font-normal text-gray-500 ms-1">1 day ago</small></h5>
                                            <small class="noti-item-subtitle text-muted">Hi, How are you? What about our next meeting</small>
                                        </div>
                                    </div>
                                </div>
                            </a>
        
                            <h5 class="text-xs text-gray-500 mb-2">Yesterday</h5>
        
                            <a href="javascript:void(0);" class="block mb-4">
                                <div class="card-body">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="flex justify-center items-center h-9 w-9 rounded-full bg-primary text-white">
                                                <i class="mgc_message_1_line text-lg"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow truncate ms-2">
                                            <h5 class="text-sm font-semibold mb-1">Datacorp</h5>
                                            <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on Admin</small>
                                        </div>
                                    </div>
                                </div>
                            </a>
        
                            <a href="javascript:void(0);" class="block">
                                <div class="card-body">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <img src="assets/images/users/avatar-4.jpg" class="rounded-full h-9 w-9" alt="">
                                        </div>
                                        <div class="flex-grow truncate ms-2">
                                            <h5 class="text-sm font-semibold mb-1">Karen Robinson</h5>
                                            <small class="noti-item-subtitle text-muted">Wow ! this admin looks good and awesome design</small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
        
                        <a href="javascript:void(0);" class="p-2 border-t border-dashed border-gray-200 block text-center text-primary underline font-semibold">
                            View All
                        </a>
                    </div>
                </div>
        
                <!-- Profile Dropdown Button -->
                <div class="relative">
                    <button data-fc-type="dropdown" data-fc-placement="bottom-end" type="button" class="nav-link">
                        <img src="assets/images/users/user-6.jpg" alt="user-image" class="rounded-full h-10">
                    </button>
                    <div class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-44 z-50 transition-[margin,opacity] duration-300 mt-2 bg-white shadow-lg border rounded-lg p-2 border-gray-200">
                        <a class="flex items-center py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100" href="auth-login.html">
                            <i class="mgc_exit_line  me-2"></i> 
                            <span>Log Out</span>
                        </a>
                    </div>
                </div>
            </header>
            <!-- Topbar End -->
        
            <!-- Topbar Search Modal -->
            <div>
                <div id="topbar-search-modal" class="fc-modal hidden w-full h-full fixed top-0 start-0 z-50">
                    <div class="fc-modal-open:opacity-100 fc-modal-open:duration-500 opacity-0 transition-all sm:max-w-lg sm:w-full m-12 sm:mx-auto">
                        <div class="mx-auto max-w-2xl overflow-hidden rounded-xl bg-white shadow-2xl transition-all">
                            <div class="relative">
                                <div class="pointer-events-none absolute top-3.5 start-4 text-gray-900 text-opacity-40">
                                    <i class="mgc_search_line text-xl"></i>
                                </div>
                                <input type="search" class="h-12 w-full border-0 bg-transparent ps-11 pe-4 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="Search...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <main class="flex-grow p-6">
        
                <div class="grid 2xl:grid-cols-4 gap-6 mb-6">
                    <div class="2xl:col-span-3">
        
                        <div class="grid lg:grid -cols-3 gap-6">
                            <div class="col-span-1">
                                <div class="card">
                                    <div class="p-6">
                                        <h4 class="card-title">Monthly Target</h4>
        
                                        <div id="monthly-target" class="apex-charts my-8" data-colors="#0acf97,#3073F1"></div>
        
                                        <div class="flex justify-center">
                                            <div class="w-1/2 text-center">
                                                <h5>Pending</h5>
                                                <p class="fw-semibold text-muted">
                                                    <i class="mgc_round_fill text-primary"></i> Projects
                                                </p>
                                            </div>
                                            <div class="w-1/2 text-center">
                                                <h5>Done</h5>
                                                <p class="fw-semibold text-muted">
                                                    <i class="mgc_round_fill text-success"></i> Projects
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:col-span-2">
                                <div class="card">
                                    <div class="p-6">
                                        <div class="flex justify-between items-center">
                                            <h4 class="card-title">Project Statistics</h4>
                                            <div class="flex gap-2">
                                                <button type="button" class="btn btn-sm bg-primary/25 text-primary hover:bg-primary hover:text-white">
                                                    All
                                                </button>
                                                <button type="button" class="btn btn-sm bg-gray-400/25 text-gray-400 hover:bg-gray-400 hover:text-white">
                                                    6M
                                                </button>
                                                <button type="button" class="btn btn-sm bg-gray-400/25 text-gray-400 hover:bg-gray-400 hover:text-white">
                                                    1Y
                                                </button>
                                            </div>
                                        </div>
        
                                        <div dir="ltr" class="mt-2">
                                            <div id="crm-project-statistics" class="apex-charts" data-colors="#cbdcfc,#3073F1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-span-1">
                        <div class="card mb-6">
                            <div class="px-6 py-5 flex justify-between items-center">
                                <h4 class="header-title">Project Summary</h4>
                                <div>
                                    <button class="text-gray-600" data-fc-type="dropdown" data-fc-placement="left-start" type="button">
                                        <i class="mgc_more_1_fill text-xl"></i>
                                    </button>
        
                                    <div class="hidden fc-dropdown fc-dropdown-open:opacity-100 opacity-0 w-36 z-50 mt-2 transition-[margin,opacity] duration-300 bg-white shadow-lg border border-gray-200 rounded-lg p-2">
                                        <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100" href="javascript:void(0)">
                                            <i class="mgc_add_circle_line"></i> Add
                                        </a>
                                        <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100" href="javascript:void(0)">
                                            <i class="mgc_edit_line"></i> Edit
                                        </a>
                                        <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100" href="javascript:void(0)">
                                            <i class="mgc_copy_2_line"></i> Copy
                                        </a>
                                        <div class="h-px bg-gray-200 my-2 -mx-2"></div>
                                        <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-danger hover:bg-danger/5" href="javascript:void(0)">
                                            <i class="mgc_delete_line"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-2 bg-warning/20 text-warning" role="alert">
                                <i class="mgc_folder_star_line me-1 text-lg align-baseline"></i> <b>38</b> Total Admin & Client Projects
                            </div>
        
                            <div class="p-6 space-y-3">
                                <div class="flex items-center border border-gray-200 rounded px -3 py-2">
                                    <div class="flex-shrink-0 me-2">
                                        <div class="w-12 h-12 flex justify-center items-center rounded-full text-primary bg-primary/25">
                                            <i class="mgc_group_line text-xl"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow">
                                        <h5 class="font-semibold mb-1">Project Discssion</h5>
                                        <p class="text-gray-400">6 Person</p>
                                    </div>
                                    <div>
                                        <button class="text-gray-400" data-fc-type="tooltip" data-fc-placement="top">
                                            <i class="mgc_information_line text-xl"></i>
                                        </button>
                                        <div class="bg-slate-700 hidden px-2 py-1 rounded transition-all text-white opacity-0 z-50" role="tooltip">
                                            Info <div class="bg-slate-700 w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px]" data-fc-arrow></div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="flex items-center border border-gray-200 rounded px-3 py-2">
                                    <div class="flex-shrink-0 me-2">
                                        <div class="w-12 h-12 flex justify-center items-center rounded-full text-warning bg-warning/25">
                                            <i class="mgc_compass_line text-xl"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow">
                                        <h5 class="fw-semibold my-0">In Progress</h5>
                                        <p>16 Projects</p>
                                    </div>
                                    <div>
                                        <button class="text-gray-400" data-fc-type="tooltip" data-fc-placement="top">
                                            <i class="mgc_information_line text-xl"></i>
                                        </button>
                                        <div class="bg-slate-700 hidden px-2 py-1 rounded transition-all text-white opacity-0 z-50" role="tooltip">
                                            Info <div class="bg-slate-700 w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px]" data-fc-arrow></div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="flex items-center border border-gray-200 rounded px-3 py-2">
                                    <div class="flex-shrink-0 me-2">
                                        <div class="w-12 h-12 flex justify-center items-center rounded-full text-danger bg-danger/25">
                                            <i class="mgc_check_circle_line text-xl"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow">
                                        <h5 class="fw-semibold my-0">Completed Projects</h5>
                                        <p>24</p>
                                    </div>
                                    <div>
                                        <button class="text-gray-400" data-fc-type="tooltip" data-fc-placement="top">
                                            <i class="mgc_information_line text-xl"></i>
                                        </button>
                                        <div class="bg-slate-700 hidden px-2 py-1 rounded transition-all text-white opacity-0 z-50" role="tooltip">
                                            Info <div class="bg-slate-700 w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px]" data-fc-arrow></div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="flex items-center border border-gray-200 rounded px-3 py-2">
                                    <div class="flex-shrink-0 me-2">
                                        <div class="w-12 h-12 flex justify-center items-center rounded-full text-success bg-success/25">
                                            <i class="mgc_send_line text-xl"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow">
                                        <h5 class="fw-semibold my-0">Delivery Projects</h5>
                                        <p>20</p>
                                    </div>
                                    <div>
                                        <button class="text-gray-400" data-fc-type="tooltip" data-fc-placement="top">
                                            <i class="mgc_information_line text-xl"></i>
                                        </button>
                                        <div class="bg-slate-700 hidden px-2 py-1 rounded transition-all text-white opacity-0 z-50" role="tooltip">
                                            Info <div class="bg-slate-700 w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px]" data-fc-arrow></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                    </div>
                </div> <!-- Grid End -->
        
            </main >
        
            <!-- Footer Start -->
            <footer class="footer h-16 flex items-center px-6 bg-white shadow">
                <div class="flex justify-center w-full gap-4">
                    <div>
                        <script>document.write(new Date().getFullYear())</script> &copy; Konrix - <a href="https://coderthemes.com/" target="_blank">Coderthemes</a>
                    </div>
                </div>
            </footer>
            <!-- Footer End -->
        
        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>

    <!-- Back to Top Button -->
    <button data-toggle="back-to-top" class="fixed hidden h-10 w-10 items-center justify-center rounded-full z-10 bottom-20 end-14 p-2.5 bg-primary cursor-pointer shadow-lg text-white">
        <i class="mgc_arrow_up_line text-lg"></i>
    </button>


    <!-- Plugin Js -->
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/libs/%40frostui/tailwindcss/frostui.js"></script>

    <!-- App Js -->
    <script src="assets/js/app.js"></script>

    <!-- Apexcharts js -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Dashboard Project Page js -->
    <script src="assets/js/pages/dashboard.js"></script>

</body>


<!-- Mirrored from coderthemes.com/konrix/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 08:33:52 GMT -->
</html>