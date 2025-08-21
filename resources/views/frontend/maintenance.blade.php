@extends('layouts.frontend')

@section('title', 'Book Maintenance')

@section('content')
<!-- Hero Banner -->
<section class="relative bg-gray-900 text-white">
    <div class="absolute inset-0">
        <img class="w-full h-full object-cover opacity-60"
             src="https://images.pexels.com/photos/3803866/pexels-photo-3803866.jpeg?auto=compress&cs=tinysrgb&w=1600"
             alt="Bike Maintenance">
    </div>
    <div class="relative container mx-auto px-6 py-20 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Book Your Bike Maintenance</h1>
        <p class="text-lg text-gray-200">Keep your ride in top shape with our professional maintenance services.</p>
    </div>
</section>

<!-- Booking Form -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6 md:px-12">
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Maintenance Booking Form</h2>

            {{-- Success Message --}}
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('maintenance.store') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
                </div>

                <div>
                    <label for="service_date" class="block text-sm font-medium text-gray-700">Preferred Service Date</label>
                    <input type="date" id="service_date" name="service_date" value="{{ old('service_date') }}" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
                </div>

                <div>
                    <label for="service_type" class="block text-sm font-medium text-gray-700">Service Type</label>
                    <select id="service_type" name="service_type" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
                        <option value="">Select Service</option>
                        <option value="general" {{ old('service_type') == 'general' ? 'selected' : '' }}>General Service</option>
                        <option value="engine" {{ old('service_type') == 'engine' ? 'selected' : '' }}>Engine Check</option>
                        <option value="brakes" {{ old('service_type') == 'brakes' ? 'selected' : '' }}>Brake Service</option>
                        <option value="tuning" {{ old('service_type') == 'tuning' ? 'selected' : '' }}>Full Tuning</option>
                    </select>
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">Additional Notes</label>
                    <textarea id="message" name="message" rows="4"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"
                        placeholder="Any special requests or issues?">{{ old('message') }}</textarea>
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-md shadow-md">
                        Book Maintenance
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
