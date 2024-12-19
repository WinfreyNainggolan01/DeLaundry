@extends('admin.layout.main')

@section('head')
    <title>Dashboard | Admin - DeLaundry</title>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endsection

@section('content')
    <div class="flex justify-left p-3 ">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Welcome back, <span class="text-blue-600">{{ Auth::guard('admin')->user()->name }}</span></h2>
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
                        <h3 class="text-gray-900 mt-1 text-2xl font-bold mb-5">{{ $total_order }}</h3>
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
                        <h3 class=" mt-1 text-2xl font-bold mb-5 text-gray-900">{{ $total_complaint }}</h3>
                        <p class=" mb-1 truncate text-gray-900">Total Complaints</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col align-self-center py-10">
        <!-- Card 1 -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pendapatan Perbulan</h4>
            </div>
            <div class="p-6">
                <div id="monthly_earnings_chart" class="apex-charts" dir="ltr"></div>
            </div>
        </div><!--end card-->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var options = {
                series: [{
                    name: 'Earnings',
                    data: @json($monthlyEarnings->pluck('total'))
                }],
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                title: {
                    text: 'Monthly Earnings',
                    align: 'left'
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                    },
                },
                markers: {
                    size: 5, // Size of the markers
                    colors: ['#FFA41B'], // Color of the markers
                    strokeColors: '#fff', // Color of the marker's border
                    strokeWidth: 2, // Width of the marker's border
                    hover: {
                        size: 7 // Size of the marker when hovered
                    }
                },
                xaxis: {
                    categories: @json($monthlyEarnings->pluck('month')->map(function($month) {
                        return DateTime::createFromFormat('!m', $month)->format('F');
                    }))
                }
            };
    
            var chart = new ApexCharts(document.querySelector("#monthly_earnings_chart"), options);
            chart.render();
        });
    </script>
@endsection