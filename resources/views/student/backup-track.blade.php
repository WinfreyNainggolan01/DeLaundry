@extends('student.layout.main')

@section('head')
    <title>Track | DeLaundry</title>
@endsection

@section('content')
<main class="container mx-auto px-4 py-8">
    <p class="text-center text-gray-700 mt-4">
        Ini adalah halaman Pelacakan Pesanan Laundry! Pantau status laundry Anda dengan mudah mulai dari Pesanan Diterima, Penjemputan, dan Proses Pencucian, hingga Pengantaran. Tetap terinformasi dengan pembaruan real-time, memastikan Anda selalu mengetahui perkembangan pesanan tanpa repot. Nikmati kenyamanan pelacakan yang mulus, menjadikan pengalaman laundry Anda lebih praktis dan bebas khawatir.
    </p>
    <div class="bg-white shadow rounded-lg p-6 mt-8">
     <div class="flex items-center justify-between mb-6">
      <span class="text-gray-700 font-semibold">
       Order Number
      </span>
      <span class="text-blue-900 font-bold">
       DLR3435434
      </span>
     </div>
     <div class="flex items-center justify-between mb-6">
      <div class="flex flex-col items-center">
       <img alt="Order Received icon" class="h-12 w-12 mb-2" height="50" src="https://storage.googleapis.com/a1aa/image/WZWYpw6zUgakHNaNQRlICCR5lhtoTyQhHRQRCOsi2XexKj8JA.jpg" width="50"/>
       <span class="text-gray-700">
        Order Received
       </span>
      </div>
      <div class="flex-1 h-1 bg-blue-500">
      </div>
      <div class="flex flex-col items-center">
       <img alt="Pick Up icon" class="h-12 w-12 mb-2" height="50" src="https://storage.googleapis.com/a1aa/image/UgAEsA7y8vI9GxaEj48KcZBYgpXnHMfhQtZUtShGbweiVG5TA.jpg" width="50"/>
       <span class="text-gray-700">
        Pick Up
       </span>
      </div>
      <div class="flex-1 h-1 bg-blue-500">
      </div>
      <div class="flex flex-col items-center">
       <img alt="On Process icon" class="h-12 w-12 mb-2" height="50" src="https://storage.googleapis.com/a1aa/image/l2lGumfXexljAUdeuFEflrjQCMgAfR7o7AN9lXMH9p5psyIfE.jpg" width="50"/>
       <span class="text-gray-700">
        On Process
       </span>
      </div>
      <div class="flex-1 h-1 bg-gray-300">
      </div>
      <div class="flex flex-col items-center">
       <img alt="Delivery icon" class="h-12 w-12 mb-2" height="50" src="https://storage.googleapis.com/a1aa/image/wk5OfWcdYXVcISnbGafOPI9kSdkT321WKmJUkLIYhmioVG5TA.jpg" width="50"/>
       <span class="text-gray-700">
        Delivery
       </span>
      </div>
      <div class="flex-1 h-1 bg-gray-300">
      </div>
      <div class="flex flex-col items-center">
       <img alt="Done icon" class="h-12 w-12 mb-2" height="50" src="https://storage.googleapis.com/a1aa/image/TmoeIvanK1WWTCKzJuir40Mtjb50TNpZ4imse7MiuoOkVG5TA.jpg" width="50"/>
       <span class="text-gray-700">
        Done
       </span>
      </div>
     </div>
     <div class="text-gray-700">
      <div class="mb-4">
       <p class="font-semibold">
        Tue, 07 June 2022
       </p>
       <p class="text-sm">
        09.00 WIB
       </p>
       <p class="mt-2">
        Order Received
       </p>
       <p class="text-sm">
        Your laundry order has been successfully placed and is awaiting pickup.
       </p>
      </div>
      <div class="mb-4">
       <p class="font-semibold">
        Tue, 07 June 2022
       </p>
       <p class="text-sm">
        11.00 WIB
       </p>
       <p class="mt-2">
        Pick Up
       </p>
       <p class="text-sm">
        Our team is on the way to collect your laundry for processing.
       </p>
      </div>
      <div class="mb-4">
       <p class="font-semibold">
        Tue, 07 June 2022
       </p>
       <p class="text-sm">
        13.00 WIB
       </p>
       <p class="mt-2">
        On Process
       </p>
       <p class="text-sm">
        Your laundry is being cleaned and prepared with care.
       </p>
      </div>
      <div class="mb-4">
       <p class="font-semibold">
        -
       </p>
       <p class="text-sm">
        -
       </p>
       <p class="mt-2">
        Delivery
       </p>
       <p class="text-sm">
        -
       </p>
      </div>
     </div>
    </div>
   </main>
@endsection