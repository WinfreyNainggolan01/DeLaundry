@extends('student.layout.main')

@section('head')
    <title>Payment Details | DeLaundry</title>
@endsection

@section('content')
    <main class="payment-detail-page">
        <div class="payment-header" style="margin-left: 30px; margin-bottom: 20px;">
            <h1 style="font-size: 24px; font-weight: bold;">{{ $finance->month }} PEMBAYARAN</h1>
        </div>

        <!-- Payment Info Section -->
        <div style="display: flex; justify-content: flex-end; margin-bottom: 15px; margin-left: 80px;">
            <div style="font-weight: bold; width: 200px; text-align: right;">Total :</div>
            <div style="flex: 1; padding: 5px 10px; margin-left: 10px;">Rp. {{ number_format($finance->total_amount, 0, ',', '.') }}</div>
        </div>
        <div style="display: flex; justify-content: flex-end; margin-bottom: 15px; margin-left: 80px;">
            <div style="font-weight: bold; width: 200px; text-align: right;">Status :</div>
            <div style="flex: 1; padding: 5px 10px; margin-left: 10px;">{{ $finance->status }}</div>
        </div>
        <div style="display: flex; justify-content: flex-end; margin-bottom: 15px; margin-left: 80px;">
            <div style="font-weight: bold; width: 200px; text-align: right;">Selesai :</div>
            <div style="flex: 1; padding: 5px 10px; margin-left: 10px;">{{ $finance->completed_at->format('Y-m-d') }}</div>
        </div>

        <!-- First Payment Details Container -->
        <div style="background-color: rgba(249, 249, 249, 0.8); padding: 20px; border-radius: 8px; max-width: 1400px; margin: 20px auto; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
            <div style="display: flex; justify-content: flex-end; margin-bottom: 15px;">
                <div style="font-weight: bold; width: 200px; text-align: right;">Nomor Orderan :</div>
                <div style="flex: 1; padding: 5px 10px; margin-left: 10px;">{{ $finance->order_id }}</div>
            </div>

            <div style="display: flex; justify-content: flex-end; margin-bottom: 15px;">
                <div style="font-weight: bold; width: 200px; text-align: right;">Date :</div>
                <div style="flex: 1; padding: 5px 10px; margin-left: 10px;">{{ $finance->date_at->format('Y-m-d') }}</div>
            </div>

            <div style="display: flex; justify-content: flex-end; margin-bottom: 15px;">
                <div style="font-weight: bold; width: 200px; text-align: right;">Total Price :</div>
                <div style="flex: 1; padding: 5px 10px; margin-left: 10px;">Rp. {{ number_format($finance->total_amount, 0, ',', '.') }}</div>
            </div>

            <div style="display: flex; justify-content: flex-end; margin-bottom: 15px;">
                <div style="font-weight: bold; width: 200px; text-align: right;">Total Weight :</div>
                <div style="flex: 1; padding: 5px 10px; margin-left: 10px;">{{ $finance->total_weight }} kg</div>
            </div>
        </div>

    </main>
@endsection
