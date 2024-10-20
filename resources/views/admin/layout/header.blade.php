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
            <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="flex items-center py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100">
                <i class="mgc_exit_line me-2"></i> 
                <span>Sign Out</span>
            </form>
            
        </div>
    </div>
</header>