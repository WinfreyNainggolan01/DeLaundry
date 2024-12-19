<header class="app-header flex items-center px-4 gap-3">

    <!-- Topbar Brand Logo -->
    <a href="{{ route("admin_dashboard") }}" class="logo-box">
        <div class="logo-dark">
            <div class="flex-shrink-0 p-5">
                <img class="h-12 w-12" src="{{ asset('img/Logo-DeLaundry.png') }}" alt="DeLaundry Logo">
                </div>
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
            <img src="{{asset('img/person-circle-admin.svg')}}" alt="user-image" class="rounded-full h-8 px-5">
        </button>
        <div class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-44 z-50 transition-[margin,opacity] duration-300 mt-2 bg-white shadow-lg border rounded-lg p-2 border-gray-200">
            <a href="{{ route("admin_profile") }}" class="flex items-center py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100">
                <img src="{{ asset('img/person_admin.svg') }}" alt="profile" class="w-5 h-5 mr-2"> <!-- Ukuran ikon dan margin kanan -->
                <span>Profile</span>
            </a>
            <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="flex items-center py-2 px-4 rounded-md text-sm text-gray-800 hover:bg-gray-100">
                <i class="mgc_exit_line me-2"></i> 
                <span>Sign Out</span>
            </form>
        </div>
    </div>
</header>