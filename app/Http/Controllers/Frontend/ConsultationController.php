<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consultation;

class ConsultationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'required|string|max:20',
            'service' => 'required|string',
            'message' => 'required|string',
        ]);

        Consultation::create($request->only(['name', 'email', 'phone', 'service', 'message']));

        return redirect()->route('request.consultation')
                         ->with('success', 'Your consultation request has been submitted successfully!');
    }
}
