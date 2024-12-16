@extends('student.layout.main')

@section('head')
    <title>Feedback | DeLaundry</title>
@endsection

@section('content')
<main class="feedback-page">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
<<<<<<< Updated upstream
        <h1 class="text-3xl font-bold mb-6">Your Feedback</h1>
        
        @if ($feedback)
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Feedback Details</h2>
            <p><strong>Order ID:</strong> {{ $feedback->order_id }}</p>
            <p><strong>Subject:</strong> {{ $feedback->subject }}</p>
            <p><strong>Description:</strong> {{ $feedback->description }}</p>
            <p><strong>Response:</strong> {{ $feedback->feedback_response }}</p>
        </div>
        @else
        <div class="bg-yellow-100 p-6 rounded-lg shadow-md">
            <p class="text-yellow-700">No feedback found for this order.</p>
        </div>
        @endif
=======
        
        @if ($feedback)
        <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Order ID -->
                <div>
                    <p class="text-sm text-gray-500 font-semibold uppercase tracking-wide">Order ID</p>
                    <p class="text-lg text-gray-800 font-medium">{{ $order->ordx_id }}</p>
                </div>

                <!-- Complaint Title -->
                <div>
                    <p class="text-sm text-gray-500 font-semibold uppercase tracking-wide">Complaint Title</p>
                    <p class="text-lg text-gray-800 font-medium">{{ $complaint->title }}</p>
                </div>

                <!-- Complaint Description -->
                <div class="md:col-span-2">
                    <p class="text-sm text-gray-500 font-semibold uppercase tracking-wide">Complaint Description</p>
                    <p class="text-base text-gray-700">{{ $complaint->description }}</p>
                </div>

                <!-- Feedback Response -->
                <div class="md:col-span-2">
                    <p class="text-sm text-gray-500 font-semibold uppercase tracking-wide">Feedback Response</p>
                    <p class="text-base text-gray-700">{{ $feedback->feedback_response }}</p>
                </div>
            </div>
        </div>
        @else
        <!-- Empty Feedback -->
        <div class="bg-yellow-50 border border-yellow-300 text-yellow-900 p-6 rounded-lg shadow-lg flex items-center space-x-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-lg font-medium">No feedback found for this order.</p>
        </div>
        @endif

        <!-- Back to Orders Button -->
        <div class="mt-8">
            <a href="{{ route('your.order') }}" class="inline-flex items-center bg-gray-800 text-white py-3 px-6 rounded-lg shadow hover:bg-gray-900 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21l-6-6 6-6" />
                </svg>
                Back to Orders
            </a>
        </div>
>>>>>>> Stashed changes
    </div>
</main>
@endsection
