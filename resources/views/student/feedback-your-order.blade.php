@extends('student.layout.main')

@section('head')
    <title>Feedback | DeLaundry</title>
@endsection

@section('content')
<main class="feedback-page">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold mb-6">Tanggapan Anda</h1>
        
        @if ($feedback)
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Detail Tanggapan</h2>
            <p><strong>Order ID:</strong> {{ $feedback->order_id }}</p>
            <p><strong>Subjek:</strong> {{ $feedback->subject }}</p>
            <p><strong>Deskripsi:</strong> {{ $feedback->description }}</p>
            <p><strong>Respon:</strong> {{ $feedback->feedback_response }}</p>
        </div>
        @else
        <div class="bg-yellow-100 p-6 rounded-lg shadow-md">
            <p class="text-yellow-700">Tidak ada tanggapan yang ditemukan untuk pesanan ini.</p>
        </div>
        @endif
    </div>
</main>
@endsection
