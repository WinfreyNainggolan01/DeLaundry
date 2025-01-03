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
                    <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-primary/25 ">
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
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order ID</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order By</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Weight</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order Date</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase"></th>
                                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $order->ordx_id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $order->student->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $order->weight }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $order->created_at->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-left">
                                            {{ \App\Models\Order::statusToValue($order->status) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <a class="text-primary hover:text-sky-700" href="{{ route('admin.order.detail', ['ordx_id' => strtolower($order->ordx_id)]) }}">
                                                <img src="{{ asset('img/eye.svg') }}" alt="Lihat Detail">
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <a href="{{ route('admin_order_edit', ['ordx_id' => strtolower($order->ordx_id)]) }}" class="text-primary hover:text-sky-700">
                                                <img src="{{ asset('img/pencil-square.svg') }}" alt="Edit Order">
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection