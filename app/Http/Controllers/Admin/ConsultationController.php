<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index()
    {
        // Get latest submissions, paginate 10 per page
        $consultations = Consultation::latest()->paginate(10);

        return view('admin.consultations.index', compact('consultations'));
    }
}
