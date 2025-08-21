<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ride Refinery')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900">

    <!-- Header -->
    <header class="bg-white shadow">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <a href="{{ route('home') }}" class="text-xl font-bold text-red-600">Ride Refinery</a>
            <nav class="space-x-4 flex">
    <a href="{{ route('home') }}" class="hover:text-red-600">Home</a>
    <a href="{{ route('frontend.products.index') }}" class="hover:text-red-600">Products</a>
    <a href="{{ route('brands') }}" class="hover:text-red-600">Brands</a>
    <a href="{{ route('categories') }}" class="hover:text-red-600">Categories</a>

    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" type="button" class="hover:text-red-600 focus:outline-none">
            Services
        </button>
        <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-1"
            class="absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
            <div class="py-1">
                         
           
                <a href="{{ route('request.consultation') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Request Consultation</a>
                <a href="{{ route('maintenance') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Maintenance Booking</a>
            </div>
        </div>
    </div>
                    <a href="{{ route('events') }}" class="hover:text-red-600">Events</a>
                <a href="{{ route('ride') }}" class="hover:text-red-600">Ride Training</a>

    @auth('customer')
    <a href="{{ route('customer.dashboard') }}" class="hover:text-red-600">Dashboard</a>
    <form method="POST" action="{{ route('customer.logout') }}" class="inline">
        @csrf
        <button type="submit" class="hover:text-red-600">Logout</button>
    </form>
    @endauth

    @guest('customer')
    <a href="{{ route('customer.login') }}" class="hover:text-red-600">Login</a>
    <a href="{{ route('customer.register') }}" class="hover:text-red-600">Register</a>
    @endguest
</nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto py-8 px-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-300 py-6">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 text-center md:text-left">
            
            <!-- Quick Links -->
            <div>
                <h4 class="font-bold mb-2">Quick Links</h4>
                <ul>
                    <li><a href="{{ route('home') }}" class="hover:text-white">Home</a></li>
                    <li><a href="{{ route('frontend.products.index') }}" class="hover:text-white">Products</a></li>
                    <li><a href="{{ route('brands') }}" class="hover:text-white">Brands</a></li>
                    <li><a href="{{ route('categories') }}" class="hover:text-white">Categories</a></li>
                    <li><a href="{{ route('events') }}" class="hover:text-white">Events</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h4 class="font-bold mb-2">Services</h4>
                <ul>
                </ul>
            </div>

            <!-- Legal & Info -->
            <div>
                <h4 class="font-bold mb-2">Info</h4>
                <ul>
                    <li><a href="{{ route('about') }}" class="hover:text-white">About Us</a></li>
                    <li><a href="{{ route('terms') }}" class="hover:text-white">Terms & Conditions</a></li>
                    <li><a href="{{ route('privacy') }}" class="hover:text-white">Privacy Policy</a></li>
                    <li>                <a href="{{ route('request.consultation') }}" class="hover:text-red-600">Contact</a>
</li>
                </ul>
            </div>

        </div>
        <div class="mt-6 text-center text-sm">
            &copy; {{ date('Y') }} Ride Refinery. All rights reserved.
        </div>
    </footer>

</body>
</html>
