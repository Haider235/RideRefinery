@extends('layouts.customer')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-6xl mx-auto">
    {{-- Welcome banner --}}
    <div class="bg-gradient-to-r from-red-600 to-red-500 text-white p-6 rounded-2xl shadow mb-8">
        <h1 class="text-3xl font-bold text-dark">Welcome back, {{ auth('customer')->user()->full_name }} 🎉</h1>
        <p class="mt-2 text-red-100">You are successfully logged in to your customer account.</p>
    </div>

    {{-- Quick action cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="{{ route('customer.orders') }}"
           class="group p-6 bg-white shadow rounded-2xl hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-red-600">Your Orders</h2>
                <span class="text-gray-400 group-hover:text-red-600 transition">➜</span>
            </div>
            <p class="text-sm text-gray-600 mt-2">Track and manage your orders easily.</p>
        </a>

        <a href="{{ route('customer.profile.edit') }}"
           class="group p-6 bg-white shadow rounded-2xl hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-red-600">Edit Profile</h2>
                <span class="text-gray-400 group-hover:text-red-600 transition">➜</span>
            </div>
            <p class="text-sm text-gray-600 mt-2">Keep your personal information up to date.</p>
        </a>

        <a href="{{ route('customer.events') }}"
           class="group p-6 bg-white shadow rounded-2xl hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-red-600">Events</h2>
                <span class="text-gray-400 group-hover:text-red-600 transition">➜</span>
            </div>
            <p class="text-sm text-gray-600 mt-2">Stay updated on your registered events.</p>
        </a>
    </div>

    {{-- Account info --}}
    <div class="mt-10 bg-white p-6 rounded-2xl shadow">
        <h3 class="text-lg font-semibold text-red-600 mb-4">Account Information</h3>
        <ul class="text-gray-700 space-y-2">
            <li><strong>Name:</strong> {{ auth('customer')->user()->full_name }}</li>
            <li><strong>Email:</strong> {{ auth('customer')->user()->email }}</li>
            <li><strong>Phone:</strong> {{ auth('customer')->user()->phone ?? 'Not provided' }}</li>
            <li><strong>Address:</strong>
                {{ auth('customer')->user()->address ?? 'Not provided' }},
                {{ auth('customer')->user()->city ?? '' }}
            </li>
        </ul>
    </div>
</div>
@endsection
