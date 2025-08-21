<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Events Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Header & Add Button --}}
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <h3 class="text-xl font-medium text-gray-700">Manage Events</h3>
            <a href="{{ route('admin.events.create') }}" class="px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">Add Event</a>
        </div>

        {{-- Tabs --}}
        <div class="flex border-b border-gray-200 mb-6 rounded-lg overflow-hidden shadow-sm">
            <button class="tab-link flex-1 text-center px-6 py-2 text-gray-600 font-medium border-b-2 border-transparent hover:text-blue-600 hover:border-blue-600 transition" data-tab="active">Active Events</button>
            <button class="tab-link flex-1 text-center px-6 py-2 text-gray-600 font-medium border-b-2 border-transparent hover:text-blue-600 hover:border-blue-600 transition" data-tab="past">Past Events</button>
        </div>

        {{-- Active Events --}}
        <div id="active" class="tab-content grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @forelse($activeEvents as $event)
                <div class="relative bg-white shadow-md rounded-xl p-6 hover:shadow-lg transition">
                    <span class="absolute top-4 right-4 px-3 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">Active</span>

                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $event->name }}</h3>

                    <div class="text-sm text-gray-500 space-y-1 mb-4">
                        <p><span class="font-medium">Start:</span> {{ $event->start_time }}</p>
                        <p><span class="font-medium">End:</span> {{ $event->end_time }}</p>
                        <p><span class="font-medium">From:</span> {{ $event->start_point }}</p>
                        <p><span class="font-medium">To:</span> {{ $event->end_point }}</p>
                    </div>

                    <div class="flex flex-col sm:flex-row justify-between gap-2">
                        <a href="{{ route('admin.events.edit', $event) }}" class="flex-1 text-center px-3 py-2 bg-yellow-400 text-white rounded-lg hover:bg-yellow-500 transition font-medium text-sm">Edit</a>

                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this event?')" class="w-full px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition font-medium text-sm">Delete</button>
                        </form>

                        {{-- View Participants Button --}}
                        <a href="{{ url('admin/events/'.$event->id.'/map') }}" class="flex-1 text-center px-3 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-medium text-sm">
                            View Participants
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-gray-400 italic col-span-full text-center">No active events found.</p>
            @endforelse
        </div>

        {{-- Past Events --}}
        <div id="past" class="tab-content hidden grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @forelse($pastEvents as $event)
                <div class="relative bg-white shadow-md rounded-xl p-6 hover:shadow-lg transition">
                    <span class="absolute top-4 right-4 px-3 py-1 text-xs font-semibold text-gray-800 bg-gray-300 rounded-full">Past</span>

                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $event->name }}</h3>

                    <div class="text-sm text-gray-500 space-y-1 mb-4">
                        <p><span class="font-medium">Start:</span> {{ $event->start_time }}</p>
                        <p><span class="font-medium">End:</span> {{ $event->end_time }}</p>
                        <p><span class="font-medium">From:</span> {{ $event->start_point }}</p>
                        <p><span class="font-medium">To:</span> {{ $event->end_point }}</p>
                    </div>

                    <div class="flex flex-col sm:flex-row justify-between gap-2">
                        <a href="{{ route('admin.events.edit', $event) }}" class="flex-1 text-center px-3 py-2 bg-yellow-400 text-white rounded-lg hover:bg-yellow-500 transition font-medium text-sm">Edit</a>

                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this event?')" class="w-full px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition font-medium text-sm">Delete</button>
                        </form>

                        {{-- View Participants Button --}}
                        <a href="{{ url('admin/events/'.$event->id.'/map') }}" class="flex-1 text-center px-3 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-medium text-sm">
                            View Participants
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-gray-400 italic col-span-full text-center">No past events found.</p>
            @endforelse
        </div>
    </div>

    {{-- Tabs JS --}}
    <script>
        const tabs = document.querySelectorAll('.tab-link');
        const contents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('border-blue-600', 'text-blue-600'));
                contents.forEach(c => c.classList.add('hidden'));

                document.getElementById(tab.dataset.tab).classList.remove('hidden');
                tab.classList.add('border-blue-600', 'text-blue-600');
            });
        });

        tabs[0].click();
    </script>
</x-app-layout>
