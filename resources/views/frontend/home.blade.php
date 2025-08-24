@extends('layouts.frontend')

@section('title', 'Home - Ride Refinery')

@section('content')

<!-- Hero Section -->
<section class="relative bg-gray-900 text-white">
    <div class="absolute inset-0">
        <img src="https://superstarmotorcycle.com/cdn/shop/files/2.webp"
             alt="Motorcycle Banner"
             class="w-full h-full object-cover opacity-30">
    </div>
    <div class="relative container mx-auto py-20 px-6 flex flex-col md:flex-row items-center justify-between">
        <div class="max-w-lg space-y-4">
            <h1 class="text-4xl md:text-5xl font-bold">Ride Into Adventure</h1>
            <p class="text-lg text-gray-300">
                Discover premium bikes, accessories, and riding experiences crafted for enthusiasts.
            </p>
            <a href="{{ route('frontend.products.index') }}"
               class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded shadow-lg transition">
                Shop Now
            </a>
        </div>
        <div class="mt-8 md:mt-0">

        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="container mx-auto py-16">
    <h2 class="text-3xl font-bold text-center mb-10">Featured Products</h2>

    @if($featuredProducts->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($featuredProducts as $product)
                <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-lg transition">
                    <img src="{{ asset('storage/' . $product->image) }}"
                         alt="{{ $product->name }}"
                         class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">{{ $product->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($product->description, 60) }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-red-600 font-bold">PKR{{ number_format($product->price, 2) }}</span>
                            <a href="{{ route('frontend.products.show', $product->slug) }}" class="mt-4 inline-block bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded transition">View</a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-500">No featured products available.</p>
    @endif

    <div class="text-center mt-10">
        <a href="{{ route('frontend.products.index') }}"
           class="bg-gray-800 hover:bg-gray-900 text-white px-6 py-3 rounded">
            Explore More Products
        </a>
    </div>
</section>

<!-- Why Choose Us -->
<section class="bg-gray-100 py-16">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
        <div class="p-6 bg-white shadow rounded-lg hover:shadow-lg transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto text-red-600 mb-4" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 7h18M3 12h18M3 17h18"/>
            </svg>
            <h3 class="text-xl font-bold mb-2">Wide Selection</h3>
            <p class="text-gray-600">Choose from top brands and latest bike models for every rider.</p>
        </div>
        <div class="p-6 bg-white shadow rounded-lg hover:shadow-lg transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto text-red-600 mb-4" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8c-1.657 0-3 1.343-3 3h6c0-1.657-1.343-3-3-3z"/>
            </svg>
            <h3 class="text-xl font-bold mb-2">Expert Support</h3>
            <p class="text-gray-600">Our experienced staff will guide you from selection to maintenance.</p>
        </div>
        <div class="p-6 bg-white shadow rounded-lg hover:shadow-lg transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto text-red-600 mb-4" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 3h18v18H3z"/>
            </svg>
            <h3 class="text-xl font-bold mb-2">Affordable Prices</h3>
            <p class="text-gray-600">Get the best deals without compromising quality and safety.</p>
        </div>
    </div>
</section>

@endsection
