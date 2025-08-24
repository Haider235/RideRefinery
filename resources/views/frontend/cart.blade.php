@extends('layouts.frontend')

@section('title', 'Shopping Cart')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

    <h1 class="text-4xl font-bold text-gray-900 mb-8 text-center">Your Shopping Cart</h1>

    @if(session('cart') && count(session('cart')) > 0)
        <!-- Cart Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow rounded-xl overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-6 text-left text-gray-700">Product</th>
                        <th class="py-3 px-6 text-center text-gray-700">Price</th>
                        <th class="py-3 px-6 text-center text-gray-700">Quantity</th>
                        <th class="py-3 px-6 text-center text-gray-700">Total</th>
                        <th class="py-3 px-6 text-center text-gray-700">Remove</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @php $subtotal = 0; @endphp
                    @foreach(session('cart') as $id => $item)
                        @php $total = $item['price'] * $item['quantity']; $subtotal += $total; @endphp
                        <tr>
                            <td class="py-4 px-6 flex items-center space-x-4">
                                <img class="w-20 h-20 rounded-lg object-cover" src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}">
                                <span class="font-medium text-gray-900">{{ $item['name'] }}</span>
                            </td>
                            <td class="py-4 px-6 text-center text-gray-900 font-semibold">PKR{{ number_format($item['price'], 2) }}</td>
                            <td class="py-4 px-6 text-center">
                                <form method="POST" action="{{ route('cart.update', $id) }}" class="flex items-center justify-center space-x-2">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-20 text-center border rounded-md py-1">
                                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-md transition">Update</button>
                                </form>
                            </td>
                            <td class="py-4 px-6 text-center text-gray-900 font-semibold">PKR{{ number_format($total, 2) }}</td>
                            <td class="py-4 px-6 text-center">
                                <form method="POST" action="{{ route('cart.remove', $id) }}">
                                    @csrf
                                    <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md transition">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Cart Summary -->
        <div class="mt-10 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
            <div>
                <a href="{{ url('/') }}" class="inline-block bg-white border border-gray-300 hover:border-gray-400 hover:bg-gray-50 text-gray-800 font-semibold px-6 py-3 rounded-lg transition shadow-sm">
                    ← Continue Shopping
                </a>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-lg w-full lg:w-1/3 space-y-5 border border-gray-200">
                <h2 class="text-2xl font-bold text-gray-900">Order Summary</h2>
                <div class="flex justify-between text-gray-700 font-medium text-lg">
                    <span>Subtotal:</span>
                    <span>PKR{{ number_format($subtotal, 2) }}</span>
                </div>
                @php
                    $tax = $subtotal * 0.05; // Example 5% tax
                    $total = $subtotal + $tax;
                @endphp
                <div class="flex justify-between text-gray-700 font-medium text-lg">
                    <span>Tax:</span>
                    <span>PKR{{ number_format($tax, 2) }}</span>
                </div>
                <div class="flex justify-between text-gray-900 font-bold text-xl">
                    <span>Total:</span>
                    <span>PKR{{ number_format($total, 2) }}</span>
                </div>
                <a href="{{ url('/checkout') }}" class="block bg-red-600 hover:bg-red-700 text-white text-center font-semibold py-3 rounded-xl transition shadow-md hover:shadow-lg">
                    Proceed to Checkout
                </a>
            </div>
        </div>

    @else
        <p class="text-center text-gray-700 text-lg mt-10">Your cart is empty. <a href="{{ url('/') }}" class="text-red-600 hover:underline">Shop now</a>.</p>
    @endif
</div>
@endsection
