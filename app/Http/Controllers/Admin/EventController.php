<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $now = now();

        // Active events: events where end_time is in the future
        $activeEvents = Event::where('end_time', '>=', $now)
            ->orderBy('start_time', 'asc')
            ->paginate(6, ['*'], 'activePage'); // separate pagination if needed

        // Past events: events where end_time is in the past
        $pastEvents = Event::where('end_time', '<', $now)
            ->orderBy('start_time', 'desc')
            ->paginate(6, ['*'], 'pastPage');

        return view('admin.events.index', compact('activeEvents', 'pastEvents'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time'  => 'required|date',
            'end_time'    => 'required|date|after_or_equal:start_time',
            'start_point' => 'required|string|max:255',
            'end_point'   => 'required|string|max:255',
        ]);

        Event::create($validated);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time'  => 'required|date',
            'end_time'    => 'required|date|after_or_equal:start_time',
            'start_point' => 'required|string|max:255',
            'end_point'   => 'required|string|max:255',
        ]);

        $event->update($validated);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event deleted successfully.');
    }
}
