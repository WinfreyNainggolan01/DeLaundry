@extends('admin.layout.main')

@section('head')
    <title>Complaint | Admin - DeLaundry</title>
@endsection

@section('content')
<main class="flex-grow p-6">
    <!-- Card Total -->
    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6">
        <div class="card">
            <div class="p-5">
                <div class="flex justify-between">
                    <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-blue-100">
                        <img src="{{ asset('img/headset-blue.svg') }}" alt="person" class="h-10 w-auto">
                    </div>
                    <div class="text-right"> 
                        <h3 class="mt-1 text-2xl font-bold mb-5 text-gray-900">{{ $total_complaint }}</h3>
                        <p class="mb-1 truncate text-gray-900">Total Complaints</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="p-5">
                <div class="flex justify-between">
                    <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-green-100">
                        <img src="{{ asset('img/check-lg-green.svg') }}" alt="person" class="h-10 w-auto">
                    </div>
                    <div class="text-right"> 
                        <h3 class="mt-1 text-2xl font-bold mb-5 text-gray-900">{{ $total_complaint_responded }}</h3>
                        <p class="mb-1 truncate text-gray-900">Done Complaints</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="p-5">
                <div class="flex justify-between">
                    <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-yellow-100">
                        <img src="{{ asset('img/alarm-yellow.svg') }}" alt="person" class="h-10 w-auto">
                    </div>
                    <div class="text-right"> 
                        <h3 class="mt-1 text-2xl font-bold mb-5 text-gray-900">{{ $total_complaint_pending }}</h3>
                        <p class="mb-1 truncate text-gray-900">Pending Complaints</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col align-self-center py-6">
        <!-- Card 1 -->
        <div class="card">
            <div class="card-header">
                <div class="flex justify-between items-center">
                    <h4 class="card-title">Complaints</h4>
                </div>
            </div>
            <div class="p-6 py-12">
                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <caption class="py-2 text-left text-sm text-gray-600 dark:text-gray-500">List of complaints</caption>
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                                        {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order ID</th> --}}
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Complaint By</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subject</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date At</th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Status</th>
                                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase"></th>
                                    </tr>
                                </thead>
                                @foreach ($complaints as $complaint)
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-normal text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
                                                {{-- <td class="px-6 py-4 whitespace-normal text-sm font-medium text-gray-900">{{ optional($complaint->order)->ordx_id }}</td> --}}
                                                {{-- variabel order tidak akan dilakukan perloopingan dan nilainya bj --}}
                                                {{-- <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ 
                                                $complaint->order ? $complaint->order->ordx_id : 'N/A' }} </td> --}}
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $complaint->student->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $complaint->title }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $complaint->date_at }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                                                    {{ ucfirst($complaint->status) }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                    <a href="{{ route('show.complaint', strtolower($complaint->id)) }}">
                                                        <img src="{{ asset('img/pencil-square.svg') }}" alt="Edit" class="w-5 h-5">
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection