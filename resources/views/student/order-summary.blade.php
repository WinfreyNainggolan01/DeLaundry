@extends('student.layout.main')

@section('head')
    <title>Order Summary | DeLaundry</title>
@endsection

@section('content')

<main class="container mx-auto mt-8">
    <div class="bg-blue-900 text-white text-4xl font-bold py-4 px-4 text-center">
        ORDER SUMMARY
    </div>
    <div class="bg-white shadow-md rounded-lg p-8 mt-4">
        <h2 class="text-2xl font-semibold mb-2">
            Order Details
        </h2>
        <p class="text-gray-500 mb-4">
            View itemized laundry details for your order below.
        </p>

        <!-- Order Information -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">
                Order Number
            </label>
            <input class="w-full border border-gray-300 rounded-md p-2 mt-1 bg-gray-100" readonly type="text" value="{{ $order->ordx_id }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">
                Customer
            </label>
            <input class="w-full border border-gray-300 rounded-md p-2 mt-1 bg-gray-100" readonly type="text" value="{{ auth()->guard('student')->user()->name }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">
                Date
            </label>
            <input class="w-full border border-gray-300 rounded-md p-2 mt-1 bg-gray-100" readonly type="text" value="{{ $order->date_at }}">
        </div>

        <!-- Item Details -->
        <h3 class="text-xl font-semibold mb-2">
            Item Details
        </h3>
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-blue-900 text-white">
                    <th class="py-2 px-4 border">Items</th>
                    <th class="py-2 px-4 border">Quantity</th>
                    <th class="py-2 px-4 border">Note</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }}">
                        <td class="border py-2 px-4">{{ $item['name'] }}</td>
                        <td class="border py-2 px-4">{{ $item['quantity'] }}</td>
                        <td class="border py-2 px-4">{{ $item['note'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Navigation -->
        <div class="mt-4">
            <a href="{{ route('order') }}" class="bg-blue-900 text-white py-2 px-4 rounded">
                Back to Orders
            </a>
        </div>
    </div>
</main>

@endsection
