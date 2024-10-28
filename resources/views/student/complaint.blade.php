@extends('student.layout.main')

@section('head')
    <title>Complaint | DeLaundry</title>
@endsection



@section('content')
<section class="container mx-auto px-4 py-8 flex space-x-8">
    <div class="w-1/2 bg-white p-8 shadow rounded">
     <h2 class="text-2xl font-bold mb-4">
      Report an Issue with Your Laundry
     </h2>
     <p class="text-gray-700 mb-4">
      We understand that issues can arise with our laundry service, and we sincerely apologize if any of your clothing items have been damaged during the process. Our goal is to ensure your satisfaction, and we are dedicated to addressing and resolving any problems that may occur. Please be assured that we take all complaints seriously and are committed to providing the best service possible. We have implemented stringent quality control measures to minimize such issues, but if any damage does occur, we want to make it right.
     </p>
     <p class="text-gray-700">
      Your feedback is invaluable in helping us improve our service and prevent future occurrences. Thank you for your patience and understanding as we work to resolve this matter promptly.
     </p>
    </div>
    <div class="w-1/2 bg-white p-8 shadow rounded">
     <form>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="name-item">
            Order ID <span class="text-red-700">*</span>
        </label>
       <input class="w-full border border-gray-300 p-2 rounded" id="order-id" placeholder="Write an Order ID" type="text"/>
       @error('order-id') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="title">
            Title <span class="text-red-700">*</span>
            </label>
       <input class="w-full border border-gray-300 p-2 rounded" id="title" placeholder="Write a Title" type="text"/>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="image">
            Image <span class="text-red-700">*</span>
            </label>
       <input class="w-full border border-gray-300 p-2 rounded" id="image" type="file"/>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="description">
            Description <span class="text-red-700">*</span>
            </label>
       <textarea class="w-full border border-gray-300 p-2 rounded" id="description" placeholder="Write a description"></textarea>
      </div>
      <button class="bg-sky-700 text-white px-4 py-2 rounded-xl" type="submit">
       Send
      </button>
     </form>
    </div>
   </section>

@endsection