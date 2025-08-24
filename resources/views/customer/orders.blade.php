@extends('layouts.customer')

@section('title', 'Orders')

@section('content')
<div class="max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-red-600">Your Orders</h2>

    @if($orders->isEmpty())
        <p class="text-gray-600">You haven’t placed any orders yet.</p>
    @else
        <div class="bg-white shadow rounded overflow-hidden">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left">Order #</th>
                        <th class="px-4 py-2 text-left">Date</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-left">Total</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr class="border-t">
                            <td class="px-4 py-2">#{{ $order->id }}</td>
                            <td class="px-4 py-2">{{ $order->created_at->format('M d, Y') }}</td>
                            <td class="px-4 py-2">{{ ucfirst($order->status) }}</td>
                            <td class="px-4 py-2">PKR{{ number_format($order->amount, 2) }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('customer.orders.show', $order->id) }}" class="text-red-600 hover:underline">
                                    View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
