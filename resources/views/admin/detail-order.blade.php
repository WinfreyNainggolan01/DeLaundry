@extends('admin.layout.main')

@section('head')
    <title>Order | Admin - DeLaundry</title>
@endsection

@section('content')
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