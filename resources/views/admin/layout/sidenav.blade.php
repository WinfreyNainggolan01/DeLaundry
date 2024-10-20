<nav>
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
</nav>