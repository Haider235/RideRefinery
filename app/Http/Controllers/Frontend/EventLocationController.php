<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\EventRegistration;
use App\Models\EventParticipantLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventLocationController extends Controller
{
    /**
     * Store a participant location (manual/admin usage)
     */
    public function store(Request $request)
    {
        $request->validate([
            'registration_id' => 'required|exists:event_registrations,id',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        EventParticipantLocation::create([
            'event_registration_id' => $request->registration_id, // updated field name
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return response()->json(['status' => 'success']);
    }

    /**
     * Update the location of the logged-in customer for a specific event
     */
    public function update(Request $request, $eventId)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Get the registration of the logged-in customer for this event
        $registration = EventRegistration::where('event_id', $eventId)
            ->where('customer_id', Auth::guard('customer')->id())
            ->firstOrFail();

        // Save the location
        EventParticipantLocation::create([
            'event_registration_id' => $registration->id, // updated field name
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return response()->json(['success' => true]);
    }
}
