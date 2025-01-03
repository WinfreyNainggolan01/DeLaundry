@extends('student.layout.main')

@section('head')
    <title>Order | DeLaundry</title>
@endsection

@section('content')
<main class="container mx-auto px-4 py-8">
    <section class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Fill Your Items</h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
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
                </div>
            </form>

            {{-- Right Section --}}
            <div class="relative text-white hidden lg:block">
                <img class="absolute inset-0 bg-no-repeat bg-cover bg-center opacity-50 scale-85 -my-24" src="{{ asset('img/order-item.svg') }}" alt="insert item">
            </div>
        </div>

        <div class="mt-8">
            <table class="w-full border-collapse mb-6">
                <thead>
                    <tr class="bg-dark-blue text-white">
                        <th class="py-2 px-4 border">Items</th>
                        <th class="py-2 px-4 border">Quantity</th>
                        <th class="py-2 px-4 border">Note</th>
                        <th class="py-2 px-4 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }}">
                            <td class="py-2 px-4 border">{{ $item->name }}</td>
                            <td class="py-2 px-4 border">{{ $item->quantity }}</td>
                            <td class="py-2 px-4 border">{{ $item->note ?? '-' }}</td>
                            <td class="py-2 px-4 border">
                                <button onclick="openEditModal({{ $item->id }}, '{{ $item->name }}', '{{ $item->quantity }}', '{{ $item->note }}')" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Edit Item</button>
                                <button onclick="openDeleteModal({{ $item->id }})" class="bg-red-500 text-white px-4 py-2 rounded-lg">Delete Item</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-2 px-4 text-center text-gray-500">No items added yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <form action="{{ route('order.done') }}" method="POST" onsubmit="return validateOrder()">
                @csrf
                <div class="flex justify-center mt-4">
                    <button type="submit" class="bg-sky-700 text-white px-6 py-3 rounded-lg">Done</button>
                </div>
            </form>
        </div>
    </section>
</main>

<!-- Modal Edit Item -->
<div id="editItemModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg w-full">
        <h3 class="text-2xl font-bold mb-4">Edit Item</h3>
        <form id="editItemForm" method="POST">
            @csrf
            @method('POST')
            <input type="hidden" name="id" id="editItemId">
            <div class="mb-4">
                <label for="editItemName" class="block text-gray-700 font-bold mb-2">Name Item</label>
                <input type="text" id="editItemName" name="name-item" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="editItemQuantity" class="block text-gray-700 font-bold mb-2">Quantity</label>
                <input type="number" id="editItemQuantity" name="quantity" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="editItemNote" class="block text-gray-700 font-bold mb-2">Note</label>
                <textarea id="editItemNote" name="note" rows="5" class="w-full px-3 py-2 border rounded"></textarea>
            </div>
            <div class="flex justify-end space-x-4">
                <button type="button" onclick="closeEditModal()" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Cancel</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Delete Item -->
<div id="deleteItemModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg w-full">
        <h3 class="text-2xl font-bold mb-4">Delete Item</h3>
        <p class="mb-4">Are you sure you want to delete this item?</p>
        <form id="deleteItemForm" method="POST">
            @csrf
            @method('POST')
            <div class="flex justify-end space-x-4">
                <button type="button" onclick="closeDeleteModal()" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Cancel</button>
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg">Delete</button>
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

    function validateOrder() {
        const items = @json($items);
        if (items.length === 0) {
            alert('Please add at least one item to proceed.');
            return false;
        }
        return true;
    }
</script>
@endsection