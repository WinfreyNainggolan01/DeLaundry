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
<<<<<<< Updated upstream
                        <h3 class="mt-1 text-2xl font-bold mb-5 text-gray-900">3</h3>
                        <p class="mb-1 truncate text-gray-900">Total Keluhan</p>
=======
                        <h3 class="mt-1 text-2xl font-bold mb-5 text-gray-900">{{ $total_complaint }}</h3>
                        <p class="mb-1 truncate text-gray-900">Total Complaints</p>
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
                        <h3 class="mt-1 text-2xl font-bold mb-5 text-gray-900">3</h3>
                        <p class="mb-1 truncate text-gray-900">Keluhan Teratasi</p>
=======
                        <h3 class="mt-1 text-2xl font-bold mb-5 text-gray-900">{{ $total_complaint_responded }}</h3>
                        <p class="mb-1 truncate text-gray-900">Done Complaints</p>
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
                        <h3 class="mt-1 text-2xl font-bold mb-5 text-gray-900">3</h3>
                        <p class="mb-1 truncate text-gray-900">Keluhan Menunggu</p>
=======
                        <h3 class="mt-1 text-2xl font-bold mb-5 text-gray-900">{{ $total_complaint_pending }}</h3>
                        <p class="mb-1 truncate text-gray-900">Pending Complaints</p>
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
                    <h4 class="card-title">Pengguna</h4>
=======
                    <h4 class="card-title">Complaints</h4>
>>>>>>> Stashed changes
                </div>
            </div>
            <div class="p-6 py-12">
                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
<<<<<<< Updated upstream
                                <caption class="py-2 text-left text-sm text-gray-600 dark:text-gray-500">Daftar pengguna</caption>
=======
                                <caption class="py-2 text-left text-sm text-gray-600 dark:text-gray-500">List of complaints</caption>
>>>>>>> Stashed changes
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order ID</th>
<<<<<<< Updated upstream
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Keluhan oleh</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subjek</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
=======
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Complaint By</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subject</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date At</th>
>>>>>>> Stashed changes
                                        <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Status</th>
                                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase"></th>
                                    </tr>
                                </thead>
<<<<<<< Updated upstream
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-normal text-sm font-medium text-gray-900">1</td>
                                        <td class="px-6 py-4 whitespace-normal text-sm font-medium text-gray-900">DLR01234567</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Winfrey Nainggolan</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Kaos Kaki Hilang</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">14/08/2024</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <select class="border border-gray-300 rounded px-7 py-1 text-gray-700 focus:outline-none focus:border-blue-500">
                                                <option value="unreplied" selected>Belum Terjawab</option>
                                                <option value="replied">Sudah Terjawab</option>
                                            </select>
                                        </td>
                                        
                                         <td class="px-4 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <a class="text-primary hover:text-sky-700" href="javascript:void(0)" onclick="openModal()">
                                                <img src="{{ asset('img/pencil-square.svg') }}" alt="" class="w-5 h-5">
                                            </a>
                                        </td>
                                        
                                    </tr>

                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">DLR03454234</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Yohana Siahaan</td>
                                        <td class="px-6 py-4 whitespace-normal text-sm text-gray-900">Baju Mengalami Kerusakan</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">15/08/2024</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <select class="border border-gray-300 rounded px-7 py-1 text-gray-700 focus:outline-none focus:border-blue-500">
                                                <option value="unreplied" selected>Belum Terjawab</option>
                                                <option value="replied">Sudah Terjawab</option>
                                            </select>
                                        </td>
                                        
                                         <td class="px-4 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <a class="text-primary hover:text-sky-700" href="javascript:void(0)" onclick="openModal()">
                                                <img src="{{ asset('img/pencil-square.svg') }}" alt="" class="w-5 h-5">
                                            </a>
                                        </td>
                                        
                                    </tr>

                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">3</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">DLR232432</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Ira Silalahi</td>
                                        <td class="px-6 py-4 whitespace-normal text-sm text-gray-900">Kemeja Putih Terkena Luntur</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">14/08/2024</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <select class="border border-gray-300 rounded px-7 py-1 text-gray-700 focus:outline-none focus:border-blue-500">
                                                <option value="unreplied" selected>Belum Terjawab</option>
                                                <option value="replied">Sudah Terjawab</option>
                                            </select>
                                        </td>
                                      
                                        <td class="px-4 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <a class="text-primary hover:text-sky-700" href="javascript:void(0)" onclick="openModal()">
                                                <img src="{{ asset('img/pencil-square.svg') }}" alt="" class="w-5 h-5">
                                            </a>
                                        </td>

                                        
                                    </tr>
                                </tbody>
