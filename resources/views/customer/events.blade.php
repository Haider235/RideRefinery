@extends('layouts.customer')

@section('title', 'Events')

@section('content')
<div class="max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-red-600">Events You've Signed Up For</h2>

    @if($registrations->isEmpty())
        <p class="text-gray-600">You haven’t signed up for any events yet.</p>
    @else
        <div class="space-y-4">
            @foreach($registrations as $registration)
                <div class="bg-white p-6 rounded shadow hover:bg-gray-50 transition">
                    <h3 class="text-xl font-semibold text-red-600">
                        {{ $registration->event->name }}
                    </h3>
                    <p class="text-sm text-gray-600">
                        📅 Start: {{ \Carbon\Carbon::parse($registration->event->start_time)->format('F d, Y h:i A') }}
                    </p>
                    <p class="text-sm text-gray-600">
                        📅 End: {{ \Carbon\Carbon::parse($registration->event->end_time)->format('F d, Y h:i A') }}
                    </p>
                    <p class="text-sm text-gray-600">
                        📍 From: {{ $registration->event->start_point }} → {{ $registration->event->end_point }}
                    </p>
                    <p class="text-sm text-gray-600">
                        🎟️ Status: Registered
                    </p>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
