<<<<<<< Updated upstream
@extends('admin.layout.main')

@section('head')
    <title>Order | Admin - DeLaundry</title>
@endsection

@section('content')
<main class="flex-grow p-6">
    <!-- Card Total -->
    <div class="grid lg:grid-cols-2 md:grid-cols-2 grid-cols-1 gap-6">
        <div class="card">
            <div class="p-5">
                <div class="flex justify-between">
                    <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-primary/25">
                        <img src="{{ asset('img/person.svg') }}" alt="person" class="h-10 w-auto">
                    </div>
                    <div class="text-right">
                        <h3 class="mt-1 text-2xl font-bold mb-5 text-gray-900">{{ $total_order }}</h3>
                        <p class="mb-1 truncate text-gray-900">Total Orders</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Orders -->
    <div class="flex flex-col align-self-center py-6">
        <div class="card">
            <div class="card-header">
                <div class="flex justify-between items-center">
                    <h4 class="card-title">Orders</h4>
                </div>
            </div>
            <div class="p-6 py-12">
                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <caption class="py-2 text-left text-sm text-gray-600 dark:text-gray-500">List of Orders</caption>
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order ID</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order By</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantity</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Weight</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order Date</th>
                                        <th class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Status</th>
                                        <th class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($orders as $order)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $order->ordx_id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $order->student->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $order->itemOrders->sum('quantity') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $order->itemOrders->sum('weight') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $order->created_at->format('d/m/Y') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <select data-id="{{ $order->id }}" class="statusSelect bg-gray-50 border rounded-md px-3 py-2">
                                                    <option value="submit" {{ $order->status == 'submit' ? 'selected' : '' }}>Order Received</option>
                                                    <option value="in_progress" {{ $order->status == 'in_progress' ? 'selected' : '' }}>Pick Up</option>
                                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>On Process</option>
                                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Delivery</option>
                                                    <option value="done" {{ $order->status == 'done' ? 'selected' : '' }}>Done</option>
                                                </select>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                <button class="text-primary hover:text-sky-700" onclick="openDetailModal({{ $order->id }})">
                                                    <img src="{{ asset('img/eye.svg') }}" alt="View Details">
                                                </button>
                                                <button class="text-primary hover:text-sky-700" onclick="openEditModal({{ $order->id }})">
                                                    <img src="{{ asset('img/pencil-square.svg') }}" alt="Edit">
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end table-->
    </div>
</main>

<!-- Modal untuk Detail -->
@include('admin.partials.modals.detail')

<!-- Modal untuk Edit Order -->
@include('admin.partials.modals.edit')

<script>
    // Handle Status Change Dynamically
    document.querySelectorAll('.statusSelect').forEach(select => {
        select.addEventListener('change', function () {
            const orderId = this.dataset.id;
            const newStatus = this.value;

            // AJAX request to update status
            fetch(`/orders/${orderId}/status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ status: newStatus })
            }).then(response => response.json())
              .then(data => {
                  alert('Order status updated successfully!');
              }).catch(error => {
                  console.error('Error:', error);
                  alert('Failed to update status.');
              });
        });
    });
</script>
@endsection
=======
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
>>>>>>> Stashed changes
