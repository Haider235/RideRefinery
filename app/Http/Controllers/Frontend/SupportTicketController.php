<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupportTicket;

class SupportTicketController extends Controller
{
    public function create()
    {
        return view('frontend.support.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
            'issue' => 'required|string|min:10',
        ]);

        SupportTicket::create($request->only('name', 'email', 'issue'));

        return redirect()->back()->with('success', 'Your support request has been submitted!');
    }
}
