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
              This is the Laundry Order Tracking page! Easily track your laundry status from Order Received, Pick Up, and On Process, to Delivery. Stay informed with real-time updates, ensuring you always know where your order is without any hassle. Enjoy the convenience of seamless tracking, making your laundry experience smooth and worry-free.
          </p>

          <div class="max-w-md mx-auto">
              <form action="/track-order" method="POST" class="space-y-6">
                  <div>
                      <label for="order-number" class="block text-sm font-medium text-gray-700 text-center">Input Your Order Number</label>
                      <div class="mt-2 flex justify-center">
                          <input type="text" name="order-number" id="order-number" required class="w-4/5 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm text-center" placeholder="Enter your order number" value="DLR3435434">
                      </div>
                  </div>
                  <div class="text-center">
                      <button type="submit" class="w-4/5 px-4 py-2 font-medium text-white bg-sky-800 rounded-md hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Track Order</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</main>

@endsection