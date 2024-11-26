@extends('student.layout.main')

@section('head')
    <title>FeedBack | DeLaundry</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <main class="feedback-page">
        <div class="feedback-header">
            <h1></h1>
        </div>
        <div class="feedback-container" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; align-items: flex-start; padding: 20px; background-color: #f9f9f9; border-radius: 8px;">
            <div class="feedback-content" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; width: 80%; padding: 40px 20px; background-color: white; border-radius: 8px; height: auto;">
                <div class="feedback-title" style="width: 100%; text-align: left; margin-bottom: 30px; font-size: 28px; font-weight: bold; color: #333;">
                    <h2>Your Feedback</h2>
                </div>
                <div class="feedback-image" style="flex: 0 0 30%; max-width: 30%; margin-right: 20px; padding-right: 10px;">
                    <img src="{{ asset('img/feedback-complaint.png') }}" alt="Laundry Issue" style="width: 100%; height: auto; border-radius: 8px; object-fit: cover;">
                </div>
                <div class="feedback-info" style="flex: 1 1 50%; max-width: 50%; padding-left: 10px; box-sizing: border-box;">
                    <div style="margin-bottom: 15px;">
                        <strong>Subject:</strong>
                        <p style="margin: 5px 0;">Baju Putih Luntur</p>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <strong>Order ID:</strong>
                        <p style="margin: 5px 0;">DLR3453434</p>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <strong>Description:</strong>
                        <p style="margin: 5px 0;">Terdapat noda berwarna pink di sekitar kancing baju</p>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <strong>Feedback:</strong>
                        <p style="margin: 5px 0;">Mohon maaf untuk kelalaian tim kami. Saat melakukan pengecekan, tidak ada pemisahan pakaian yang menandakan pakaian mudah luntur, sehingga kami menyatukan semua pakaian saat pencucian.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
