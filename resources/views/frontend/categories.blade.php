@extends('layouts.frontend')

@section('title', 'Bike Categories')

@section('content')

<!-- Hero Section -->
<section class="relative bg-gray-900 text-white py-16 mb-12">
    <div class="absolute inset-0">
        
    </div>
    <div class="relative z-10 text-center">
        <h1 class="text-4xl font-bold mb-4">Explore Our Categories</h1>
        <p class="text-lg text-gray-300 max-w-2xl mx-auto">
            Find the perfect ride or parts for your needs — from sports bikes to off-road adventures.
        </p>
    </div>
</section>

<!-- Categories Grid -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        
        @forelse ($categories as $category)
            <a href="{{ url('/products') }}?category={{ $category->name }}" 
   class="group block rounded-lg shadow hover:shadow-lg overflow-hidden transition bg-gradient-to-r from-red-500 to-red-700 p-10 text-center text-white">
    
    <h3 class="text-2xl font-bold group-hover:scale-105 transition-transform">
        {{ $category->name }}
    </h3>

    @if($category->description)
        <p class="text-sm text-gray-100 mt-3">{{ Str::limit($category->description, 80) }}</p>
    @endif
</a>

        @empty
            <p class="col-span-4 text-center text-gray-500">No categories available.</p>
        @endforelse

    </div>
</section>

@endsection
