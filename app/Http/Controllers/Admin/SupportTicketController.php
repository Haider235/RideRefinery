<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupportTicket;

class SupportTicketController extends Controller
{
    public function index()
    {
        $tickets = SupportTicket::latest()->paginate(10);
        return view('admin.support.index', compact('tickets'));
    }

    public function show(SupportTicket $supportTicket)
    {
        return view('admin.support.show', compact('supportTicket'));
    }
}
