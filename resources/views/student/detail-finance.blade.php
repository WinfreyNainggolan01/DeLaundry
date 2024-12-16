@extends('student.layout.main')

@section('head')
    <title>Payment Details | DeLaundry</title>
@endsection

@section('content')
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