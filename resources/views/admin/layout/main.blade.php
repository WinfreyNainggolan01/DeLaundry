<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/konrix/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 08:31:03 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('vendor/css/app.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('vendor/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('vendor/js/config.js')}}"></script>
    <link
    rel="shortcut icon"
    href="{{ asset('img/Logo-DeLaundry.png') }}"
    type="image/x-icon"
    />
    <script src="//unpkg.com/alpinejs" defer></script>
    
    @vite('resources/css/app.css')
    @yield('head')
    {{-- <title>Dashboard | DeLaundry - Admin Dashboard</title> --}}
</head>
<body>
    <div class="flex wrapper">
        <!-- Sidenav Menu -->
        @include('admin.layout.sidenav')
        <!-- Sidenav Menu End  -->
        <div class="page-content">
            <!-- Topbar Start -->
            @include('admin.layout.header')
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

            <!-- Main Start -->
            <main class="flex-grow p-6">
                @yield('content')
            </main>
            <!-- Main End -->
            <!-- Footer Start -->
            @include('admin.layout.footer')
            <!-- Footer End -->
        </div>
    </div>
    <!-- Back to Top Button -->
    <button data-toggle="back-to-top" class="fixed hidden h-10 w-10 items-center justify-center rounded-full z-10 bottom-20 end-14 p-2.5 bg-primary cursor-pointer shadow-lg text-white">
        <i class="mgc_arrow_up_line text-lg"></i>
    </button>

    <script src="{{asset('vendor/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('vendor/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('vendor/libs/%40frostui/tailwindcss/frostui.js')}}"></script>
    <script src="{{asset('vendor/js/app.js')}}"></script>
    <script src="{{asset('vendor/libs/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('vendor/js/pages/charts-apex.js') }}"></script>
    <script src="{{asset('vendor/js/pages/dashboard.js')}}"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    @yield('script')
</body>
</html>