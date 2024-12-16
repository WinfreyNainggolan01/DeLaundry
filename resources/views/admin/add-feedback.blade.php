@extends('admin.layout.main')

@section('head')
    <title>Complaint | Admin - DeLaundry</title>
@endsection

@section('content')
<div class="bg-gray-100 flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-4xl w-full">
        <h1 class="text-2xl font-bold mb-6">
            Give the Feedback
        </h1>
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/2">
                <img alt="Complaint Image" class="rounded-lg mb-6 md:mb-0" height="400" src="{{ url('storage/'. $complaint->image) }}" width="600"/>
                
            </div>
            <div class="md:w-1/2 md:pl-8">
                <div class="mb-4">
                    <h2 class="font-semibold">
                        Order ID
                    </h2>
                    <p>
                        {{ $complaint->order->ordx_id }}
                    </p>
                </div>
                <div class="mb-4">
                    <h2 class="font-semibold">
                        Subject
                    </h2>
                    <p class="text-blue-600">
                        {{ $complaint->title }}
                    </p>
                </div>
                <div class="mb-4">
                    <h2 class="font-semibold">
                        Description
                    </h2>
                    <p class="text-blue-600">
                        {{ $complaint->description }}
                    </p>
                </div>
            </div>
        </div>
        <div class="mt-6">
            <h2 class="font-semibold mb-2">
                Feedback
            </h2>
            <form method="POST" action="{{ route('add.feedback', strtolower($complaint->id)) }}">
                @csrf
                <textarea class="w-full p-4 border rounded-lg mb-4" name="feedback_response" placeholder="Write a feedback" type="text"></textarea>
        </div>
        <div class="flex justify-end mt-6">
            <a class="bg-blue-600 text-white px-6 py-2 rounded-lg mr-4" href="{{ route('admin_complaint') }}">
                Cancel
            </a>
            <button class="bg-green-600 text-white px-6 py-2 rounded-lg" type="submit">
                Send
            </button>
            </form>
        </div>
    </div>
</div>
@endsection

