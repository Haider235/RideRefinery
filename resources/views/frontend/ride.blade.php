@extends('layouts.frontend')

@section('title', 'Book a Ride Training')

@section('content')
<!-- Hero Banner -->
<section class="relative bg-gray-900 text-white">
    <div class="absolute inset-0">
        <img class="w-full h-full object-cover opacity-60"
             src="https://images.pexels.com/photos/296703/pexels-photo-296703.jpeg?auto=compress&cs=tinysrgb&w=1600"
             alt="Ride Training">
    </div>
    <div class="relative container mx-auto px-6 py-20 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Book Your Ride Training</h1>
        <p class="text-lg text-gray-200">Learn from professional instructors and ride with confidence.</p>
    </div>
</section>

<!-- Info Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-6 md:px-12 text-center">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Why Train With Us?</h2>
        <p class="text-gray-600 max-w-2xl mx-auto mb-10">
            Our riding school offers expert guidance for all skill levels — from beginners to advanced riders.
            We focus on safety, skill improvement, and confidence building to make sure you enjoy every moment on the road.
        </p>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="p-6 border rounded-lg shadow hover:shadow-lg transition">
                <img src="https://images.pexels.com/photos/1467337/pexels-photo-1467337.jpeg?auto=compress&cs=tinysrgb&w=600"
                     alt="Instructor"
                     class="w-full h-48 object-cover rounded-md mb-4">
                <h3 class="text-lg font-semibold mb-2">Expert Instructors</h3>
                <p class="text-gray-600">Learn from certified and experienced riding professionals.</p>
            </div>
            <div class="p-6 border rounded-lg shadow hover:shadow-lg transition">
                <img src="https://images.pexels.com/photos/210147/pexels-photo-210147.jpeg?auto=compress&cs=tinysrgb&w=600"
                     alt="Safety Gear"
                     class="w-full h-48 object-cover rounded-md mb-4">
                <h3 class="text-lg font-semibold mb-2">Safety First</h3>
                <p class="text-gray-600">We provide safety gear and focus on responsible riding practices.</p>
            </div>
            <div class="p-6 border rounded-lg shadow hover:shadow-lg transition">
                <img src="https://images.pexels.com/photos/207779/pexels-photo-207779.jpeg?auto=compress&cs=tinysrgb&w=600"
                     alt="Fun Rides"
                     class="w-full h-48 object-cover rounded-md mb-4">
                <h3 class="text-lg font-semibold mb-2">Fun & Adventure</h3>
                <p class="text-gray-600">Enjoy learning while experiencing the thrill of the ride.</p>
            </div>
        </div>
    </div>
</section>

<!-- Booking Form -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6 md:px-12">
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Ride Training Booking Form</h2>

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

            <form action="{{ route('ride.store') }}" method="POST" class="space-y-6">
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
                    <label for="training_date" class="block text-sm font-medium text-gray-700">Preferred Training Date</label>
                    <input type="date" id="training_date" name="training_date" value="{{ old('training_date') }}" required
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
                </div>

                <div>
                    <label for="level" class="block text-sm font-medium text-gray-700">Skill Level</label>
                    <select id="level" name="level" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
                        <option value="">Select Level</option>
                        <option value="beginner" {{ old('level') == 'beginner' ? 'selected' : '' }}>Beginner</option>
                        <option value="intermediate" {{ old('level') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                        <option value="advanced" {{ old('level') == 'advanced' ? 'selected' : '' }}>Advanced</option>
                    </select>
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">Additional Notes</label>
                    <textarea id="message" name="message" rows="4"
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"
                              placeholder="Any special requests or questions?">{{ old('message') }}</textarea>
                </div>

                <div>
                    <button type="submit"
                            class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-md shadow-md">
                        Book Ride Training
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