=======
                                @foreach ($complaints as $complaint)
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-normal text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
                                                {{-- <td class="px-6 py-4 whitespace-normal text-sm font-medium text-gray-900">{{ optional($complaint->order)->ordx_id }}</td> --}}
                                                {{-- variabel order tidak akan dilakukan perloopingan dan nilainya bj --}}
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ 
                                                $complaint->orders ? $complaint->orders->ordx_id : 'N/A' }} </td>
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
                                    {{-- <select id="status" name="status" class="border border-gray-300 rounded px-7 py-1 text-gray-700 focus:outline-none focus:border-blue-500">
                                                    <option value="pending" {{ $complaint->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="responded" {{ $complaint->status == 'responded' ? 'selected' : '' }}>Responded</option>
                                                </select> --}}
                                @endforeach
>>>>>>> Stashed changes
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- end table-->
    </div>
</main>

<<<<<<< Updated upstream
@include('admin.feedback')
=======
{{-- <!-- Overlay Modal -->
<div id="feedbackModal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-3xl p-6 relative transform -translate-y-full transition-all duration-300 ease-out"
         id="modalContent">
        
        <!-- Header Modal -->
        <div class="flex justify-between items-center border-b pb-4">
            <h3 class="text-2xl font-semibold text-gray-800">Provide Feedback</h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
        </div>

        <!-- Body Modal -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-6">
            <div>
                <img id="complaintImage" src="" alt="Complaint Image" class="w-full h-auto rounded">
            </div>
            <div class="text-gray-700 text-sm space-y-4">
                <p><strong>Subject:</strong> <span id="complaintSubject"></span></p>
                <p><strong>Order ID:</strong> <span id="complaintOrderId"></span></p>
                <p><strong>Description:</strong> <span id="complaintDescription"></span></p>
            </div>
        </div>

        <!-- Form Feedback -->
        <form method="POST" action="{{ route('admin_complaint_feedback', ['complaint_id' => '']) }}" id="feedbackForm">
            @csrf
            <div class="mb-4">
                <label for="feedback_response" class="block text-lg font-medium text-gray-700 mb-2">Feedback</label>
                <textarea id="feedback_response" name="feedback_response" class="w-full border rounded-lg p-4 focus:outline-none focus:ring focus:border-blue-300" rows="5" placeholder="Write your feedback here..."></textarea>
            </div>

            <!-- Footer Modal -->
            <div class="modal-footer flex justify-end space-x-4 w-full">
                <button type="button" onclick="closeModal()" class="bg-gray-300 text-gray-600 hover:bg-gray-400 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 py-2 px-6 rounded">
                    Cancel
                </button>

                <button type="submit" class="bg-[#28397e] border border-[#031003] text-white py-2 px-6 rounded hover:bg-[#1e2d63] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#031003]" id="saveChangesButton">
                    Send
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(complaintId) {
        // Fetch complaint details using AJAX or pass the data directly
        const complaint = @json($complaints).find(c => c.id === complaintId);

        document.getElementById('complaintImage').src = complaint.image ? `{{ asset('images') }}/${complaint.image}` : '{{ asset('img/luntur.png') }}';
        document.getElementById('complaintSubject').innerText = complaint.title;
        document.getElementById('complaintOrderId').innerText = complaint.order.ordx_id;
        document.getElementById('complaintDescription').innerText = complaint.description;

        document.getElementById('feedbackForm').action = `{{ route('admin_complaint_feedback', '') }}/${complaintId}`;

        const modalContent = document.getElementById('feedbackModal');
        modalContent.classList.remove('hidden');
        setTimeout(function() {
            modalContent.classList.remove('-translate-y-full');
        }, 10); 
    }

    function closeModal() {
        const modal = document.getElementById('feedbackModal');
        modal.classList.add('hidden');
        setTimeout(function() {
            modal.classList.add('hidden');
        }, 300); 
    }
</script> --}}
>>>>>>> Stashed changes

@endsection