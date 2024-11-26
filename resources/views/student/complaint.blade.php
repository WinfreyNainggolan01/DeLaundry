@extends('student.layout.main')

@section('head')
    <title>Complaint | DeLaundry</title>
    <style>
        /* Layout default (side-by-side) */
        .complaint-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 2rem;
            max-width: 100%;
        }

        .complaint-box {
            background-color: #ffffff;
            padding: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            width: 100%;
            max-width: 45%;
            margin: 1rem;
        }

        /* Layout untuk perangkat mobile atau layar kecil */
        @media (max-width: 768px) {
            .complaint-container {
                flex-direction: column; /* Menjadikan elemen berada dalam layout vertikal (atas-bawah) */
                align-items: center;
            }

            .complaint-box {
                max-width: 90%; /* Membuat box lebih besar untuk layar kecil */
            }
        }
    </style>
@endsection

@section('content')
<section class="complaint-container">
    <div class="complaint-box">
        <div>
            <h2 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;">
                Report an Issue with Your Laundry
            </h2>
            <p style="color: #000000; margin-bottom: 1rem;">
                We understand that issues can arise with our laundry service, and we sincerely apologize if any of your clothing items have been damaged during the process. Our goal is to ensure your satisfaction, and we are dedicated to addressing and resolving any problems that may occur. Please be assured that we take all complaints seriously and are committed to providing the best service possible.
            </p>    
            <p style="color: #000000;">
                Your feedback is invaluable in helping us improve our service and prevent future occurrences. Thank you for your patience and understanding as we work to resolve this matter promptly.
            </p>
        </div>
    </div>

    <!-- "Create Complaint"-->
    <div class="complaint-box">
        <div>
            <h2 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;">
                Create Complaint
            </h2>
            <form>
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; color: #000000;" for="order-id">Order ID</label>
                    <input style="width: 100%; border: 1px solid #d1d5db; padding: 0.5rem; border-radius: 0.25rem;" id="order-id" placeholder="Write an Order ID" type="text"/>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; color: #000000;" for="title">Title</label>
                    <input style="width: 100%; border: 1px solid #d1d5db; padding: 0.5rem; border-radius: 0.25rem;" id="title" placeholder="Write a Title" type="text"/>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; color: #000000;" for="image">Image</label>
                    <input style="width: 100%; border: 1px solid #d1d5db; padding: 0.5rem; border-radius: 0.25rem;" id="image" type="file"/>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; color: #000000;" for="description">Description</label>
                    <textarea style="width: 100%; border: 1px solid #d1d5db; padding: 0.5rem; border-radius: 0.25rem;" id="description" placeholder="Write a description"></textarea>
                </div>
                <div style="display: flex; justify-content: flex-end; margin-top: 1rem;">
                    <button style="background-color: #1e3a8a; color: #ffffff; padding: 0.5rem 1rem; border-radius: 0.25rem;" type="submit">
                        Send
                    </button>                
                </div>
            </form>
        </div>
    </div>    
</section>
@endsection
