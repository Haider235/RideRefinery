<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ride Refinery')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light text-dark font-sans">
    <!-- Header -->
    <header class="bg-white shadow">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <a href="{{ route('dashboard') }}" class="text-xl font-bold text-red-600">Ride Refinery</a>
            <nav class="space-x-4">
                <a href="{{ route('dashboard') }}" class="hover:text-accent">Dashboard</a>
                <a href="{{ route('orders.index') }}" class="hover:text-accent">Orders</a>
                <a href="{{ route('events.index') }}" class="hover:text-accent">Events</a>
                <a href="{{ route('wishlist.index') }}" class="hover:text-accent">Wishlist</a>
                <a href="{{ route('notifications.index') }}" class="hover:text-accent">Notifications</a>
                <a href="{{ route('profile.edit') }}" class="hover:text-accent">Profile</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-accent">Logout</button>
                </form>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto py-8 px-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container mx-auto text-center">
            &copy; {{ date('Y') }} Ride Refinery. All rights reserved.
        </div>
    </footer>
</body>
</html>