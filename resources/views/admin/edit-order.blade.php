@extends('admin.layout.main')

@section('head')
    <title>Order | Admin - DeLaundry</title>
@endsection

@section('content')
<div id="editModal" class="fixed inset-0 z-50 hidden bg-gray-500 bg-opacity-75 flex justify-center items-center">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-4xl w-full">
        <div class="modal-header flex justify-between items-center mb-4">
            <h5 class="text-xl font-bold text-gray-900">Edit Order</h5>
            <button onclick="closeModal('editModal')" class="text-gray-600 hover:text-gray-900">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <div class="modal-body mb-4">
            <div class="flex flex-col gap-3 mb-3">
                <div class="flex items-center gap-4">
                    <label for="editOrderNumber" class="text-base font-medium text-black w-32">Nomor Pesanan:</label>
                    <input type="text" id="editOrderNumber" readonly class="block w-96 px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-800"/>
                </div>
                <div class="flex items-center gap-4">
                    <label for="editCustomerName" class="text-base font-medium text-black w-32">Pelanggan:</label>
                    <input type="text" id="editCustomerName" readonly class="block w-96 px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-800"/>
                </div>
            </div>
        </div>
        
        <div class="modal-footer flex justify-end">
            <button onclick="closeModal('editModal')" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md">Tutup</button>
            <button onclick="saveEditOrder()" class="bg-primary text-white px-4 py-2 rounded-md">Simpsn</button>
        </div>
    </div>
</div>
@endsection