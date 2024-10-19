<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/konrix/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 08:31:03 GMT -->
<head>
    <meta charset="utf-8">
    <title>Dashboard | DeLaundry - Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="coderthemes" name="author">
    <link rel="shortcut icon" href="{{asset('vendor/images/favicon.ico')}}">
    <link href="{{asset('vendor/css/app.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('vendor/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('vendor/js/config.js')}}"></script>
    <link
        rel="shortcut icon"
        href="{{ asset('img/Logo-DeLaundry.png') }}"
        type="image/x-icon"
    />
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex wrapper">


        <!-- Sidenav Menu -->
        <!-- Sidenav Menu -->
        <div class="app-menu">

            <!-- Sidenav Brand Logo -->
            <a href="" class="flex items-center">
                <div class="flex-shrink-0 p-5">
                  <img class="h-12 w-12" src="{{ asset('img/Logo-DeLaundry.png') }}" alt="DeLaundry Logo">
                </div>
                <h1 class="text-dark-blue text-xl font-bold ml-3">DeLaundry</h1>
            </a>

            <!-- Sidenav Menu Toggle Button -->
            <button id="button-hover-toggle" class="absolute top-5 end-2 rounded-full p-1.5">
                <span class="sr-only">Menu Toggle Button</span>
                <i class="mgc_round_line text-xl"></i>
            </button>


            <!--- Menu -->
            <div class="srcollbar scroll -px-48" data-simplebar>
                <ul class="menu scroll" data-fc-type="accordion">
                    <li class="menu-title">Menu</li>

                    <li class="menu-item">
                        <a href="/admin-dashboard" class="menu-link">
                            <img src="{{ asset('img/house-door.svg') }}" alt="">
                            <h1 class="text-sm ml-3">Dashboard</h1>
                        </a>
                    </li>

                    <li class="menu-title">Manager</li>

                    <li class="menu-item">
                        <a href="/admin-user" :active="request()->is('admin-user')" class="menu-link">
                            <img src="{{ asset('img/people.svg') }}" alt="user">
                            <h1 class="text-sm ml-3">Users</h1>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="/admin-order" :active="request()->is('admin-order')" class="menu-link">
                            <img src="{{ asset('img/collection.svg') }}" alt="order">
                            <h1 class="text-sm ml-3">Orders</h1>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="/admin-complaint" :active="request()->is('admin-complaint')" class="menu-link">
                            <img src="{{ asset('img/chat-right-text.svg') }}" alt="complaint">
                            <h1 class="text-sm ml-3">Complaints</h1>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
<!-- Sidenav Menu End  -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            <!-- Topbar Start -->
            <header class="app-header flex items-center px-4 gap-3">

                <!-- Topbar Brand Logo -->
                <a href="index.html" class="logo-box">
                    <!-- Light Brand Logo -->
                    <div class="logo-light">
                        <img src="{{asset('vendor/images/logo-light.png')}}" class="logo-lg h-6" alt="Light logo">
                        <img src="{{asset('vendor/images/logo-sm.png')}}" class="logo-sm" alt="Small logo">
                    </div>

                    <!-- Dark Brand Logo -->
                    <div class="logo-dark">
                        <img src="{{asset('vendor/images/logo-dark.png')}}" class="logo-lg h-6" alt="Dark logo">
                        <img src="{{asset('vendor/images/logo-sm.png')}}" class="logo-sm" alt="Small logo">
                    </div>
                </a>

                <!-- Topbar Search Modal Button -->
                <button type="button" data-fc-type="modal" data-fc-target="topbar-search-modal" class="nav-link p-2 me-auto">
                    <span class="sr-only">Search</span>
                    <span class="flex items-center justify-center h-6 w-6">
                        <i class="mgc_search_line text-2xl"></i>
                    </span>
                </button>   

                <!-- Profile Dropdown Button -->
                <div class="relative">
                    <button data-fc-type="dropdown" data-fc-placement="bottom-end" type="button" class="nav-link">
                        <img src="{{asset('vendor/images/users/user-6.jpg')}}" alt="user-image" class="rounded-full h-10 px-5">
                    </button>
                    <div class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-44 z-50 transition-[margin,opacity] duration-300 mt-2 bg-white shadow-lg border rounded-lg p-2 border-gray-200">
                        <a class="flex items-center py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100" 
                        href="#">
                            <i class="mgc_exit_line me-2"></i> 
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
                <!-- Card Total -->
                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6">
                    <div class="card">
                        <div class="p-5">
                            <div class="flex justify-between">
                                <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-blue-100 ">
                                    <img src="{{ asset('img/person.svg') }}" alt="person" class="h-10 w-auto">
                                </div>
                                <div class="text-right">
                                    <h3 class="mt-1 text-2xl font-bold mb-5 text-gray-900">3</h3>
                                    <p class="mb-1 truncate text-gray-900">Total Users</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="p-5">
                            <div class="flex justify-between">
                                <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-blue-100">
                                    <img src="{{ asset('img/box-seam-blue.svg') }}" alt="person" class="h-10 w-auto">
                                </div>
                                <div class="text-right text-gray-900">
                                    <h3 class="text-gray-900 mt-1 text-2xl font-bold mb-5">3</h3>
                                    <p class="mb-1 truncate text-gray-900">Total Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="p-5">
                            <div class="flex justify-between">
                                <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-blue-100">
                                    <img src="{{ asset('img/headset-blue.svg') }}" alt="person" class="h-10 w-auto">
                                </div>
                                <div class="text-right"> 
                                    <h3 class=" mt-1 text-2xl font-bold mb-5 text-gray-900">3</h3>
                                    <p class=" mb-1 truncate text-gray-900">Total Complaints</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>


                <div class="flex flex-col align-self-center py-6">
                    <!-- Card 1 -->
                    <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-200 dark:border-gray-100">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Line with Data Labels</h4>
                            </div>
                            <div class="p-6">
        
                                <div id="line_chart_datalabel" class="apex-charts" dir="ltr"></div>
                            </div>
                        </div><!--end card-->
                    </div>
                </div>
                
                <div class="grid 2xl:grid-cols-4 gap-6 mb-6">
                    <div class="2xl:col-span-3">
                        <div class="grid lg:grid-cols-3 gap-6">
                            <div class="col-span-1">
                                <div class="grid lg:grid-cols-2 gap-6">
                                    
                            </div>
                        </div>
                    </div>
                </div> 
                <!-- Grid End -->

            </main>

            <!-- Footer Start -->
            <x-admin_footer>

            </x-admin_footer>

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
    <script src="{{asset('vendor/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('vendor/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('vendor/libs/%40frostui/tailwindcss/frostui.js')}}"></script>

    <!-- App Js -->
    <script src="{{asset('vendor/js/app.js')}}"></script>

    <!-- Apexcharts js -->
    <script src="{{asset('vendor/libs/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('vendor/js/pages/charts-apex.js') }}"></script>


    <!-- Dashboard Project Page js -->
    <script src="{{asset('vendor/js/pages/dashboard.js')}}"></script>

</body>


<!-- Mirrored from coderthemes.com/konrix/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 08:33:52 GMT -->
</html>