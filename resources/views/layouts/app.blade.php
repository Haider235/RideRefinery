<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 flex">

            {{-- Sidebar --}}
            @if(auth()->check() && auth()->user()->is_admin)
            <aside class="w-64 bg-gray-800 text-white flex-shrink-0">
                <div class="p-6 font-bold text-xl border-b border-gray-700">
                    Admin Panel
                </div>
                <nav class="mt-6">
                    <ul>
                        <li class="px-6 py-3 hover:bg-gray-700">
                            <a class="block" href="{{ route('admin.products.index') }}">Products</a>
                        </li>
                        <li class="px-6 py-3 hover:bg-gray-700">
                            <a class="block" href="{{ route('admin.orders.index') }}">Orders</a>
                        </li>
                        <li class="px-6 py-3 hover:bg-gray-700">
                            <a class="block" href="{{ route('admin.events.index') }}">Events</a>
                        </li>
                        <li class="px-6 py-3 hover:bg-gray-700">
                            <a class="block" href="{{ route('admin.consultations.index') }}">Request Quotes</a>
                        </li>
                        <li class="px-6 py-3 hover:bg-gray-700">
                            <a class="block" href="{{ route('admin.ride-bookings.index') }}">Rider Trainings</a>
                        </li>
                        <li class="px-6 py-3 hover:bg-gray-700">
                            <a class="block" href="{{ route('admin.brands.index') }}">Brands</a>
                        </li>
                        <li class="px-6 py-3 hover:bg-gray-700">
                            <a class="block" href="{{ route('admin.categories.index') }}">Categories</a>
                        </li>
                        <li class="px-6 py-3 hover:bg-gray-700">
                            <a class="block" href="{{ route('admin.customers.index') }}">Customers</a>
                        </li>
                        <li class="px-6 py-3 hover:bg-gray-700">
                            <a class="block" href="{{ route('admin.event-registrations.index') }}">Event Registrations</a>
                        </li>
                    </ul>
                </nav>
            </aside>
            @endif

            {{-- Main Content --}}
            <div class="flex-1">
                @include('layouts.navigation')

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
