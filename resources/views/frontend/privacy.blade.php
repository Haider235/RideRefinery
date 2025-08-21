@extends('layouts.frontend')

@section('title', 'Privacy Policy')

@section('content')
<div class="bg-light min-h-screen py-16">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-4xl font-bold text-dark mb-6">Privacy Policy</h1>
        <p class="text-gray-600 mb-6">
            Your privacy is important to us. This policy explains how we collect, use, and protect your personal information.
            By using our services, you consent to the practices described in this policy.
        </p>

        <h2 class="text-2xl font-semibold text-dark mb-3">1. Information We Collect</h2>
        <p class="text-gray-600 mb-6">
            We may collect personal information such as your name, email address, phone number, and payment details when you interact with our site.
        </p>

        <h2 class="text-2xl font-semibold text-dark mb-3">2. How We Use Your Information</h2>
        <p class="text-gray-600 mb-6">
            Your information is used to process orders, provide customer support, send updates, and improve our services.
        </p>

        <h2 class="text-2xl font-semibold text-dark mb-3">3. Sharing of Information</h2>
        <p class="text-gray-600 mb-6">
            We do not sell or rent your information. We may share it with trusted third parties only to fulfill services 
            (such as payment processing and delivery).
        </p>

        <h2 class="text-2xl font-semibold text-dark mb-3">4. Data Security</h2>
        <p class="text-gray-600 mb-6">
            We take reasonable precautions to protect your data from unauthorized access, disclosure, alteration, or destruction.
        </p>

        <h2 class="text-2xl font-semibold text-dark mb-3">5. Changes to this Policy</h2>
        <p class="text-gray-600 mb-6">
            We may update this policy periodically. Any changes will be posted on this page with an updated revision date.
        </p>

        <div class="mt-10 flex justify-end space-x-4">
            <a href="{{ url('/') }}" 
               class="px-6 py-3 bg-red-600 text-white font-semibold rounded-md shadow hover:bg-red-700 transition">
               Back to Home
            </a>
            <a href="{{ url('/shop') }}" 
               class="px-6 py-3 bg-gray-200 text-dark font-semibold rounded-md shadow hover:bg-gray-300 transition">
               Back to Shop
            </a>
        </div>
    </div>
</div>
@endsection
