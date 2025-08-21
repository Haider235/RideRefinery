@extends('layouts.customer')

@section('title', 'Order Details')

@section('content')
<div class="max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-red-600">Order #{{ $order->id }}</h2>

    <div class="bg-white p-6 rounded shadow">
        <p><strong>Name:</strong> {{ $order->first_name }} {{ $order->last_name }}</p>
        <p><strong>Email:</strong> {{ $order->email }}</p>
        <p><strong>Phone:</strong> {{ $order->phone }}</p>
        <p><strong>Address:</strong> {{ $order->address }}, {{ $order->city }}, {{ $order->zip }}</p>
        <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
        <p><strong>Amount:</strong> ${{ number_format($order->amount, 2) }}</p>
        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
        @if($order->screenshot_path)
            <p><strong>Screenshot:</strong> <a href="{{ asset($order->screenshot_path) }}" target="_blank" class="text-red-600 hover:underline">View</a></p>
        @endif
        <p><strong>Ordered on:</strong> {{ $order->created_at->format('M d, Y H:i') }}</p>
    </div>
</div>
@endsection
