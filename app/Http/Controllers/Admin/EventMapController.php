<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventParticipantLocation;

class EventMapController extends Controller
{
public function show($id)
{
    $event = Event::findOrFail($id);

    $locations = EventParticipantLocation::whereHas('registration', function($q) use ($id) {
    $q->where('event_id', $id);
})->with('registration.customer')->latest()->get();

    if(request()->ajax()) {
        return response()->json($locations);
    }

    return view('admin.events.event-map', compact('event', 'locations'));
}

}
