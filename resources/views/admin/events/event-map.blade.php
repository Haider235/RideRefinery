<x-app-layout>
@section('title', 'Event Map - ' . $event->name)

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Live Map - {{ $event->name }}</h1>

    <div id="map" style="height: 600px; width: 100%;"></div>
</div>

<!-- Leaflet.js for free maps -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const map = L.map('map').setView([0, 0], 2);

        // OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        const locations = @json($locations);

        const markers = [];

        locations.forEach(loc => {
            if(loc.latitude && loc.longitude){
                const marker = L.marker([loc.latitude, loc.longitude])
                    .addTo(map)
                    .bindPopup('Customer ID: ' + (loc.registration && loc.registration.customer_id ? loc.registration.customer_id : 'N/A'));
                markers.push(marker);
            }
        });

        // Fit map to all markers
        if(markers.length){
            const group = new L.featureGroup(markers);
            map.fitBounds(group.getBounds().pad(0.2));
        }
    });
</script>
</x-app-layout>
