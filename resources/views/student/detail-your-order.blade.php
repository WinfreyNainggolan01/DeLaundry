@extends('student.layout.main')

@section('head')
    <title>Detail | DeLaundry</title>
@endsection

@section('content')
<main>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6 border-b-2 pb-2">
                <p class="text-lg font-semibold text-gray-900">
                    <span>Order ID:</span> 
                    <span class="text-gray-900 font-bold">{{ $order->ordx_id }}</span>
                </p>
                <p class="text-sm text-gray-600">
                    <span>Tanggal:</span> 
                    <span class="font-medium">{{ $order->date_at }}</span>
                </p>
            </div>
            <div class="table-container overflow-x-auto bg-gray-50 p-6 rounded-lg shadow-md">
                <table class="w-full table-auto border-collapse border border-gray-200">
                    <thead class="bg-dark-blue text-white">
                        <tr>
                            <th class="px-4 py-2 text-left border">No</th>
                            <th class="px-4 py-2 text-left border">Nama Barang</th>
                            <th class="px-4 py-2 text-left border">Jumlah</th>
                            <th class="px-4 py-2 text-left border">Catatan</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($items as $index => $item)
                            <tr class="border-t odd:bg-gray-50 even:bg-white hover:bg-blue-50">
                                <td class="px-4 py-2 border text-left">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border text-left">{{ ucfirst(strtolower($item['name'] ?? '-')) }}</td>
                                <td class="px-4 py-2 border text-left">{{ $item['quantity'] ?? 0 }}</td>
                                <td class="px-4 py-2 border text-left">{{ $item['note'] ?? '-' }}</td>
                            </tr>
                        @endforeach
                        @if (empty($items))
                            <tr>
                                <td colspan="4" class="px-4 py-2 text-center text-gray-500">
                                    Tidak ada barang yang ditemukan untuk pesanan ini.
                                </td>
                            </tr>
                        @endif
                        </tbody>                                        
                </table>
            </div>
            <!-- Tombol Back -->
            <div class="mt-4">
                <a href="{{ route('your.order') }}" class="bg-gray-600 text-white py-2 px-4 rounded">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</main>
@endsection
