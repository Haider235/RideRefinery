<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\EventRegistration;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $registrations = EventRegistration::with('event')
            ->where('customer_id', Auth::guard('customer')->id())
            ->latest()
            ->get();

        return view('customer.events', compact('registrations'));
    }
}
