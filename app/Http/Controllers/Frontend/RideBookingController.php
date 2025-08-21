<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\RideBooking;
use Illuminate\Http\Request;

class RideBookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'phone'         => 'required|string|max:20',
            'training_date' => 'required|date|after_or_equal:today',
            'level'         => 'required|in:beginner,intermediate,advanced',
            'message'       => 'nullable|string',
        ]);

        RideBooking::create($request->only([
            'name', 'email', 'phone', 'training_date', 'level', 'message'
        ]));

        return redirect()->back()->with('success', 'Ride training booked successfully!');
    }
}
