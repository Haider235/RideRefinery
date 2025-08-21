{{-- resources/views/frontend/about.blade.php --}}
@extends('layouts.frontend')

@section('title', 'About Us')

@section('content')
    <!-- About Us Header -->
    <section class="relative bg-gray-900 text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">About Ride Refinery</h1>
            <p class="text-lg max-w-2xl mx-auto text-gray-300">
                Your trusted destination for premium bikes, accessories, and services.
            </p>
        </div>
    </section>

    <!-- Our Story -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
            <div>
                <img src="https://images.unsplash.com/photo-1518655048521-f130df041f66?q=80&w=1000&auto=format&fit=crop"
                    alt="Our Story" class="rounded-lg shadow-lg w-full">
            </div>
            <div>
                <h2 class="text-3xl font-bold mb-4 text-gray-800">Our Story</h2>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Since our inception, Ride Refinery has been dedicated to providing high-quality bicycles,
                    accessories, and exceptional service. Our passion for biking drives us to help our customers
                    find the perfect ride for every adventure.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    We partner with leading brands and expert mechanics to ensure every product meets our
                    strict standards of performance and style.
                </p>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-12 text-gray-800">Why Choose Us</h2>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="bg-white p-8 rounded-lg shadow hover:shadow-lg transition">
                    <img src="https://img.icons8.com/color/96/000000/bicycle.png" alt="Quality Bikes"
                        class="mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-2">Premium Quality</h3>
                    <p class="text-gray-600">Only the best bikes and accessories from trusted brands.</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow hover:shadow-lg transition">
                    <img src="https://img.icons8.com/color/96/000000/gear.png" alt="Expert Service"
                        class="mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-2">Expert Service</h3>
                    <p class="text-gray-600">Our skilled technicians ensure your ride is always ready.</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow hover:shadow-lg transition">
                    <img src="https://img.icons8.com/color/96/000000/speed.png" alt="Fast Delivery"
                        class="mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-2">Fast Delivery</h3>
                    <p class="text-gray-600">Get your bike and accessories delivered quickly and safely.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-red-600 text-white text-center">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold mb-4">Join Our Community</h2>
            <p class="mb-6 text-lg">Become part of a passionate biking community and explore the world with us.</p>
            <a href="{{ route('products') }}"
                class="bg-white text-red-600 px-6 py-3 rounded font-semibold hover:bg-gray-100 transition">
                Shop Now
            </a>
        </div>
    </section>
@endsection
