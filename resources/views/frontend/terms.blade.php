@extends('layouts.frontend')

@section('title', 'Terms & Conditions')

@section('content')
<div class="bg-light min-h-screen py-16">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-4xl font-bold text-dark mb-6">Terms & Conditions</h1>
        <p class="text-gray-600 mb-6">
            Welcome to our website. Please read these Terms & Conditions carefully before using our services. 
            By accessing or using our site, you agree to comply with these terms.
        </p>

        <h2 class="text-2xl font-semibold text-dark mb-3">1. Acceptance of Terms</h2>
        <p class="text-gray-600 mb-6">
            By using our website, you confirm that you accept these terms and agree to abide by them.
        </p>

        <h2 class="text-2xl font-semibold text-dark mb-3">2. Use of Services</h2>
        <p class="text-gray-600 mb-6">
            You agree not to misuse our services or assist anyone else in doing so. This includes prohibiting
            unauthorized access, interference with our system, or illegal activities.
        </p>

        <h2 class="text-2xl font-semibold text-dark mb-3">3. Intellectual Property</h2>
        <p class="text-gray-600 mb-6">
            All content on this site, including text, images, and logos, are owned by us or licensed to us. 
            You may not use them without permission.
        </p>

        <h2 class="text-2xl font-semibold text-dark mb-3">4. Limitation of Liability</h2>
        <p class="text-gray-600 mb-6">
            We are not responsible for any damages resulting from your use of our site or services.
        </p>

        <h2 class="text-2xl font-semibold text-dark mb-3">5. Changes to Terms</h2>
        <p class="text-gray-600 mb-6">
            We may revise these terms at any time. Changes will be posted on this page and will take effect 
            immediately upon posting.
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
