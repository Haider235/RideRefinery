@extends('layouts.frontend')

@section('title', 'Request a Consultation')

@section('content')
<!-- Hero -->

<section class="relative bg-gray-900 text-white">
    <div class="absolute inset-0">
        <img src="https://superstarmotorcycle.com/cdn/shop/files/3.webp" 
             alt="Consultation Banner" class="w-full h-full object-cover opacity-60">
    </div>
    <div class="relative container mx-auto py-20 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Request a Free Consultation</h1>
        <p class="text-lg max-w-2xl mx-auto">Get expert advice on your bike purchase, maintenance, or riding needs. Our team is here to guide you every step of the way.</p>
    </div>
</section>

<!-- Consultation Form -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-12">
        
        <!-- Form -->
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Book Your Free Consultation</h2>
            <!-- Flash Messages -->
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('request.consultation.store') }}" method="POST" class="space-y-5">
    @csrf
    <!-- your fields stay same -->
</form>

            <form action="#" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" id="name" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="tel" id="phone" name="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                </div>
                <div>
                    <label for="service" class="block text-sm font-medium text-gray-700">Preferred Service</label>
                    <select id="service" name="service" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                        <option value="">Select a Service</option>
                        <option value="purchase">Bike Purchase Advice</option>
                        <option value="maintenance">Maintenance Consultation</option>
                        <option value="riding">Ride Training Guidance</option>
                        
                        
                    </select>
                </div>
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">Your Message</label>
                    <textarea id="message" name="message" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm"></textarea>
                </div>
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-medium px-6 py-3 rounded-md shadow-md">Submit Request</button>
            </form>
        </div>

        <!-- Why Consultation -->
        <div class="space-y-8">
            <div>
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Why Request a Consultation?</h2>
                <ul class="space-y-3 text-gray-700">
                    <li>✅ Personalized advice tailored to your needs</li>
                    <li>✅ Save money with the right purchase guidance</li>
                    <li>✅ Get expert maintenance tips for your bike</li>
                    <li>✅ Improve your riding skills with pro insights</li>
                </ul>
            </div>
  <div>
</div>

        </div>
    </div>
</section>
@endsection
