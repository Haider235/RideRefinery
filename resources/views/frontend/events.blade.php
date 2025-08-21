@extends('layouts.frontend')

@section('title', 'Events')

@section('content')
    <!-- Page Banner -->
    <section class="relative bg-gray-900 text-white">
        <img src="https://images.unsplash.com/photo-1533419026881-d2dd01ddc8e1?auto=format&fit=crop&w=1920&q=80"
             alt="Events Banner"
             class="absolute inset-0 w-full h-full object-cover opacity-50">
        <div class="relative container mx-auto px-6 py-20 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Upcoming Events</h1>
            <p class="max-w-2xl mx-auto text-lg text-gray-200">
                Stay updated with our latest bike rides, training sessions, and community events.
            </p>
        </div>
    </section>

    <!-- Events Grid -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($events as $event)
                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                        <div class="p-6">
                            <span class="text-sm text-red-600 font-semibold">
                                {{ \Carbon\Carbon::parse($event->start_time)->format('F d, Y h:i A') }}
                                – {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}
                            </span>
                            <h3 class="text-xl font-bold mt-2 mb-3">{{ $event->name }}</h3>
                            <p class="text-gray-600 mb-4">
                                {{ Str::limit($event->description, 100) }}
                            </p>
                            <p class="text-sm text-gray-500 mb-2">
                                <strong>From:</strong> {{ $event->start_point }} <br>
                                <strong>To:</strong> {{ $event->end_point }}
                            </p>
                            <a href="{{ route('event.single', $event->id) }}"
                               class="inline-block bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                                Read More
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-16 flex justify-center">
                {{ $events->links() }}
            </div>
        </div>
    </section>
@endsection
