@extends('admin.layout.main')

@section('head')
    <title>User | Admin - DeLaundry</title>
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
                        <h3 class="mt-1 text-2xl font-bold mb-5 text-gray-900">{{ $total_user }}</h3>
                        <p class="mb-1 truncate text-gray-900">Total Users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col align-self-center py-6">
        <!-- Table -->
        <div class="card">
            <div class="card-header">
                <div class="flex justify-between items-center">
                    <h4 class="card-title">Users</h4>
                </div>
            </div>
            <div class="p-6 py-12">
                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <caption class="py-2 text-left text-sm text-gray-600 dark:text-gray-500">List of users</caption>
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">NIM</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dormitory</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gender</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone Number</th>
                                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase"></th>
                                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase"></th>

                                    </tr>
                                </thead>
                                @foreach ($students as $student)
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $student->nim }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $student->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $student->dormitory->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $student->gender }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $student->phone_number }}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end table-->
    </div>
</main>
@endsection