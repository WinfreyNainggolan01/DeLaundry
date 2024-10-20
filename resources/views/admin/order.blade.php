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
                                            <div class="relative z-10 ">
                                                <a href="#" class="btn border-gray-700 text-gray-900 h-8 w-auto relative z-20">
                                                    Submit
                                                    <img src="{{ asset('img/caret-down-fill.svg') }}" alt="" class="absolute right-1 top-1/3 transform -translate-y-1/2 z-10 h-3 w-auto">
                                                </a>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <a class="text-primary hover:text-sky-700" href="#">
                                                <img src="{{ asset('img/pencil-square.svg') }}" alt="">
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <a class="text-primary hover:text-sky-700" href="#">
                                                <img src="{{ asset('img/eye.svg') }}" alt="">
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> - </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Yohana Siahaan</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">12</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"> - </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">12/08/2024</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <div class="relative z-10 ">
                                                <a href="#" class="btn border-gray-700 text-gray-900 h-8 w-auto relative z-20">
                                                    Submit
                                                    <img src="{{ asset('img/caret-down-fill.svg') }}" alt="" class="absolute right-1 top-1/3 transform -translate-y-1/2 z-10 h-3 w-auto">
                                                </a>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <a class="text-primary hover:text-sky-700" href="#">
                                                <img src="{{ asset('img/pencil-square.svg') }}" alt="">
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <a class="text-primary hover:text-sky-700" href="#">
                                                <img src="{{ asset('img/eye.svg') }}" alt="">
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">3</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">DLR4324643</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Ira Silalahi</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">8</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1.4</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">14/08/2024</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <div class="relative z-10 ">
                                                <a href="#" class="btn border-gray-700 text-gray-900 h-8 w-auto relative z-20">
                                                    Submit
                                                    <img src="{{ asset('img/caret-down-fill.svg') }}" alt="" class="absolute right-1 top-1/3 transform -translate-y-1/2 z-10 h-3 w-auto">
                                                </a>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <a class="text-primary hover:text-sky-700" href="#">
                                                <img src="{{ asset('img/pencil-square.svg') }}" alt="">
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <a class="text-primary hover:text-sky-700" href="#">
                                                <img src="{{ asset('img/eye.svg') }}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end table-->
    </div>
</main>
@endsection