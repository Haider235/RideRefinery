@extends('layouts.frontend')

@section('title', 'Brands')

@section('content')
    <!-- Banner -->
    <section class="relative bg-gray-900 text-white">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1558980664-10ea24e7cc9a?auto=format&fit=crop&w=1920&q=80" 
                 alt="Bike Brands Banner" 
                 class="w-full h-full object-cover opacity-50">
        </div>
        <div class="relative container mx-auto px-6 py-20 text-center">
            <h1 class="text-4xl md:text-5xl font-bold">Motorbike Brands</h1>
            <p class="mt-4 text-lg text-gray-200">Explore our wide selection of trusted motorcycle manufacturers</p>
        </div>
    </section>

    <!-- Brands Grid -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @forelse($brands as $brand)
                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-6 flex flex-col items-center text-center">
                        <div class="h-20 flex items-center">
                            <img src="{{ asset('storage/' . $brand->logo) }}" 
                                 alt="{{ $brand->name }} Logo" 
                                 class="max-h-16 object-contain">
                        </div>
                        <h3 class="mt-4 text-xl font-bold text-gray-800">{{ $brand->name }}</h3>
                        <a href="{{ route('frontend.products.index') }}?brand={{ $brand->name }}" 
                           class="mt-4 inline-block bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                            View Products
                        </a>
                    </div>
                @empty
                    <p class="col-span-4 text-center text-gray-600">No brands found.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
