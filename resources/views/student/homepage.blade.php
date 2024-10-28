@extends('student.layout.main')
@section('head')
    <title>Homepage | DeLaundry</title>
@endsection
{{-- 
@section('header')
<header class="bg-dark-blue shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold tracking-tight text-gray-100">Welcome, {{ Auth::guard('student')->user()->name }}</h1>
    </div>
</header>
@endsection --}}

@section('content')
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
                    <a href="{{ route('order') }}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500">
                        <button class="bg-sky-800 text-white px-6 py-2 rounded-2xl shadow hover:bg-blue-600">Add Request
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
                    <a href="{{ route('complaint') }}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500">
                        <button class="bg-sky-800 text-white px-6 py-2 rounded-2xl shadow hover:bg-blue-600">Complaint</button>
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
                    <a href="{{ route('tracking') }}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500">
                        <button class="bg-sky-800 text-white px-6 py-2 rounded-2xl shadow hover:bg-blue-600">Track</button>
                    </a>
                </div>
            </article>                    
            </div>  
        </div>
    </section>
</main>
@endsection