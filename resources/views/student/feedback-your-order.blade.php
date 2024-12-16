@extends('student.layout.main')

@section('head')
    <title>Feedback | DeLaundry</title>
@endsection

@section('content')
<main class="feedback-page">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
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
            <a href="{{ route('your.order') }}" class="inline-flex items-center bg-gray-600 text-white py-3 px-6 rounded-lg shadow transition">
                Back
            </a>
        </div>
    </div>
</main>
@endsection
