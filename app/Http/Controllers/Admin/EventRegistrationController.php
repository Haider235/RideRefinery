<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventRegistrationController extends Controller
{
public function index()
{
    $registrations = DB::table('event_registrations as er')
        ->join('customers as c', 'er.customer_id', '=', 'c.id')
        ->join('events as e', 'er.event_id', '=', 'e.id')
        ->select(
            'er.id as registration_id',
            'c.first_name',
            'c.last_name',
            'c.email',
            'c.phone',
            'e.name as event_name',
            'er.phone as registration_phone',
            'er.notes',
            'er.created_at'
        )
        ->orderBy('er.created_at', 'desc')
        ->get();

    return view('admin.event_registrations.index', compact('registrations'));
}

}
