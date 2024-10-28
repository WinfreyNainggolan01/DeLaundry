@extends('student.layout.main')

@section('head')
    <title>Order | DeLaundry</title>
@endsection

@section('content')
<main class="container mx-auto px-4 py-8">
    <section class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Fill Your Items
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
            <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="name-item">
            Name Item <span class="text-red-700">*</span>
            </label>
            <input class="w-full px-3 py-2 border rounded" id="name-item" type="text" placeholder="Write name item" autocomplete="none"/>
            </div>
            <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="quantity">
            Quantity <span class="text-red-700">*</span>
            </label>
            {{-- <input class="w-full border border-gray-300 p-2 rounded" id="order-id" placeholder="Write an Order ID" type="text"/> --}}
            <input class="w-full px-3 py-2 border rounded" id="name-item" type="text" placeholder="Write quantity the item" autocomplete="none"/>
            </option>
            </select>
            </div>
            </div>
            <div>
            <label class="block text-gray-700 font-bold mb-2" for="note">
            Note
            </label>
            <textarea class="w-full px-3 py-2 border rounded" id="note" rows="5" placeholder="Write the note"></textarea>
            </div>
        </div>
        <div class="mt-8">
            <table class="w-full border-collapse">
            <thead>
            <tr class="bg-blue-900 text-white">
            <th class="py-2 px-4 border">
                Items
            </th>
            <th class="py-2 px-4 border">
                Quantity
            </th>
            <th class="py-2 px-4 border">
                Note
            </th>
            </tr>
            </thead>
            <tbody>
            <tr class="bg-white">
            <td class="py-2 px-4 border">
                Kemeja
            </td>
            <td class="py-2 px-4 border">
                4
            </td>
            <td class="py-2 px-4 border">
                -
            </td>
            </tr>
            <tr class="bg-gray-100">
            <td class="py-2 px-4 border">
                Celana pendek
            </td>
            <td class="py-2 px-4 border">
                3
            </td>
            <td class="py-2 px-4 border">
                -
            </td>
            </tr>
            <tr class="bg-white">
            <td class="py-2 px-4 border">
                Jaket
            </td>
            <td class="py-2 px-4 border">
                2
            </td>
            <td class="py-2 px-4 border">
                -
            </td>
            </tr>
            <tr class="bg-gray-100">
            <td class="py-2 px-4 border">
                Almamater
            </td>
            <td class="py-2 px-4 border">
                1
            </td>
            <td class="py-2 px-4 border">
                Mudah Luntur
            </td>
            </tr>
            <tr class="bg-white">
            <td class="py-2 px-4 border">
                Selimut
            </td>
            <td class="py-2 px-4 border">
                1
            </td>
            <td class="py-2 px-4 border">
                -
            </td>
            </tr>
            </tbody>
            </table>
        </div>
        <div class="mt-8 flex justify-center space-x-4">
            <button class="bg-sky-700 text-white px-4 py-2 rounded-lg">
            Add Item
            </button>
            <button class="bg-gray-500 text-white px-4 py-2 rounded-lg">
            Edit Item
            </button>
            <button class="bg-sky-700 text-white px-4 py-2 rounded-lg">
            Done
            </button>
        </div>
        </section>
    </main>
@endsection