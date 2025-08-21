<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function show()
    {
        return view('frontend.checkout');
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'firstName'     => 'required',
            'lastName'      => 'required',
            'email'         => 'required|email',
            'phone'         => 'required',
            'address'       => 'required',
            'city'          => 'required',
            'zip'           => 'required',
            'paymentMethod' => 'required',
            'amount'        => 'required|numeric',
            'screenshot'    => 'required|image|max:2048',
        ]);

        // upload screenshot
        $path = $request->file('screenshot')->store('uploads', 'public');

        Order::create([
            'first_name'     => $request->firstName,
            'last_name'      => $request->lastName,
            'email'          => $request->email,
            'phone'          => $request->phone,
            'address'        => $request->address,
            'city'           => $request->city,
            'zip'            => $request->zip,
            'payment_method' => $request->paymentMethod,
            'account_number' => $request->accountNumber,
            'account_name'   => $request->accountName,
            'card_number'    => $request->cardNumber,
            'cvv'            => $request->cvv,
            'expiry'         => $request->expiry,
            'amount'         => $request->amount,
            'screenshot_path'=> $path,
            'status'         => 'pending',
        ]);
    session()->forget('cart');

        return redirect()->route('frontend.products.index');
    }
}
