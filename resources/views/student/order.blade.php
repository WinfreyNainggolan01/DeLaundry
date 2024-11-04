@extends('student.layout.main')

@section('head')
    <title>Order | DeLaundry</title>
@endsection

@section('content')
<main class="container mx-auto px-4 py-8">
    <section class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Fill Your Items</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <form action="{{ route('add.item') }}" method="POST" class="w-full mb-8">
                @csrf
                <div class="mb-4">
                    <label for="name-item" class="block text-gray-700 font-bold mb-2">Name Item <span class="text-red-700">*</span></label>
                    <input type="text" id="name-item" name="name-item" class="w-full px-3 py-2 border rounded" placeholder="Write name item" autocomplete="off">
                    @error('name-item') <span class="text-red-700">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="quantity" class="block text-gray-700 font-bold mb-2">Quantity <span class="text-red-700">*</span></label>
                    <input type="text" id="quantity" name="quantity" class="w-full px-3 py-2 border rounded" placeholder="Write quantity of the item" autocomplete="off">
                    @error('quantity') <span class="text-red-700">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="note" class="block text-gray-700 font-bold mb-2">Note</label>
                    <textarea id="note" name="note" rows="5" class="w-full px-3 py-2 border rounded" placeholder="Write the note"></textarea>
                </div>
                <div class="mt-8 flex justify-center space-x-4">
                    <button type="submit" class="bg-sky-700 text-white px-4 py-2 rounded-lg">Add Item</button>
                    <button type="button" onclick="submitOrder()" class="bg-sky-700 text-white px-4 py-2 rounded-lg">Done</button>
                </div>
            </form>
        </div>

        <div class="mt-8">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-dark-blue text-white">
                        <th class="py-2 px-4 border">Items</th>
                        <th class="py-2 px-4 border">Quantity</th>
                        <th class="py-2 px-4 border">Note</th>
                        <th class="py-2 px-4 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }}">
                            <td class="py-2 px-4 border">{{ $item->name }}</td>
                            <td class="py-2 px-4 border">{{ $item->quantity }}</td>
                            <td class="py-2 px-4 border">{{ $item->note ?? '-' }}</td>
                            <td class="py-2 px-4 border">
                                <button onclick="openEditModal({{ $item->id }}, '{{ $item->name }}', '{{ $item->quantity }}', '{{ $item->note }}')" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Edit Item</button>
                                <button onclick="openDeleteModal({{ $item->id }})" class="bg-red-500 text-white px-4 py-2 rounded-lg">Delete Item</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</main>

<!-- Modal Edit Item -->
<div id="editItemModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-8 rounded-lg w-1/3">
        <h2 class="text-xl font-bold mb-4">Edit Item</h2>
        <form id="editItemForm" method="POST" action="{{ route('edit.item', ['id' => 0]) }}">
            @csrf
            <input type="hidden" name="id" id="editItemId">
            <div class="mb-4">
                <label for="editItemName" class="block text-gray-700 font-bold mb-2">Name</label>
                <input type="text" id="editItemName" name="name-item" class="w-full px-3 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="editItemQuantity" class="block text-gray-700 font-bold mb-2">Quantity</label>
                <input type="text" id="editItemQuantity" name="quantity" class="w-full px-3 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="editItemNote" class="block text-gray-700 font-bold mb-2">Note</label>
                <textarea id="editItemNote" name="note" rows="3" class="w-full px-3 py-2 border rounded"></textarea>
            </div>
            <div class="mt-6 flex justify-end space-x-4">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 rounded-lg bg-red-500 text-white">Cancel</button>
                <button type="submit" class="px-4 py-2 rounded-lg bg-sky-700 text-white">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Delete Item -->
<div id="deleteItemModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-8 rounded-lg w-1/3">
        <h2 class="text-xl font-bold mb-4">Delete Item</h2>
        <p>Are you sure to delete the item?</p>
        <form id="deleteItemForm" method="POST" action="{{ route('delete.item', ['id' => 0]) }}">
            @csrf
            <div class="mt-6 flex justify-end space-x-4">
                <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 rounded-lg bg-sky-700 text-white">Cancel</button>
                <button type="submit" class="px-4 py-2 rounded-lg bg-red-500 text-white">Delete</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(id, name, quantity, note) {
        const modal = document.getElementById('editItemModal');
        const form = document.getElementById('editItemForm');
        
        document.getElementById('editItemId').value = id;
        document.getElementById('editItemName').value = name;
        document.getElementById('editItemQuantity').value = quantity;
        document.getElementById('editItemNote').value = note;

        form.action = `/order/edit/${id}`;
        modal.classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editItemModal').classList.add('hidden');
    }

    function openDeleteModal(id) {
        const modal = document.getElementById('deleteItemModal');
        const form = document.getElementById('deleteItemForm');
        
        form.action = `/order/delete/${id}`;
        modal.classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteItemModal').classList.add('hidden');
    }
</script>
@endsection
