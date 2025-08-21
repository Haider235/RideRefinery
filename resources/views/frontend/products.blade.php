@extends('layouts.frontend')

@section('title', 'Shop - Ride Refinery')

@section('content')
    <!-- Page Banner -->
    <div class="relative bg-gray-900">
        <div class="container mx-auto px-6 py-16 lg:flex lg:items-center lg:justify-between">
            <div class="max-w-lg text-white">
                <h1 class="text-4xl lg:text-5xl font-bold mb-4">Our Latest Bikes & Accessories</h1>
                <p class="text-gray-300 mb-6">Explore our wide range of premium bikes, riding gear, and accessories. Built for speed, comfort, and style.</p>
                <a href="#products" class="bg-red-600 hover:bg-red-700 px-6 py-3 rounded text-lg font-semibold transition">Shop Now</a>
            </div>
            <div class="mt-8 lg:mt-0 lg:ml-12 flex-shrink-0">
                <img src="https://cdn.pixabay.com/photo/2016/11/29/01/17/adventure-1868726_1280.jpg" alt="Bike" class="rounded-lg shadow-lg w-full max-w-md">
            </div>
        </div>
    </div>

    <!-- Filters -->
    <form method="GET" action="{{ route('frontend.products.index') }}">
        <div class="container mx-auto px-6 py-8 flex flex-wrap gap-6 items-center justify-between border-b border-gray-200">
            <div class="flex items-center gap-4">
                <label for="sort" class="text-gray-700 font-semibold">Sort By:</label>
                <select id="sort" name="sort" onchange="this.form.submit()" class="border border-gray-300 rounded px-3 py-2">
                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                </select>
            </div>

            <div class="flex items-center gap-4">
                <label for="category" class="text-gray-700 font-semibold">Category:</label>
                <select id="category" name="category" onchange="this.form.submit()" class="border border-gray-300 rounded px-3 py-2">
                    <option value="">All</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    <!-- Products Grid -->
    <section id="products" class="container mx-auto px-6 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @forelse($products as $product)
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden group">
                    <div class="overflow-hidden">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-56 object-cover group-hover:scale-105 transition duration-300">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $product->name }}</h3>
                        <p class="text-red-600 font-bold mt-2">${{ number_format($product->price, 2) }}</p>
<a href="{{ route('frontend.products.show', $product->slug) }}" class="mt-4 inline-block bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded transition">View Details</a>

                    </div>
                </div>
            @empty
                <p class="col-span-4 text-center text-gray-500">No products found.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </section>
@endsection
