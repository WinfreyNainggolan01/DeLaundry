@extends('student.layout.main')

@section('head')
    <title>Order Summary | DeLaundry</title>
@endsection

@section('content')

<main class="container mx-auto mt-8">
    <div class="bg-white shadow-md rounded-lg p-8 mt-4">
        <h2 class="text-2xl font-semibold mb-4">
            Order Details
        </h2>
        <p class="text-gray-500 mb-4">
            View itemized laundry details for your order below.
        </p>

        <!-- Order Information Table -->
        <h3 class="text-xl font-semibold mb-2">Order Information</h3>
        <table class="w-full table-auto border-collapse mb-6">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="py-2 px-4 text-left border">Field</th>
                    <th class="py-2 px-4 text-left border">Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2 px-4 border">Order Number</td>
                    <td class="py-2 px-4 border">{{ $order->ordx_id }}</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border">Customer</td>
                    <td class="py-2 px-4 border">{{ ucfirst(strtolower(auth()->guard('student')->user()->name)) }}</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border">Date</td>
                    <td class="py-2 px-4 border">{{ $order->date_at }}</td>
                </tr>
            </tbody>            
        </table>

        <!-- Item Details Table -->
        <h3 class="text-xl font-semibold mb-2">Item Details</h3>
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-dark-blue text-white">
                    <th class="py-2 px-4 border">Item</th>
                    <th class="py-2 px-4 border">Quantity</th>
                    <th class="py-2 px-4 border">Note</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td class="py-2 px-4 border">{{ isset($item['name']) ? ucwords(strtolower($item['name'])) : '-' }}</td>
                        <td class="py-2 px-4 border">{{ $item['quantity'] }}</td>
                        <td class="py-2 px-4 border">
                            @if($item['note'])
                                <small>{{ $item['note'] }}</small>
                            @else
                                - 
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Navigation -->
        <div class="mt-4">
            <a href="{{ route('homepage') }}" class="bg-gray-600 text-white py-2 px-4 rounded">
                Back
            </a>
        </div>
    </div>
</main>

@endsection
