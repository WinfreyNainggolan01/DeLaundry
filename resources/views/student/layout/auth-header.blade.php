<header class="bg-dark-blue shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold tracking-tight text-gray-100">Welcome, {{ Auth::guard('student')->user()->name }}</h1>
    </div>
</header>