@extends('layouts.customer')

@section('title', 'Register')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-center text-red-600">Customer Registration</h2>

    {{-- Show global validation errors --}}
    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('customer.register') }}" class="space-y-4">
        @csrf

        <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring">
        @error('first_name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror

        <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name"
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring">
        @error('last_name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror

        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring">
        @error('email')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror

        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring">
        @error('phone')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror

        <input type="text" name="address" value="{{ old('address') }}" placeholder="Address" required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring">
        @error('address')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror

        <input type="text" name="city" value="{{ old('city') }}" placeholder="City" required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring">
        @error('city')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror

        <input type="text" name="state" value="{{ old('state') }}" placeholder="State" required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring">
        @error('state')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror

        <input type="text" name="zip_code" value="{{ old('zip_code') }}" placeholder="Zip Code" required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring">
        @error('zip_code')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror

        <input type="password" name="password" placeholder="Password" required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring">
        @error('password')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror

        <input type="password" name="password_confirmation" placeholder="Confirm Password" required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring">
        @error('password_confirmation')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror

        <button type="submit"
            class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 transition">
            Register
        </button>

        <div class="text-center mt-4">
            <a href="{{ route('customer.login') }}" class="text-red-600 hover:underline">
                Already have an account? Login
            </a>
        </div>
    </form>
</div>
@endsection
