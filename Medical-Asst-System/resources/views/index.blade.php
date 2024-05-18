<!DOCTYPE html>
<html>
<head>
    <title>Mapbox Directions API Example</title>
    <script>
        async function getDistance() {
            const accessToken = 'pk.eyJ1IjoiZGVlcHJhanB1dCIsImEiOiJjbHc5aGJtZ2QwMTh2MmpwYXZyMzI0eTB2In0.RFnVOFGJY66G-ZEZx-ajDw';
            const origin = '-122.4194,37.7749'; // San Francisco, CA
            const destination = '-118.2437,34.0522'; // Los Angeles, CA
            const url = `https://api.mapbox.com/directions/v5/mapbox/driving-traffic/${origin};${destination}?access_token=${accessToken}&geometries=geojson`;

            try {
                const response = await fetch(url);
                const data = await response.json();

                if (response.ok) {
                    const distance = data.routes[0].distance; // Distance in meters
                    const duration = data.routes[0].duration; // Duration in seconds

                    // Convert distance to kilometers and duration to hours and minutes
                    const distanceKm = (distance / 1000).toFixed(2);
                    const durationHours = Math.floor(duration / 3600);
                    const durationMinutes = Math.floor((duration % 3600) / 60);

                    document.getElementById('distance').textContent = `Distance: ${distanceKm} km`;
                    document.getElementById('duration').textContent = `Duration: ${durationHours} hours and ${durationMinutes} minutes`;
                } else {
                    console.error('Error:', data.message);
                }
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }

        document.addEventListener('DOMContentLoaded', getDistance);
    </script>
</head>
<body>
    <h1>Mapbox Directions API Example</h1>
    <p id="distance">Calculating distance...</p>
    <p id="duration">Calculating duration...</p>
</body>
</html>
