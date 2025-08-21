<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // fetch 8 latest active products
        $featuredProducts = Product::where('status', 1)
            ->latest()
            ->take(8)
            ->get();

        return view('frontend.home', compact('featuredProducts'));
    }
}
