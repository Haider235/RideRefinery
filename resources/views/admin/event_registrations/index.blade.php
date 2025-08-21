<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event Registrations') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            <table class="table-auto w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Customer Name</th>
                        <th class="border px-4 py-2">Email</th>
                        <th class="border px-4 py-2">Phone</th>
                        <th class="border px-4 py-2">Event Name</th>
                        <th class="border px-4 py-2">Registration Phone</th>
                        <th class="border px-4 py-2">Notes</th>
                        <th class="border px-4 py-2">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($registrations as $reg)
                        <tr>
                            <td class="border px-4 py-2">{{ $reg->registration_id }}</td>
                            <td class="border px-4 py-2">{{ $reg->first_name }} {{ $reg->last_name }}</td>
                            <td class="border px-4 py-2">{{ $reg->email }}</td>
                            <td class="border px-4 py-2">{{ $reg->phone }}</td>
                            <td class="border px-4 py-2">{{ $reg->event_name }}</td>
                            <td class="border px-4 py-2">{{ $reg->registration_phone }}</td>
                            <td class="border px-4 py-2">{{ $reg->notes }}</td>
                            <td class="border px-4 py-2">{{ $reg->created_at }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">No registrations found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
