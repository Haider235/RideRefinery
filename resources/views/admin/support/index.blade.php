<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ride Bookings') }}
        </h2>
    </x-slot>

@section('title', 'Support Tickets')

@section('content')
<div class="p-6 bg-white shadow rounded-lg">
    <h1 class="text-2xl font-bold mb-6">Customer Support Requests</h1>

    <table class="min-w-full border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Name</th>
                <th class="px-4 py-2 border">Email</th>
                <th class="px-4 py-2 border">Issue</th>
                <th class="px-4 py-2 border">Submitted At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
            <tr>
                <td class="px-4 py-2 border">{{ $ticket->id }}</td>
                <td class="px-4 py-2 border">{{ $ticket->name }}</td>
                <td class="px-4 py-2 border">{{ $ticket->email }}</td>
                <td class="px-4 py-2 border">{{ Str::limit($ticket->issue, 50) }}</td>
                <td class="px-4 py-2 border">{{ $ticket->created_at->format('d M Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $tickets->links() }}
    </div>
</div>
</x-app-layout>