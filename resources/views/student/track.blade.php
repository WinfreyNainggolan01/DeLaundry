@extends('student.layout.main')

@section('head')
    <title>Track | DeLaundry</title>
@endsection

@section('content')
<main>
  <div class="bg-white py-6 sm:py-8 lg:py-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <h2 class="text-3xl font-extrabold text-gray-900 text-center mb-4">Your Order Status</h2>
          <p class="text-center text-base text-gray-600 mb-8">
              This is the Laundry Order Tracking page! Easily track your laundry status from Order Received, Pick Up, On Process, to Delivery. Stay informed with real-time updates, ensuring you always know where your order is without any hassle. Enjoy the convenience of seamless tracking, making your laundry experience smooth and worry-free.
          </p>

        
          <div class="bg-gray-100 p-6 rounded-lg shadow-md max-w-full mx-auto mb-8">
              <h3 class="text-center text-lg font-semibold text-gray-700 mb-4">Order Number: <span class="text-sky-600">DLR3435434</span></h3>

             
              <div class="flex justify-between items-center w-full max-w-5xl mx-auto">
                <div class="text-center">
                    <div class="bg-sky-600 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto">
                        <img src="img/order-received.png" alt="Order Received" class="w-8 h-8" />
                    </div>
                    <p class="mt-2 text-sm font-medium text-gray-700">Order Received</p>
                </div>
                <div class="mx-2"></div>
                <div class="text-center">
                    <div class="bg-sky-600 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto">
                        <img src="img/pickup.png" alt="Pick Up" class="w-8 h-8" />
                    </div>
                    <p class="mt-2 text-sm font-medium text-gray-700">Pick Up</p>
                </div>
                <div class="mx-2"></div>
                <div class="text-center">
                    <div class="bg-sky-600 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto">
                        <img src="img/on-process.png" alt="On Process" class="w-8 h-8" />
                    </div>
                    <p class="mt-2 text-sm font-medium text-gray-700">On Process</p>
                </div>
                <div class="mx-2"></div>
                <div class="text-center">
                    <div class="bg-gray-300 text-gray-500 w-12 h-12 rounded-full flex items-center justify-center mx-auto">
                        <img src="img/delivery.png" alt="Delivery" class="w-8 h-8" />
                    </div>
                    <p class="mt-2 text-sm font-medium text-gray-500">Delivery</p>
                </div>
                <div class="mx-2"></div>
                <div class="text-center">
                    <div class="bg-gray-300 text-gray-500 w-12 h-12 rounded-full flex items-center justify-center mx-auto">
                        <img src="img/done.png" alt="Done" class="w-8 h-8" />
                    </div>
                    <p class="mt-2 text-sm font-medium text-gray-500">Done</p>
                </div>
            </div>
            
          </div>

         
          <div class="max-w-5xl mx-auto">
              <div class="flex mb-4">
                  <div class="w-1/4 text-gray-500 text-sm">
                      <p>Tue, 07 June 2022<br>09:00 WIB</p>
                  </div>
                  <div class="w-3/4">
                      <h4 class="text-gray-700 font-semibold">Order Received</h4>
                      <p class="text-sm text-gray-600">Your laundry order has been successfully placed and is awaiting pickup.</p>
                  </div>
              </div>
              <div class="flex mb-4">
                  <div class="w-1/4 text-gray-500 text-sm">
                      <p>Tue, 07 June 2022<br>11:00 WIB</p>
                  </div>
                  <div class="w-3/4">
                      <h4 class="text-gray-700 font-semibold">Pick Up</h4>
                      <p class="text-sm text-gray-600">Our team is on the way to collect your laundry for processing.</p>
                  </div>
              </div>
              <div class="flex mb-4">
                  <div class="w-1/4 text-gray-500 text-sm">
                      <p>Tue, 07 June 2022<br>13:00 WIB</p>
                  </div>
                  <div class="w-3/4">
                      <h4 class="text-gray-700 font-semibold">On Process</h4>
                      <p class="text-sm text-gray-600">Your laundry is being cleaned and prepared with care.</p>
                  </div>
              </div>
              <div class="flex mb-4">
                  <div class="w-1/4 text-gray-400 text-sm">
                      <p>-</p>
                  </div>
                  <div class="w-3/4">
                      <h4 class="text-gray-500 font-semibold">Delivery</h4>
                      <p class="text-sm text-gray-400">Your laundry is being delivered back to you.</p>
                  </div>
              </div>
              <div class="flex">
                  <div class="w-1/4 text-gray-400 text-sm">
                      <p>-</p>
                  </div>
                  <div class="w-3/4">
                      <h4 class="text-gray-500 font-semibold">Done</h4>
                      <p class="text-sm text-gray-400">Your laundry has been cleaned and delivered.</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>

@endsection