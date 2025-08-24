<x-app-layout>

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Order #{{ $order->id }}</h1>

    <div class="mb-4">
        <h2 class="font-semibold">Customer Info</h2>
        <p>{{ $order->first_name }} {{ $order->last_name }}</p>
        <p>{{ $order->email }}</p>
        <p>{{ $order->phone }}</p>
        <p>{{ $order->address }}, {{ $order->city }}, {{ $order->zip }}</p>
    </div>

    <div class="mb-4">
        <h2 class="font-semibold">Payment Info</h2>
        <p>Method: {{ $order->payment_method }}</p>
        @if($order->account_number)
        <p>Account: {{ $order->account_name }} - {{ $order->account_number }}</p>
        @endif
        @if($order->card_number)
        <p>Card: **** **** **** {{ substr($order->card_number, -4) }}</p>
        @endif
        @if($order->screenshot_path)
        <p>Screenshot:</p>
        <img src="{{ asset('storage/'.$order->screenshot_path) }}" class="w-48 h-48 object-cover border rounded">
        @endif
    </div>

    <div class="mb-4">
        <h2 class="font-semibold">Order Details</h2>
        <p>Amount: PKR{{ $order->amount }}</p>
        <p>Status: {{ $order->status }}</p>
    </div>

    <a href="{{ route('admin.orders.index') }}" class="text-blue-500">Back to Orders</a>
</div>
</x-app-layout>