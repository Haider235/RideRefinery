<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RideBooking;
use Illuminate\Http\Request;

class RideBookingController extends Controller
{
    public function index()
    {
        $rideBookings = RideBooking::latest()->paginate(10);
        return view('admin.ride_bookings.index', compact('rideBookings'));
    }
}
