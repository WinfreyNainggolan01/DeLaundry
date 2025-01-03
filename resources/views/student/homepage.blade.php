@extends('student.layout.main')
@section('head')
    <title>Homepage | DeLaundry</title>
@endsection

@section('content')
<main>
    <div class="mx-auto max-w-7xl py-10 px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-28">
        <!-- Left Image Section -->
        <div class="flex justify-center items-center">
                <img src="{{ asset('img/laundry-basket.jpg') }}" alt="Laundry Basket" class="max-w-full h-auto shadow-lg rounded-lg">
        </div>

        <!-- Right Text Section -->
        <div class="flex flex-col justify-center">
                <p class="text-lg mb-6">Selamat Datang di DeLaundry. DeLaundry adalah layanan laundry profesional yang dirancang khusus untuk memenuhi kebutuhan mahasiswa IT Del. Kami memahami jadwal kuliah yang padat dan aktivitas kampus yang sibuk, sehingga kami berkomitmen untuk menyediakan solusi laundry yang efisien dan dapat diandalkan.</p>
                <p class="text-lg mb-8">Dengan layanan kami, pakaian Anda akan selalu bersih, rapi, dan harum. Fokuskan energi Anda untuk belajar dan menjalani kegiatan kampus, sementara kebutuhan laundry Anda kami tangani dengan standar kualitas terbaik.</p>
                
                <!-- Buttons -->
                
        </div>
    </div>

    <section class="bg-white">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
            <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-black ">Our Services</h2>
            <p class="font-light text-black sm:text-xl">Di DeLaundry, kami berfokus pada memberikan pakaian yang bersih, segar, dan layanan yang sesuai dengan kebutuhan Anda. Cepat, dapat diandalkan, dan berorientasi pada pelanggan, kami hadir untuk mempermudah kebutuhan laundry Anda.</p>
            </div> 
            <div class="grid gap-16 lg:grid-cols-3 py-6">
            <!-- Card 1 -->
            <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-200 dark:border-gray-100">
                <div class=" flex justify-center">
                    <img src="{{ asset('img/laundry-place.svg') }}" alt="laundry place" class="max-w-md h-auto shadow-lg rounded-lg justify-center">
                </div>
                <h2 class="mb-2 mt-7 text-2xl font-bold tracking-tight text-gray-900"><a href="#">Laundry Your Items</a></h2>
                <p class="mb-5 font-light text-gray-600 ">Serahkan pakaian Anda untuk dicuci dengan layanan terbaik. Kami memastikan cucian Anda bersih, harum, dan rapi tepat waktu.</p>
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
                <p class="mb-5 font-light text-gray-600">Ada masalah dengan layanan kami? Sampaikan keluhan Anda, dan kami akan segera menindaklanjuti untuk memberikan solusi terbaik.</p>
                <div class="flex justify-center items-center">
                    <!-- Buttons -->
                    <a href="{{ route('your.order') }}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500">
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
                <p class="mb-5 font-light text-gray-600">Pantau status cucian Anda secara real-time dan pastikan semuanya berjalan sesuai rencana.</p>
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