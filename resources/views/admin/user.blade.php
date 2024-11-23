@extends('admin.layout.main')

@section('head')
    <title>User | Admin - DeLaundry</title>
@endsection

@section('content')
<main class="flex-grow p-6">
    <div class="grid lg:grid-cols-2 md:grid-cols-2 grid-cols-1 gap-6">
        <div class="card">
            <div class="p-5">
                <div class="flex justify-between">
                    <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-primary/25 ">
                        <img src="{{ asset('img/person.svg') }}" alt="person" class="h-10 w-auto">
                    </div>
                    <div class="text-right">
                        <h3 id="total_user" class="mt-1 text-2xl font-bold mb-5 text-gray-900">0</h3>
                        <p class="mb-1 truncate text-gray-900">Total Users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col align-self-center py-6">
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
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">NIM</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Program</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                                    </tr>
                                </thead>
                                <tbody id="studentTableBody" class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <!-- Data akan diisi oleh JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fetch data dari API
        fetch('/api/students')
            .then(response => response.json())
            .then(data => {
                const students = data.data; // Akses data dari API

                // Tampilkan total user
                document.getElementById('total_user').textContent = students.length;

                // Ambil elemen tbody
                const studentTableBody = document.getElementById('studentTableBody');

                // Loop melalui data dan buat row tabel untuk setiap student
                students.forEach((student, index) => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${index + 1}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${student.nim}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${student.name}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${student.program_study}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${student.phone_number}</td>
                    `;
                    studentTableBody.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Error fetching student data:', error);
                document.getElementById('total_user').textContent = 'Error';
            });
    });
</script>
@endsection
