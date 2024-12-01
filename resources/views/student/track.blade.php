@extends('student.layout.main')

@section('head')
    <title>Track | DeLaundry</title>
@endsection

@section('content')
<main>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-extrabold text-gray-900 text-center mb-4">Your Order Status</h2>
    <p class="text-center text-base text-gray-600 mb-8">
        This is the Laundry Order Tracking page! Easily track your laundry status from Order Received, Pick Up, On Process, to Delivery. Stay informed with real-time updates, ensuring you always know where your order is without any hassle. Enjoy the convenience of seamless tracking, making your laundry experience smooth and worry-free.
    </p>

    <div class="bg-gray-100 p-6 rounded-lg shadow-md max-w-full mx-auto mb-8">
        <h3 class="text-center text-lg font-semibold text-gray-700 mb-4">Order Number: <span class="text-sky-600">{{ $order->ordx_id }}</span></h3>

        <div class="flex justify-between items-center w-full max-w-5xl mx-auto">
            @php
                $statuses = ['Order Received', 'Pick Up', 'On Process', 'Delivery', 'Done'];
                $completed = $tracks->pluck('status')->toArray();
            @endphp
            @foreach ($statuses as $status)
                <div class="text-center">
                    <div class="{{ in_array($status, $completed) ? 'bg-sky-600 text-white' : 'bg-gray-300 text-gray-500' }} w-12 h-12 rounded-full flex items-center justify-center mx-auto">
                        <img src="img/{{ strtolower(str_replace(' ', '-', $status)) }}.png" alt="{{ $status }}" class="w-8 h-8" />
                    </div>
                    <p class="mt-2 text-sm font-medium {{ in_array($status, $completed) ? 'text-gray-700' : 'text-gray-500' }}">{{ $status }}</p>
                </div>
                @if (!$loop->last)
                    <div class="mx-2"></div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="max-w-5xl mx-auto">
        @foreach ($tracks as $track)
            <div class="flex mb-4">
                <div class="w-1/4 text-gray-500 text-sm">
                    <p>{{ \Carbon\Carbon::parse($track->date_at)->format('D, d M Y H:i') }}</p>
                </div>
                <div class="w-3/4">
                    <h4 class="text-gray-700 font-semibold">{{ $track->status }}</h4>
                    <p class="text-sm text-gray-600">{{ $track->description }}</p>
                </div>
            </div>
        @endforeach

        @if ($tracks->isEmpty())
            <div class="text-center text-gray-500">
                <p>No tracking information available for this order.</p>
            </div>
        @endif
    </div>
    </div>
    </div>
    </main>
@endsection
