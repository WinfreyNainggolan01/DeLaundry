@extends('student.layout.main')

@section('head')
    <title>Order | DeLaundry</title>
@endsection

@section('content')
<main>
    <section class="order-form mx-auto max-w-7xl p-4">
        <h2 class="text-2xl font-bold mb-10 text-left ">Fill Your Items</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!--  (Name Item, Quantity, Category) -->
            <div>
                <div class="flex flex-col mb-4 ml-14">
                    <label for="itemName" class="text-sm font-medium mb-1">Name Item</label>
                    <input type="text" id="itemName" class="border border-gray-300 p-1 rounded-md w-3/4" placeholder="Enter item name">
                </div>
                <div class="flex flex-col mb-4 ml-14">
                    <label for="quantity" class="text-sm font-medium mb-1">Quantity</label>
                    <input type="number" min="1" id="quantity" class="border border-gray-300 p-1 rounded-md w-3/4" placeholder="Enter quantity">
                </div>
                <div class="flex flex-col mb-4 ml-14">
                    <label for="category" class="text-sm font-medium mb-1">Category</label>
                    <select id="category" class="border border-gray-300 p-1 rounded-md w-3/4">
                        <option value="Shirt">Shirt</option>
                        <option value="Pants">Pants</option>
                        <option value="Hoodie">Hoodie</option>
                        <option value="Blanket">Blanket</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <!--  (Note) -->
            <div>
                <div class="flex flex-col mb-1 ">
                    <label for="note" class="text-sm font-medium mb-1">Note</label>
                    <textarea id="note" class="border border-gray-300 p-2 rounded-md w-4/5" rows="3" placeholder="Enter special instructions (optional)"></textarea>
                </div>
            </div>

            <!-- (Order Summary) -->
            <div class=" mb-4 ml-0">
                <h2 class="text-xl font-bold mb-4 text-center">Order Summary</h2>
                <div class="overflow-x-auto mb-4">
                    <div class="overflow-x-auto mb-4">
                        <table class="table-auto w-full max-w-screen-sm border border-gray-300">
                            <thead>
                                <tr class="text-left border-b border-gray-300 bg-dark-blue shadow text-white">
                                    <th class="px-2 py-1">Item</th>
                                    <th class="px-2 py-1">Quantity</th>
                                    <th class="px-2 py-1">Category</th>
                                    <th class="px-2 py-1">Note</th>
                                    <th class="px-2 py-1">Actions</th> 
                                </tr>
                            </thead>
                            <tbody id="order-summary-body">
                                <!-- Summary will be populated here -->
                            </tbody>
                        </table>
                
                <!-- Tombol bawah tabel -->
                <div class="flex justify-between mt-4">
                    <button type="button" id="add-item-btn" class="bg-sky-500 hover:bg-sky-700 text-white font-medium py-2 px-4 rounded-md">Add Item</button>
                    <button type="button" class="bg-[#005DAD] hover:bg-[#004080] text-white font-medium py-2 px-4 rounded-md">Done</button>
                </div>
            </div>

        </div>
    </section>
</main>
@endsection