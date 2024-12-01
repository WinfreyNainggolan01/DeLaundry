@extends('student.layout.main')

@section('head')
    <title>Your Order | DeLaundry</title>
    <!-- Include Alpine.js for dropdown functionality -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <style>
        
        body, html {
            height: 100%;
            margin: 0;
            overflow-y: auto;
        }

        main {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }

        
        .table-container {
            overflow: visible; 
            flex: 1; 
        }

    
        .dropdown-menu {
            z-index: 50; 
        }

        .dropdown-content {
            position: absolute;
            left: 0;
            margin-top: 10px;
            width: 180px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 100;
        }

        
        .dropdown.open .dropdown-content {
            display: block;
        }
    </style>
@endsection

@section('content')
<main>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-4">Welcome to Your Order Page!</h1>
                <p class="text-gray-700">
                    Here, you will find a complete list of your orders with all the important details easily accessible.
                    This page allows you to thoroughly review your order information, track their status, and take action when necessary. 
                    Through the tools button, you can file a complaint for a specific order, ensuring that your concerns are handled with utmost care.
                </p>
                <p class="text-gray-700 mt-4">
                    Additionally, you can view responses to any complaints you’ve submitted, providing you with clear and transparent information.
                    The tools also allow you to explore detailed information about each order you’ve placed. 
                    Browse through your orders now, and let us ensure your laundry experience remains smooth, hassle-free, and satisfying!
                </p>
            </div>

            <!-- Table Section with Background -->
            <div class="table-container bg-gray-50 p-6 rounded-lg shadow-md">
                <table class="w-full table-auto border-collapse border border-gray-200">
                    <thead class="bg-dark-blue text-white">
                        <tr>
                            <th class="px-4 py-2 text-left border">No</th>
                            <th class="px-4 py-2 text-left border">Order ID</th>
                            <th class="px-4 py-2 text-left border">Created Date</th>
                            <th class="px-4 py-2 text-left border">Weight</th>
                            <th class="px-4 py-2 text-left border">Price</th>
                            <th class="px-4 py-2 text-left border">Status</th>
                            <th class="px-4 py-2 text-left border">Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody class="text-gray-700">
                        @foreach ($orders as $index => $order)
                            <tr class="border-t odd:bg-gray-50 even:bg-white">
                                <td class="px-4 py-2 border text-left">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border text-left">{{ $order->ordx_id }}</td>
                                <td class="px-4 py-2 border text-left">{{ $order->date_at }}</td>
                                <td class="px-4 py-2 border text-left">{{ $order->itemOrders->sum('weight') }}</td>
                                <td class="px-4 py-2 border text-left">Rp. {{ number_format($order->itemOrders->sum('price'), 0, ',', '.') }}</td>
                                <td class="px-4 py-2 border text-left">{{ ucfirst(strtolower($order->status)) ?? 'Pending' }}</td>
                                <td class="px-4 py-2 border text-left">
                                    <div x-data="{ open: false }" class="relative inline-block text-left">
                                        <button @click="open = !open" class="flex items-center px-2 py-1 bg-gray-200 text-gray-700 text-sm rounded-md border border-gray-300 hover:bg-gray-300 focus:outline-none">
                                            Tools
                                        </button>
                                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-10">
                                            <div class="py-2">
                                                <a href="{{ route('your.complaint', strtolower($order->ordx_id)) }}" class="block px-4 py-2 text-sm text-gray-700">Complaint</a>
                                                <a href="{{ route('your.feedback', strtolower($order->ordx_id)) }}" class="block px-4 py-2 text-sm text-gray-700">Feedback</a>
                                               <a href="{{ route('your.detail', strtolower($order->ordx_id)) }}" class="block px-4 py-2 text-sm text-gray-700">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <a href="{{ route('homepage') }}" class="bg-gray-600 text-white py-2 px-4 rounded">
                    Back
                </a>
            </div>
        </div>
    </div>
</main>
@endsection