@extends('admin.layout.main')

@section('head')
    <title>Order | Admin - DeLaundry</title>
@endsection

@section('content')
<<<<<<< Updated upstream
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
=======
<div class="bg-gray-100 flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-4xl w-full">
        <h1 class="text-2xl font-bold mb-6">
            Edit Order
        </h1>
        <form method="POST" action="{{ route('admin_order_update', ['ordx_id' => $order->ordx_id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="weight" class="block text-gray-700 font-bold mb-2">Weight (Kg)</label>
                <input type="text" id="weight" name="weight" placeholder="Masukkan berat" value="{{ $order->weight }}" class="w-full px-3 py-2 border rounded" oninput="calculatePrice()">
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-bold mb-2">Harga (Rp.)</label>
                <input type="text" id="price" name="price" value="{{ 'Rp.'.$order->price }}" class="w-full px-3 py-2 border rounded" readonly>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-bold mb-2">Status</label>
                <div class="relative z-10">
                    <select class="btn border-gray-300 text-gray-900 h-10 rounded-md min-w-[180px] pl-3 pr-8 focus:outline-none focus:ring-2 focus:ring-blue-500 statusSelect" id="statusSelect-{{ $order->order_id }}" name="status">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="picked_up" {{ $order->status == 'picked_up' ? 'selected' : '' }}>Picked Up</option>
                        <option value="on_process" {{ $order->status == 'on_process' ? 'selected' : '' }}>On Process</option>
                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="done" {{ $order->status == 'done' ? 'selected' : '' }}>Done</option>
                    </select>
                </div>
            </div>
            <div class="mt-6 flex justify-end space-x-4">
                <a href="{{ route('admin_order') }}" class="px-4 py-2 rounded-lg bg-gray-500 text-white">Cancel</a>
                <button type="submit" class="px-4 py-2 rounded-lg bg-sky-700 text-white">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
    function calculatePrice() {
        var weight = document.getElementById('weight').value;
        var price = weight * 15000;
        document.getElementById('price').value = 'Rp.' + price;
    }
</script>
>>>>>>> Stashed changes
@endsection