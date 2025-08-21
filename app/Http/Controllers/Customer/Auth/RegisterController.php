<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('customer.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['nullable', 'string', 'max:255'],
            'email'      => ['required', 'email', 'unique:customers,email'],
            'phone'      => ['required', 'string', 'max:20'],
            'address'    => ['required', 'string', 'max:255'],
            'city'       => ['required', 'string', 'max:100'],
            'state'      => ['required', 'string', 'max:100'],
            'zip_code'   => ['required', 'string', 'max:20'],
            'password'   => ['required', 'confirmed', 'min:6'],
        ]);

        $customer = Customer::create([
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'] ?? null,
            'email'      => $validated['email'],
            'phone'      => $validated['phone'],
            'address'    => $validated['address'],
            'city'       => $validated['city'],
            'state'      => $validated['state'],
            'zip_code'   => $validated['zip_code'],
            'status'     => 1, // active by default
            'password'   => Hash::make($validated['password']),
        ]);

        // Auto-login if active
        if ($customer->status == 1) {
            Auth::guard('customer')->login($customer);
            return redirect()->route('customer.dashboard')
                ->with('success', 'Welcome, your account has been created!');
        }

        return redirect()->route('customer.login')
            ->with('info', 'Your account was created. Please wait for activation.');
    }
}
