@extends('layouts.frontend')

@section('title', $product->name . ' - Ride Refinery')

@section('content')
<div class="container mx-auto py-16">

    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-6 px-4 py-3 rounded bg-green-500 text-white">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <div>
            <img src="{{ asset('storage/' . $product->image) }}"
                 alt="{{ $product->name }}"
                 class="w-full h-96 object-cover rounded shadow">
        </div>
        <div>
            <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
            <p class="text-gray-600 mb-6">{{ $product->description }}</p>
            <span class="text-2xl text-red-600 font-bold mb-6 block">${{ number_format($product->price, 2) }}</span>
            
            <form method="POST" action="{{ route('cart.add', $product->id) }}">
                @csrf
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded shadow">
                    Add to Cart
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
