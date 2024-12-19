<div class="bg-white p-8 rounded-lg w-1/3">
    <h2 class="text-xl font-bold mb-4">Edit Profile</h2>
    <form method="POST" action="{{ route('edit.profile') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="weight" class="block text-gray-700 font-bold mb-2">Weight</label>
            <input type="text" id="weight" name="weight" value="{{ $order->weight }}" class="w-full px-3 py-2 border rounded">
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700 font-bold mb-2">Harga</label>
            <input type="text" id="price" name="price" value="{{ $order->price }}" class="w-full px-3 py-2 border rounded">
        </div>
        <div class="mb-4">
            <label for="profile_photo" class="block text-gray-700 font-bold mb-2">Status</label>
            <div class="relative z-10">
                <select class="btn border-gray-300 text-gray-900 h-10 rounded-md min-w-[180px] pl-3 pr-8 focus:outline-none focus:ring-2 focus:ring-blue-500 statusSelect" id="statusSelect-{{ $order->order_id }}">
                    <option value="submit" {{ $order->status == 'submit' ? 'selected' : '' }}>Order Received</option>
                    <option value="in_progress" {{ $order->status == 'in_progress' ? 'selected' : '' }}>Pick Up</option>
                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>On Process</option>
                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Delivery</option>
                    <option value="done" {{ $order->status == 'done' ? 'selected' : '' }}>Done</option>
                </select>
            </div>
        </div>
        <div class="mt-6 flex justify-end space-x-4">
            <button type="button"class="px-4 py-2 rounded-lg bg-gray-500 text-white">Cancel</button>
            <button type="submit" class="px-4 py-2 rounded-lg bg-sky-700 text-white">Save</button>
        </div>
    </form>
</div>