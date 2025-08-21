<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        // Paginate events
        $events = Event::orderBy('created_at', 'desc')->paginate(9);
        return view('frontend.events', compact('events'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('frontend.event-single', compact('event'));
    }

public function register(Request $request, $id)
{
    // Ensure customer is logged in
    if (!auth('customer')->check()) {
        return redirect()->route('customer.login')
            ->with('error', 'You must be logged in to sign up for an event.');
    }

    $request->validate([
        'phone' => 'required|string|max:20',
        'notes' => 'nullable|string',
    ]);

    EventRegistration::create([
        'customer_id' => auth('customer')->id(), // ✅ use customer guard
        'event_id' => $id,
        'phone' => $request->phone,
        'notes' => $request->notes,
    ]);

    return redirect()->route('events') // ✅ go to customer dashboard/events page
        ->with('success', 'You have successfully signed up for this event.');
}

}
