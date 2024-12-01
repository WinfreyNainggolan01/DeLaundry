@extends('admin.layout.main')

@section('head')
    <title>Order | Admin - DeLaundry</title>
@endsection

@section('content')
    <div id="detailModal" class="fixed inset-0 z-50 hidden bg-gray-500 bg-opacity-75 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-4xl w-full">
            <div class="modal-header flex justify-between items-center mb-4">
                <h5 class="text-xl font-bold text-gray-900">Detail Order</h5>
                <button onclick="closeModal('detailModal')" class="text-gray-600 hover:text-gray-900">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>                                  
            <div class="modal-body mb-4">
                <div class="flex flex-col gap-3 mb-3">
                    <div class="flex items-center gap-4">
                        <label for="orderNumber" class="text-base font-medium text-black w-32">Order Number:</label>
                        <input type="text" id="orderNumber" value="{{ $order->order_id }}" readonly class="block w-96 px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-800"/>
                    </div>
                    <div class="flex items-center gap-4">
                        <label for="customerName" class="text-base font-medium text-black w-32">Customer:</label>
                        <input type="text" id="customerName" value="{{ $order->student->name }}" readonly class="block w-96 px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-800"/>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="itemDetails" class="block text-base font-medium text-black">Items Detail</label>
                </div>
                <table class="min-w-lg table-auto border border-gray-300 w-[80%] mx-auto">
                    <thead class="bg-blue-900 text-white">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium border border-gray-700">Items</th>
                            <th class="px-4 py-2 text-left text-sm font-medium border border-gray-700">Quantity</th>
                            <th class="px-4 py-2 text-left text-sm font-medium border border-gray-700">Note</th>
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
