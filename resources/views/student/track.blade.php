@extends('student.layout.main')

@section('head')
    <title>Track | DeLaundry</title>
@endsection

@section('content')
<main class="container mx-auto px-4 py-8">
    <p class="text-center text-gray-700 mt-4">
        Ini adalah halaman Pelacakan Pesanan Laundry! Pantau status laundry Anda dengan mudah mulai dari Pesanan Diterima, Penjemputan, dan Proses Pencucian, hingga Pengantaran. Tetap terinformasi dengan pembaruan real-time, memastikan Anda selalu mengetahui perkembangan pesanan tanpa repot. Nikmati kenyamanan pelacakan yang mulus, menjadikan pengalaman laundry Anda lebih praktis dan bebas khawatir.
    </p>
    <div class="bg-white shadow rounded-lg p-6 mt-8">
        <div class="flex items-center justify-between mb-6">
            <span class="text-gray-700 font-semibold">Order Number</span>
            <span class="text-blue-900 font-bold">{{ $order->ordx_id }}</span>
        </div>
        <div class="flex items-center justify-between mb-6">
            @php
                $statuses = ['Order Received', 'Pick Up', 'On Process', 'Delivery', 'Done'];
                $currentStatus = $order->status;
                $statusIndex = array_search($currentStatus, ['pending', 'picked_up', 'on_process', 'delivered', 'done']);
            @endphp
            @foreach ($statuses as $index => $status)
                <div class="flex flex-col items-center">
                    <div class="{{ $index <= $statusIndex ? 'bg-sky-600 text-white' : 'bg-gray-300 text-gray-500' }} w-12 h-12 rounded-full flex items-center justify-center mx-auto">
                        <img src="{{ asset('img/track/'. strtolower(str_replace(' ', '-', $status))) . '.png'}}" alt="{{ $status }}" class="w-8 h-8" />
                    </div>
                    <p class="mt-2 text-sm font-medium {{ $index <= $statusIndex ? 'text-gray-700' : 'text-gray-500' }}">{{ $status }}</p>
                </div>
                @if (!$loop->last)
                    <div class="flex-1 h-1 {{ $index < $statusIndex ? 'bg-sky-600' : 'bg-gray-300' }}"></div>
                @endif
            @endforeach
        </div>

        <div class="text-gray-700">
            @php
                $statusDescriptions = [
                    'pending' => 'Your laundry order has been successfully placed and is awaiting pickup.',
                    'picked_up' => 'Our team is on the way to collect your laundry for processing.',
                    'on_process' => 'Your laundry is being cleaned and prepared with care.',
                    'delivered' => 'Your laundry is on the way to be delivered to you.',
                    'done' => 'Your laundry order has been completed and delivered.'
                ];
            @endphp
            @foreach ($messages as $message)
                <div class="mb-4">
                    <p class="font-semibold">{{ $message['date_at'] }}</p>
                    <p class="text-sm">{{ $message['time_at'] }}</p>
                    <p class="mt-2">{{ ucfirst(str_replace('_', ' ', $message['status'])) }}</p>
                    <p class="text-sm">{{ $message['description'] }}</p>
                </div>
            @endforeach
        </div>
        <!-- Back to Orders Button -->
        <div class="mt-8">
            <a href="{{ route('homepage') }}" class="inline-flex items-center bg-gray-600 text-white py-2 px-6 rounded-lg shadow transition">
                Back
            </a>
        </div>
    </div>
</main>
@endsection