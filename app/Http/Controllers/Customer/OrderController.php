<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        // Get all orders for the logged-in customer
        $orders = Order::where('customer_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return view('customer.orders', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('customer_id', Auth::id())->findOrFail($id);

        return view('customer.order-details', compact('order'));
    }
}
