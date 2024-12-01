@extends('student.layout.main')

@section('head')
    <title>Complaint | Your Order</title>
    <style>
        /* Layout default (side-by-side) */
        .complaint-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 2rem;
            max-width: 100%;
        }

        .complaint-box {
            background-color: #ffffff;
            padding: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            width: 100%;
            max-width: 45%;
            margin: 1rem;
        }

        /* Layout untuk perangkat mobile atau layar kecil */
        @media (max-width: 768px) {
            .complaint-container {
                flex-direction: column; /* Menjadikan elemen berada dalam layout vertikal (atas-bawah) */
                align-items: center;
            }

            .complaint-box {
                max-width: 90%; /* Membuat box lebih besar untuk layar kecil */
            }
        }
    </style>
@endsection

@section('content')
<section class="complaint-container">
    <div class="complaint-box">
        <div>
            <h2 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;">
                Laporkan Masalah pada Cucian Anda
            </h2>
            <p style="color: #000000; margin-bottom: 1rem;">
                Kami memahami bahwa masalah dapat timbul dengan layanan laundry kami, dan kami mohon maaf sebesar-besarnya jika ada pakaian Anda yang rusak selama proses berlangsung. Tujuan kami adalah memastikan kepuasan Anda, dan kami berdedikasi untuk menangani dan menyelesaikan masalah apa pun yang mungkin terjadi. Yakinlah bahwa kami menanggapi semua keluhan dengan serius dan berkomitmen untuk memberikan layanan terbaik.</p>    
            <p style="color: #000000;">
                Masukan Anda sangat berharga dalam membantu kami meningkatkan layanan dan mencegah kejadian serupa di masa mendatang. Terima kasih atas kesabaran dan pengertian Anda, kami akan berupaya menyelesaikan masalah ini secepatnya.</p>
        </div>
    </div>

    <!-- Create Complaint Form -->
    <div class="complaint-box">
        <div>
            <h2 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;">
                Buat Keluhan
            </h2>
            <form action="{{ route('submit.complaint', strtolower($order->ordx_id)) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order->id }}">
            
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; color: #000000;" for="order-id">Order ID</label>
                    <input style="width: 100%; border: 1px solid #d1d5db; padding: 0.5rem; border-radius: 0.25rem;" id="order-id" value="{{ $order->ordx_id }}" readonly type="text"/>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; color: #000000;" for="title">Judul</label>
                    <input style="width: 100%; border: 1px solid #d1d5db; padding: 0.5rem; border-radius: 0.25rem;" id="title" name="title" placeholder="Tulis Judul" type="text"/>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; color: #000000;" for="image">Gambar</label>
                    <input style="width: 100%; border: 1px solid #d1d5db; padding: 0.5rem; border-radius: 0.25rem;" id="image" name="image" type="file"/>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; color: #000000;" for="description">Deskripsi</label>
                    <textarea style="width: 100%; border: 1px solid #d1d5db; padding: 0.5rem; border-radius: 0.25rem;" id="description" name="description" placeholder="Tulis Deskripsi"></textarea>
                </div>
                <div style="display: flex; justify-content: flex-end; margin-top: 1rem;">
                    <button style="background-color: #1e3a8a; color: #ffffff; padding: 0.5rem 1rem; border-radius: 0.25rem;" type="submit">
                        Kirim
                    </button>                
                </div>
            </form>
        </div>
    </div>    
</section>
@endsection
