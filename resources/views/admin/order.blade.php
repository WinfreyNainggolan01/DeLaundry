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
                        <h3 class="mt-1 text-2xl font-bold mb-5 text-gray-900">3</h3>
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
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantity</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Weight</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order Date</th>
                                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Status</th>
                                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase"></th>
                                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase"></th>

                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">DLR01234567</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Winfrey Nainggolan</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">10</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1.6</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">13/08/2024</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <div class="relative z-10">
                                                <select class="btn border-gray-300 text-gray-900 h-10 rounded-md min-w-[180px] pl-3 pr-8 focus:outline-none focus:ring-2 focus:ring-blue-500 statusSelect" id="statusSelect-1">
                                                    <option value="submit">Order Received</option>
                                                    <option value="in_progress">Pick Up</option>
                                                    <option value="completed">On Process</option>
                                                    <option value="cancelled">Delivery</option>
                                                    <option value="done">Done</option>
                                                </select>
                                            </div>
                                        </td>                                                                              
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <a class="text-primary hover:text-sky-700" href="#" onclick="openModal('editModal')">
                                                <img src="{{ asset('img/pencil-square.svg') }}" alt="Edit">
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <a class="text-primary hover:text-sky-700" href="#" onclick="openModal('detailModal')">
                                                <img src="{{ asset('img/eye.svg') }}" alt="Lihat Detail">
                                            </a>
                                        </td>
                                </tbody>
                            </table>
                            <script>
                                const statusSelect = document.getElementById('statusSelect');
                                const statusLabel = document.getElementById('statusLabel');
                            
                                statusSelect.addEventListener('change', function () {
                                    statusLabel.textContent = statusSelect.options[statusSelect.selectedIndex].text;
                                });
                            </script>

                            <!-- Modal untuk Detail -->
                            <div id="detailModal" class="fixed inset-0 z-50 hidden bg-gray-500 bg-opacity-75 flex justify-center items-center">
                                <div class="bg-white p-6 rounded-lg shadow-lg max-w-4xl w-full">
                                    <div class="modal-header flex justify-between items-center mb-4">
                                        <h5 class="text-xl font-bold text-gray-900">Detail Informasi</h5>
                                        <button onclick="closeModal('detailModal')" class="text-gray-600 hover:text-gray-900">
                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>                                    
                                    <div class="modal-body mb-4">
                                        <div class="flex flex-col gap-3 mb-3">
                                            <div class="flex items-center gap-4">
                                                <label for="orderNumber" class="text-base font-medium text-black w-32">Order Number:</label>
                                                <input type="text" id="orderNumber" value="DLR234324213" readonly
                                                       class="block w-96 px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-800"/>
                                            </div>
                                            <div class="flex items-center gap-4">
                                                <label for="customerName" class="text-base font-medium text-black w-32">Customer:</label>
                                                <input type="text" id="customerName" value="Jake Sembung" readonly
                                                       class="block w-96 px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-800"/>
                                            </div>
                                        </div>
                                        <!-- Tabel untuk Menampilkan Item Laundry -->
                                        <div class="mb-3">
                                            <label for="itemDetails" class="block text-base font-medium text-black">Items Detail</label>
                                        </div>
                                        <table class="min-w-lg table-auto border border-gray-300 w-[80%] mx-auto">
                                            <thead class="bg-blue-900 text-white">
                                                <tr>
                                                    <th class="px-4 py-2 text-left text-sm font-medium border border-gray-300">Items</th>
                                                    <th class="px-4 py-2 text-left text-sm font-medium border border-gray-300">Quantity</th>
                                                    <th class="px-4 py-2 text-left text-sm font-medium border border-gray-300">Note</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd:bg-gray-100 even:bg-white">
                                                    <td class="px-4 py-2 border border-gray-300">Kemeja</td>
                                                    <td class="px-4 py-2 border border-gray-300">4</td>
                                                    <td class="px-4 py-2 border border-gray-300">-</td>
                                                </tr>
                                                <tr class="odd:bg-gray-100 even:bg-white">
                                                    <td class="px-4 py-2 border border-gray-300">Celana pendek</td>
                                                    <td class="px-4 py-2 border border-gray-300">3</td>
                                                    <td class="px-4 py-2 border border-gray-300">-</td>
                                                </tr>
                                                <tr class="odd:bg-gray-100 even:bg-white">
                                                    <td class="px-4 py-2 border border-gray-300">Jaket</td>
                                                    <td class="px-4 py-2 border border-gray-300">2</td>
                                                    <td class="px-4 py-2 border border-gray-300">Mudah Luntur</td>
                                                </tr>
                                                <tr class="odd:bg-gray-100 even:bg-white">
                                                    <td class="px-4 py-2 border border-gray-300">Selimut</td>
                                                    <td class="px-4 py-2 border border-gray-300">1</td>
                                                    <td class="px-4 py-2 border border-gray-300">-</td>
                                                </tr>
                                            </tbody>
                                        </table>                                        
                                    </div>
                                    <div class="modal-footer flex justify-end">
                                        <button onclick="closeModal('detailModal')" class="bg-gray-300  text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 mr-12">Back</button>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function openModal(modalId) {
                                    document.getElementById(modalId).classList.remove('hidden');
                                    document.body.style.overflow = 'hidden';
                                }
                                function closeModal(modalId) {
                                    document.getElementById(modalId).classList.add('hidden');
                                    document.body.style.overflow = 'auto';
                                }
                                window.addEventListener('click', function(event) {
                                    var modal = document.getElementById('detailModal');
                                    if (event.target === modal) {
                                        closeModal('detailModal');
                                    }
                                });
                            </script>
                            
                            <!-- Modal untuk Edit Order -->
                            <div id="editModal" class="fixed inset-0 z-50 hidden bg-gray-500 bg-opacity-75 flex justify-center items-center">
                                <div class="bg-white p-6 rounded-lg shadow-lg max-w-4xl w-full">
                                    <div class="modal-header flex flex-col mb-4">
                                        <div class="flex justify-between items-center">
                                            <h5 class="text-xl font-bold text-gray-900">Edit The Order Here</h5>
                                            <button onclick="closeModal('editModal')" class="text-gray-600 hover:text-gray-900">
                                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <p class="text-gray-600 text-[16px] mt-2 mt-2">Make changes to this profile here.Click save when<br>you're done.</p>
                                    </div>

                                    <div class="modal-body mb-4">
                                        <!-- Form untuk mengedit data order -->
                                        <form>
                                            <div class="mb-3 flex items-center">
                                                <label for="orderNumber" class="block text-sm font-medium text-gray-700 mr-0 w-1/3">Order Number</label>
                                                <input type="text" class="form-control mt-1 block px-3 py-1 border border-gray-300 rounded-md w-2/3" id="orderNumber" value="">
                                            </div>
                                            <div class="mb-3 flex items-center">
                                                <label for="weight" class="block text-sm font-medium text-gray-700 mr-0 w-1/3">Weight</label>
                                                <input type="text" class="form-control mt-1 block px-3 py-1 border border-gray-300 rounded-md w-2/3" id="weight" value="">
                                            </div>
                                            <div class="mb-3 flex items-center">
                                                <label for="dormitory" class="block text-sm font-medium text-gray-700 mr-0 w-1/3">Dormitory</label>
                                                <input type="text" class="form-control mt-1 block px-3 py-1 border border-gray-300 rounded-md w-2/3" id="dormitory" value="">
                                            </div>
                                            <div class="mb-3 flex items-center">
                                                <label for="gender" class="block text-sm font-medium text-gray-700 mr-0 w-1/3">Gender</label>
                                                <input type="text" class="form-control mt-1 block px-3 py-1 border border-gray-300 rounded-md w-2/3" id="gender" value="">
                                            </div>
                                            <div class="mb-3 flex items-center">
                                                <label for="phoneNumber" class="block text-sm font-medium text-gray-700 mr-0 w-1/3">Phone Number</label>
                                                <input type="text" class="form-control mt-1 block px-3 py-1 border border-gray-300 rounded-md w-2/3" id="phoneNumber" value="">
                                            </div>
                                            <div class="mb-3 flex items-center">
                                                <label for="totalPrice" class="block text-sm font-medium text-gray-700 mr-0 w-1/3">Total Price</label>
                                                <input type="text" class="form-control mt-1 block px-3 py-1 border border-gray-300 rounded-md w-2/3" id="totalPrice" value="">
                                            </div>
                                        </form>                                                                                                                                                                                                                                                                                                                                
                                    </div>

                                    <div class="modal-footer flex justify-end">
                                        <button onclick="closeModal('editModal')" class="bg-gray-300  text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 mr-12">Cancel</button>
                                        <button type="submit" class="bg-[#28397e] text-white px-4 py-2 rounded-md hover:bg-[#1e2d63]">Save Changes</button>
                                    </div>
                                </div>
                            </div>

                            <script>
                                function openModal(modalId) {
                                    document.getElementById(modalId).classList.remove('hidden');
                                    document.body.style.overflow = 'hidden';
                                }
                                function closeModal(modalId) {
                                    document.getElementById(modalId).classList.add('hidden');
                                    document.body.style.overflow = 'auto';
                                }
                                window.addEventListener('click', function(event) {
                                    var modal = document.getElementById('editModal');
                                    if (event.target === modal) {
                                        closeModal('editModal');
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end table-->
    </div>
</main>
@endsection