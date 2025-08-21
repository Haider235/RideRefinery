@extends('layouts.customer')

@section('title', 'Login')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-center text-red-600">Customer Login</h2>

    <form method="POST" action="{{ route('customer.login') }}" class="space-y-4">
        @csrf

        <input type="email" name="email" placeholder="Email" required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring">

        <input type="password" name="password" placeholder="Password" required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring">

        <button type="submit"
            class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 transition">
            Login
        </button>

        <div class="text-center mt-4">
            <a href="{{ route('customer.register') }}" class="text-red-600 hover:underline">
                Don't have an account? Register
            </a>
        </div>
    </form>
</div>
@endsection
