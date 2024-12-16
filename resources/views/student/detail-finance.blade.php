@extends('student.layout.main')

@section('head')
    <title>Payment Details | DeLaundry</title>
@endsection

@section('content')
<<<<<<< Updated upstream
    <main class="payment-detail-page">
        <div class="payment-header" style="margin-left: 30px; margin-bottom: 20px;">
            <h1 style="font-size: 24px; font-weight: bold;">{{ $finance->month }} PAYMENT</h1>
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
            <div style="font-weight: bold; width: 200px; text-align: right;">Completed on :</div>
            <div style="flex: 1; padding: 5px 10px; margin-left: 10px;">{{ $finance->completed_at->format('Y-m-d') }}</div>
        </div>

        <!-- First Payment Details Container -->
        <div style="background-color: rgba(249, 249, 249, 0.8); padding: 20px; border-radius: 8px; max-width: 1400px; margin: 20px auto; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
            <div style="display: flex; justify-content: flex-end; margin-bottom: 15px;">
                <div style="font-weight: bold; width: 200px; text-align: right;">Order Number :</div>
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
=======
<main class="container mx-auto mt-6 px-6">
    <div class="bg-white p-6 rounded-b-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">
            {{ \Carbon\Carbon::parse($billDetail->month . '-01')->format('F Y') }}
        </h2>
        <div class="mb-6">
            <div class="flex justify-between mb-2">
                <span>Total</span>
                <span>Rp. {{ number_format($billDetail->total_amount, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between mb-2">
                <span>Status</span>
                <span>{{ ucfirst($billDetail->status) }}</span>
            </div>
            <div class="flex justify-between mb-2">
                <span>Completed on</span>
                <span>
                    @if($billDetail->status === 'Paid')
                        {{ \Carbon\Carbon::parse($billDetail->updated_at)->format('d F Y') }}
                    @else
                        -
                    @endif
                </span>
            </div>
        </div>
        
        <div class="space-y-4">
            @foreach ($orders as $order)
            <div class="bg-gray-100 p-4 rounded-lg">
                <div class="flex justify-between mb-2">
                    <span>Order Number</span>
                    <span>{{ $order->ordx_id }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span>Date</span>
                    <span>{{ $order->date_at->format('Y-m-d') }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span>Dormitory</span>
                    <span>{{ $order->student->dormitory->name }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span>Total Price</span>
                    <span>Rp. {{ number_format($order->price, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span>Total Weight</span>
                    <span>{{ $order->weight }} kg</span>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="mt-6 text-right">
            <a href="{{ route('finance') }}" class="bg-blue-900 text-white py-2 px-4 rounded-lg">Back</a>
        </div>
    </div>
</main>
@endsection
>>>>>>> Stashed changes
