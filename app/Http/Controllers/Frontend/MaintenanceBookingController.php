<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MaintenanceBooking;

class MaintenanceBookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'phone'        => 'required|string|max:20',
            'service_date' => 'required|date',
            'service_type' => 'required|string|max:100',
            'message'      => 'nullable|string',
        ]);

        MaintenanceBooking::create($validated);

        return redirect()->back()->with('success', 'Your maintenance booking has been submitted successfully!');
    }
}
