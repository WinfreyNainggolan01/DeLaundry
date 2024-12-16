@extends('admin.layout.main')

@section('head')
    <title>Order | Admin - DeLaundry</title>
@endsection

@section('content')
<<<<<<< Updated upstream
    <div id="detailModal" class="fixed inset-0 z-50 hidden bg-gray-500 bg-opacity-75 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-4xl w-full">
            <div class="modal-header flex justify-between items-center mb-4">
                <h5 class="text-xl font-bold text-gray-900">Detail Pesanan</h5>
                <button onclick="closeModal('detailModal')" class="text-gray-600 hover:text-gray-900">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>                                  
            <div class="modal-body mb-4">
                <div class="flex flex-col gap-3 mb-3">
                    <div class="flex items-center gap-4">
                        <label for="orderNumber" class="text-base font-medium text-black w-32">Nomor Pesanan:</label>
                        <input type="text" id="orderNumber" value="{{ $order->order_id }}" readonly class="block w-96 px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-800"/>
                    </div>
                    <div class="flex items-center gap-4">
                        <label for="customerName" class="text-base font-medium text-black w-32">Pelanggan:</label>
                        <input type="text" id="customerName" value="{{ $order->student->name }}" readonly class="block w-96 px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-800"/>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="itemDetails" class="block text-base font-medium text-black">Detail Item</label>
                </div>
                <table class="min-w-lg table-auto border border-gray-300 w-[80%] mx-auto">
                    <thead class="bg-blue-900 text-white">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium border border-gray-700">Item</th>
                            <th class="px-4 py-2 text-left text-sm font-medium border border-gray-700">Jumlah</th>
                            <th class="px-4 py-2 text-left text-sm font-medium border border-gray-700">Catatan</th>
                        </tr>
                    </thead>
                    <tbody id="itemDetailsBody">
                        @foreach ($items as $item) <!-- Corrected here -->
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-900 border border-gray-300">{{ $item->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900 border border-gray-300">{{ $item->quantity }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900 border border-gray-300">{{ $item->note ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>               
            </div>
            <div class="flex justify-end"> 
                <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md" onclick="closeModal('detailModal')">Close</button>
            </div>
        </div>
    </div>
@endsection
=======
<div class="bg-gray-100 flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-4xl w-full">
        <h1 class="text-2xl font-bold mb-6">
            Detail Order
        </h1>
        <div class="flex flex-col md:flex-row">
            
            <div class="md:w-1/2 md:pl-8">
                <div class="mb-4">
                    <h2 class="font-semibold">
                        Order ID
                    </h2>
                    <p class="text-blue-600">
                        {{ $order->ordx_id }}
                    </p>
                </div>
                <div class="mb-4">
                    <h2 class="font-semibold">
                        Tanggal
                    </h2>
                    <p class="text-blue-600">
                        {{ $order->date_at }}
                    </p>
                </div>
                <div class="mb-4">
                    <h2 class="font-semibold">
                        Total Item
                    </h2>
                    <p class="text-blue-600">
                        {{ $total_quantity }}
                    </p>
                </div>
                <div class="mb-4">
                    <h2 class="font-semibold">
                        Weight
                    </h2>
                    <p class="text-blue-600">
                        {{ $order->weight ? $order->weight . ' Kg' : '-' }}
                    </p>
                </div>
                <div class="mb-4">
                    <h2 class="font-semibold">
                        Total Harga
                    </h2>
                    <p class="text-blue-600">
                        {{ $order->price ? 'Rp. ' . number_format($order->price) : '-' }} 
                    </p>
                </div>
            </div>
        </div>
        <div class="mt-6">
            <h2 class="font-semibold mb-2">
                List Items
            </h2>
            
        </div>
        <div class="table-container overflow-x-auto bg-gray-50 p-6 rounded-lg shadow-md">
            <table class="w-full table-auto border-collapse border border-gray-200">
                <thead class="bg-dark-blue text-white">
                    <tr>
                        <th class="px-4 py-2 text-left border">No</th>
                        <th class="px-4 py-2 text-left border">Item Name</th>
                        <th class="px-4 py-2 text-left border">Quantity</th>
                        <th class="px-4 py-2 text-left border">Note</th>
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
                                No items found for this order.
                            </td>
                        </tr>
                    @endif
                    </tbody>                                        
            </table>
        </div>
        <div class="mt-4">
            <a href="{{ route('admin_order') }}" class="bg-gray-600 text-white py-2 px-4 rounded">
                Back
            </a>
        </div>
    </div>
</div>
@endsection
>>>>>>> Stashed changes
