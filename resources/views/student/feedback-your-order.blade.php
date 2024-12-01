@extends('student.layout.main')

@section('head')
    <title>Feedback | DeLaundry</title>
@endsection

@section('content')
<main class="feedback-page">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
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
    </div>
</main>
@endsection
