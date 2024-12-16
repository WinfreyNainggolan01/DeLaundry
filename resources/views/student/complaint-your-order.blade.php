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
                Report an Issue with Your Laundry
            </h2>
            <p style="color: #000000; margin-bottom: 1rem;">
                Kami memahami bahwa kendala mungkin terjadi dalam layanan laundry kami, dan kami mohon maaf yang sebesar-besarnya jika ada pakaian Anda yang mengalami kerusakan selama proses pencucian. Kepuasan Anda adalah prioritas utama kami, dan kami berkomitmen untuk menindaklanjuti serta menyelesaikan setiap permasalahan dengan sebaik-baiknya. Kami pastikan setiap keluhan akan ditangani dengan serius demi memberikan pelayanan terbaik untuk Anda.
            </p>    
            <p style="color: #000000;">
                Masukan Anda sangat berharga bagi kami untuk terus meningkatkan kualitas layanan dan mencegah kejadian serupa di masa mendatang. Terima kasih atas kesabaran dan pengertian Anda selagi kami berupaya menyelesaikan permasalahan ini dengan cepat dan tepat.
            </p>
        </div>
    </div>

    <!-- Create Complaint Form -->
    <div class="complaint-box">
        <div>
            <h2 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;">
                Buat Complaint
            </h2>
            <form action="{{ route('submit.complaint', strtolower($order->ordx_id)) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order->id }}">
            
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; color: #000000;" for="order-id">Order ID</label>
                    <input style="width: 100%; border: 1px solid #d1d5db; padding: 0.5rem; border-radius: 0.25rem;" id="order-id" value="{{ $order->ordx_id }}" readonly type="text"/>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; color: #000000;" for="title">Title</label>
                    <input style="width: 100%; border: 1px solid #d1d5db; padding: 0.5rem; border-radius: 0.25rem;" id="title" name="title" placeholder="Write a Title" type="text"/>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; color: #000000;" for="image">Image</label>
                    <input style="width: 100%; border: 1px solid #d1d5db; padding: 0.5rem; border-radius: 0.25rem;" id="image" name="image" type="file" accept="image/*"/>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; color: #000000;" for="description">Description</label>
                    <textarea style="width: 100%; border: 1px solid #d1d5db; padding: 0.5rem; border-radius: 0.25rem;" id="description" name="description" placeholder="Write a description"></textarea>
                </div>
                <div class="flex justify-end mt-4">
                    <button class="bg-sky-800 hover:bg-blue-600 text-white py-2 px-4 rounded" type="submit">
                        Send
                    </button>                
                </div>
            </form>
        </div>
    </div>    
</section>
@endsection
