<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ride Refinery')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Tailwind --}}
</head>
<body class="bg-gray-50 text-gray-900">

    <!-- Header -->
    <header class="bg-white shadow">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <a href="{{ url('/') }}" class="text-xl font-bold text-red-600">Ride Refinery</a>
            <nav class="space-x-4">
                <a href="{{ url('/') }}" class="hover:text-red-600">Home</a>
                <a href="{{ url('/products') }}" class="hover:text-red-600">Products</a>
                <a href="{{ url('/brands') }}" class="hover:text-red-600">Brands</a>
                <a href="{{ url('/categories') }}" class="hover:text-red-600">Categories</a>
                <a href="{{ url('/events') }}" class="hover:text-red-600">Events</a>
                <a href="{{ url('/request-consultation') }}" class="hover:text-red-600">Contact</a>
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
    <footer class="bg-gray-800 text-gray-300 py-4">
        <div class="container mx-auto text-center">
            &copy; {{ date('Y') }} Ride Refinery. All rights reserved.
        </div>
    </footer>

</body>
</html>
