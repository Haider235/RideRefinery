@extends('layouts.frontend')

@section('title', 'Shipping Policy')

@section('content')
<div class="bg-light min-h-screen py-16">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-4xl font-bold text-dark mb-6">Shipping Policy</h1>

        <h2 class="text-2xl font-semibold text-dark mb-3">Payment and Shipping Agreement</h2>
        <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
            <li><strong>Upfront Payment:</strong> All transactions on Ride Refinery are based on upfront payment from the buyer to the seller, using an agreed-upon method. Cash on delivery is not supported or recommended as it does not align with our upfront payment model.</li>
            <li><strong>Shipping Arrangements:</strong> The seller must provide clear information about the shipping method, carrier, and associated costs in their listing. The buyer should confirm these details with the seller before making the purchase.</li>
            <li><strong>Tracking and Delivery:</strong> Once payment is made, the seller is responsible for providing the buyer with a tracking number and regular updates on the shipment's status until delivery is complete.</li>
        </ul>

        <h2 class="text-2xl font-semibold text-dark mb-3">Our Role</h2>
        <p class="text-gray-600 mb-6">
            Ride Refinery's role is limited to providing the platform for communication and listings. 
            We are not responsible for any issues that may arise during the shipping process, including delays, damages, or lost items. 
            We encourage parties to communicate openly and to use reliable shipping methods with insurance where appropriate.
        </p>

        <div class="mt-10 flex justify-end">
            <a href="{{ url('/') }}" 
               class="px-6 py-3 bg-red-600 text-white font-semibold rounded-md shadow hover:bg-red-700 transition">
               Back to Home
            </a>
        </div>
    </div>
</div>
@endsection
