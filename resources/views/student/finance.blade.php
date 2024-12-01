@extends('student.layout.main')

@section('head')
    <title>Finance | DeLaundry</title>
@endsection

@section('content')
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-6">Berikut adalah tagihan Anda untuk bulan ini. Harap luangkan waktu untuk memeriksa rinciannya dan memastikan semuanya akurat. Periksa barang yang tercantum untuk menghindari ketidaksesuaian. Jika membutuhkan bantuan atau klarifikasi, hubungi tim dukungan kami. Tagihan Anda akan diproses oleh pihak keuangan bulan depan, jadi pastikan untuk meninjau dan melunasi tagihan sebelum batas waktu untuk menghindari biaya keterlambatan atau denda.</p>
        
        <!-- Current Bill -->
        <section class="current-bill mb-8">
            <div class="bg-white shadow rounded p-6"> 
                <h2 class="text-2xl font-semibold">Tagihan Saat Ini</h2>
                <div class="bg-white shadow rounded p-4">
                    <table class="w-full">
                        <tbody>
                            <tr>
                                <td class="font-bold">Nomor Orderan</td>
                                <td>{{ $finance->order_id }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Tanggal</td>
                                <td>{{ $finance->date_at->format('Y-m-d') }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Asrama</td>
                                <td>{{ $finance->student->dormitory }}</td> <!-- assuming 'dormitory' is a field in student model -->
                            </tr>
                            <tr>
                                <td class="font-bold">Total Berat</td>
                                <td>{{ $finance->total_weight }} kg</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Total Harga</td>
                                <td>Rp. {{ number_format($finance->total_amount, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- Total Between Current Bill and History -->
        <div class="total mb-8 text-right">
            <h2 class="text-xl font-bold">Total:</h2>
            <p class="text-lg">Rp. {{ number_format($finance->total_amount, 0, ',', '.') }}</p>
        </div>

        <!-- History Section -->
        <section class="history">
            <div class="bg-white rounded-lg p-4 shadow-md">
                <h2 class="text-lg font-bold mb-4">Riwayat</h2>
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-dark-blue text-white">
                        <tr>
                            <th class="border-b p-2 rounded-tl-lg text-left">Bulan</th>
                            <th class="border-b p-2 text-left">Total</th>
                            <th class="border-b p-2 text-left">Status</th>
                            <th class="border-b p-2 rounded-tr-lg text-left">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($finances as $financeHistory)
                        <tr>
                            <td class="border-b p-2">{{ $financeHistory->month }}</td>
                            <td class="border-b p-2">Rp. {{ number_format($financeHistory->total_amount, 0, ',', '.') }}</td>
                            <td class="border-b p-2">{{ $financeHistory->status }}</td> <!-- Assuming 'status' is available in 'financeHistory' -->
                            <td class="border-b p-2">
                                <a href="{{ route('detail.finance', ['id' => $financeHistory->id]) }}" class="bg-[#003366] text-white py-1 px-3 rounded hover:bg-[#002244]">Lihat Detail</a>
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
