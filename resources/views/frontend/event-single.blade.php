@extends('layouts.frontend')

@section('title', $event->name)

@section('content')
    <!-- Hidden Event Data for JS -->
    @auth('customer')
    <div id="event-data"
         data-event-id="{{ $event->id }}"
         data-csrf="{{ csrf_token() }}"
         style="display: none;"></div>
    @endauth

    <!-- Banner -->
    <section class="relative bg-gray-900 text-white">
        <img src="https://images.unsplash.com/photo-1533419026881-d2dd01ddc8e1?auto=format&fit=crop&w=1920&q=80"
             alt="Event Banner"
             class="absolute inset-0 w-full h-full object-cover opacity-50">
        <div class="relative container mx-auto px-6 py-20 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $event->name }}</h1>
            <p class="max-w-2xl mx-auto text-lg text-gray-200">
                {{ \Illuminate\Support\Str::limit($event->description, 150) }}
            </p>
        </div>
    </section>

    <!-- Event Details -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6 max-w-3xl bg-white rounded-xl shadow p-8">
            
            <div class="mb-6">
                <p><strong>Start Time:</strong> {{ \Carbon\Carbon::parse($event->start_time)->format('F d, Y h:i A') }}</p>
                <p><strong>End Time:</strong> {{ \Carbon\Carbon::parse($event->end_time)->format('F d, Y h:i A') }}</p>
                <p><strong>Start Point:</strong> {{ $event->start_point }}</p>
                <p><strong>End Point:</strong> {{ $event->end_point }}</p>
            </div>

            <!-- Full Description -->
            <div class="prose max-w-none mb-6">
                <h2 class="text-2xl font-bold mb-3">About this Event</h2>
                <p class="text-gray-700 leading-relaxed">
                    {{ $event->description }}
                </p>
            </div>

            <hr class="my-6">

            <!-- Event Signup -->
            @auth('customer')
                <h3 class="text-xl font-bold mb-4">Sign Up for this Event</h3>

                @if(session('success'))
                    <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('event.register', $event->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium">Phone Number</label>
                        <input type="text" name="phone" class="w-full border rounded p-2" required>
                        @error('phone') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Notes (optional)</label>
                        <textarea name="notes" class="w-full border rounded p-2"></textarea>
                    </div>

                    <button type="submit"
                            class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                        Confirm Signup
                    </button>
                </form>
            @else
                <div class="text-center">
                    <a href="{{ route('customer.login') }}"
                       class="inline-block bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                        Signup for Event
                    </a>
                    <p class="mt-2 text-gray-600 text-sm">You need to login before registering.</p>
                </div>
            @endauth

        </div>
    </section>

    <!-- Live Location Tracking JS -->
    @auth('customer')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const eventElement = document.getElementById('event-data');
            const eventId = eventElement.dataset.eventId;
            const token = eventElement.dataset.csrf;

            if (navigator.geolocation) {

                function sendLocation(position) {
                    fetch(`/event/${eventId}/update-location`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token,
                        },
                        body: JSON.stringify({
                            latitude: position.coords.latitude,
                            longitude: position.coords.longitude
                        })
                    }).catch(err => console.error(err));
                }

                // Use watchPosition for continuous tracking
                navigator.geolocation.watchPosition(sendLocation, 
                    (error) => console.warn("Geolocation error:", error), 
                    { enableHighAccuracy: true, maximumAge: 5000, timeout: 10000 }
                );

            } else {
                console.warn("Geolocation is not supported by this browser.");
            }
        });
    </script>
    @endauth
@endsection
