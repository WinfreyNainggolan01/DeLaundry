@extends('admin.layout.main')

@section('head')
    <title>Dashboard | Admin - DeLaundry</title>
@endsection

@section('content')
    <div class="flex justify-left p-3 ">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Selamat datang, <span class="text-blue-600">{{ Auth::guard('admin')->user()->name }}</span></h2>
    </div>
    <!-- Card Total -->
    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6">
        <div class="card">
            <div class="p-5">
                <div class="flex justify-between">
                    <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-blue-100 ">
                        <img src="{{ asset('img/person.svg') }}" alt="person" class="h-10 w-auto">
                    </div>
                    <div class="text-right">
                        <h3 class="mt-1 text-2xl font-bold mb-5 text-gray-900">{{ $total_user }}</h3>
                        <p class="mb-1 truncate text-gray-900">Total Pengguna</p>
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
                        <h3 class="text-gray-900 mt-1 text-2xl font-bold mb-5">{{ $total_order }}</h3>
                        <p class="mb-1 truncate text-gray-900">Total Pesanan</p>
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
                        <h3 class=" mt-1 text-2xl font-bold mb-5 text-gray-900">{{ $total_complaint }}</h3>
                        <p class=" mb-1 truncate text-gray-900">Total Keluhan</p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>


    <div class="flex flex-col align-self-center py-10">
        <!-- Card 1 -->
        
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Line with Data Labels</h4>
                </div>
                <div class="p-6">

                    <div id="line_chart_datalabel" class="apex-charts" dir="ltr"></div>
                </div>
            </div><!--end card-->
        
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
@endsection