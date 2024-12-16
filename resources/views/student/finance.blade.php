@extends('student.layout.main')

@section('head')
    <title>Keuangan | DeLaundry</title>
@endsection

@section('content')
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Kata Pengantar -->
        <p class="mb-6">
            Berikut adalah tagihan Anda untuk bulan ini. Mohon untuk memeriksa detail yang tercantum dengan teliti 
            untuk memastikan semuanya sudah benar. Apabila terdapat ketidaksesuaian atau Anda memerlukan bantuan 
            lebih lanjut, silakan hubungi tim dukungan kami. Harap diperhatikan bahwa tagihan ini akan dikirimkan 
            ke bagian keuangan untuk diproses bulan depan. Pastikan untuk menyelesaikan pembayaran sebelum batas waktu 
            agar terhindar dari denda keterlambatan.
        </p>

        <!-- Tagihan Bulan Ini -->
        @if($currentBillOrders->isNotEmpty())
        <section class="current-bill mb-8">
<<<<<<< Updated upstream
            <div class="bg-white shadow rounded p-6"> 
                <h2 class="text-2xl font-semibold">Current Bill</h2>
                <div class="bg-white shadow rounded p-4">
                    <table class="w-full">
                        <tbody>
                            <tr>
                                <td class="font-bold">Order Number</td>
                                <td>{{ $finance->order_id }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Date</td>
                                <td>{{ $finance->date_at->format('Y-m-d') }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Dormitory</td>
                                <td>{{ $finance->student->dormitory }}</td> <!-- assuming 'dormitory' is a field in student model -->
                            </tr>
                            <tr>
                                <td class="font-bold">Total Weight</td>
                                <td>{{ $finance->total_weight }} kg</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Total Price</td>
                                <td>Rp. {{ number_format($finance->total_amount, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
=======
            <div class="bg-white shadow rounded p-6">
                <h2 class="text-2xl font-semibold mb-4">Tagihan Bulan Ini</h2>
                @foreach($currentBillOrders as $order)
                <div class="bg-gray-50 shadow-sm rounded p-4 mb-4">
                    <div class="flex justify-between py-2">
                        <div class="font-bold">Nomor Pesanan</div>
                        <div>{{ $order->ordx_id }}</div>
                    </div>
                    <div class="flex justify-between py-2">
                        <div class="font-bold">Tanggal</div>
                        <div>{{ $order->date_at->format('Y-m-d') }}</div>
                    </div>
                    <div class="flex justify-between py-2">
                        <div class="font-bold">Total Berat</div>
                        <div>{{ $order->weight }} kg</div>
                    </div>
                    <div class="flex justify-between py-2">
                        <div class="font-bold">Total Harga</div>
                        <div>Rp. {{ number_format($order->price, 0, ',', '.') }}</div>
                    </div>
>>>>>>> Stashed changes
                </div>
                @endforeach
            </div>
        </section>
        @else
        <p class="mb-8">Tidak ada tagihan bulan ini.</p>
        @endif

        <!-- Total Tagihan -->
        <div class="total mb-8 text-right">
            <h2 class="text-xl font-bold">Total:</h2>
<<<<<<< Updated upstream
            <p class="text-lg">Rp. {{ number_format($finance->total_amount, 0, ',', '.') }}</p>
=======
            <p class="text-lg">Rp. {{ number_format($totalAmount, 0, ',', '.') }}</p>
>>>>>>> Stashed changes
        </div>

        <!-- Riwayat Tagihan -->
        <section class="history">
            <div class="bg-white rounded-lg p-4 shadow-md">
                <h2 class="text-lg font-bold mb-4">Riwayat Tagihan</h2>
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-[#003366] text-white">
                        <tr>
                            <th class="border-b p-2 rounded-tl-lg text-left">Bulan</th>
                            <th class="border-b p-2 text-left">Total</th>
                            <th class="border-b p-2 text-left">Status</th>
                            <th class="border-b p-2 rounded-tr-lg text-left">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
<<<<<<< Updated upstream
                        @foreach($finances as $financeHistory)
                        <tr>
                            <td class="border-b p-2">{{ $financeHistory->month }}</td>
                            <td class="border-b p-2">Rp. {{ number_format($financeHistory->total_amount, 0, ',', '.') }}</td>
                            <td class="border-b p-2">{{ $financeHistory->status }}</td> <!-- Assuming 'status' is available in 'financeHistory' -->
                            <td class="border-b p-2">
                                <a href="{{ route('detail.finance', ['id' => $financeHistory->id]) }}" class="bg-[#003366] text-white py-1 px-3 rounded hover:bg-[#002244]">VIEW</a>
=======
                        @foreach($bills as $bill)
                        <tr>
                            <td class="border-b p-2">{{ \Carbon\Carbon::parse($bill->month . '-01')->translatedFormat('F') }}</td>
                            <td class="border-b p-2">Rp. {{ number_format($bill->total_amount, 0, ',', '.') }}</td>
                            <td class="border-b p-2">{{ ucfirst($bill->status) }}</td>
                            <td class="border-b p-2">
                                <a href="{{ route('detail.finance', ['id' => $bill->id]) }}" class="bg-[#003366] text-white py-1 px-3 rounded hover:bg-[#002244]">LIHAT</a>
>>>>>>> Stashed changes
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</main>
@endsection
