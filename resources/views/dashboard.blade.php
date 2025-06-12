<style>
  /* Global Styling */
  body {
    background-color: #0f172a !important;
    font-family: 'Segoe UI', sans-serif;
  }

  .navbar {
    background-color: #1e293b;
    padding: 1rem 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #facc15;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-bottom: 2rem;
  }

  .navbar a {
    color: #facc15;
    text-decoration: none;
    font-weight: bold;
    margin-left: 1rem;
    transition: color 0.3s;
  }

  .navbar a:hover {
    color: #fbbf24;
  }

  .dashboard-container {
    padding: 2rem;
    max-width: 1200px;
    margin: 0 auto;
  }

  .dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1rem;
  }

  .dashboard-card {
    background: #1e293b;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    color: #f1f5f9;
    text-align: center;
    min-height: 200px;
    transition: transform 0.3s;
  }

  .dashboard-card:hover {
    transform: scale(1.05);
  }

  .sos-button {
    width: 100%;
    padding: 1rem;
    margin: 0.5rem 0;
    font-size: 1rem;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s, transform 0.2s;
  }

  .sos-button:hover {
    transform: translateY(-3px);
  }

  .sos-fire { background-color: #dc2626; color: #fff; }
  .sos-medical { background-color: #16a34a; color: #fff; }
  .sos-police { background-color: #2563eb; color: #fff; }
  .sos-secure { background-color: #eab308; color: #000; }

  .map-container {
    margin-top: 1rem;
    height: 200px;
    border-radius: 8px;
    overflow: hidden;
  }

  .manage-link {
    display: inline-block;
    margin-top: 1rem;
    color: #60a5fa;
    text-decoration: underline;
  }

  .manage-link:hover {
    color: #93c5fd;
  }
</style>

<!-- Navbar -->
<div class="navbar">
  <h1>SERL - Emergency Response System</h1>
  <div>
    <a href="{{ route('dashboard') }}">Dashboard</a>

    <!-- Logout Form -->
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
      @csrf
      <button type="submit" style="background: none; border: none; color: #facc15; font-weight: bold; cursor: pointer;">
        Logout
      </button>
    </form>
  </div>
</div>


<div class="dashboard-container">
  <div class="dashboard-grid">

    <!-- SOS Alerts Card -->
    <div class="dashboard-card">
      <h3>🚨 Trigger SOS Alerts</h3>
      <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
        <button onclick="triggerSOS('fire')" class="sos-button sos-fire">🔥 Fire SOS</button>
        <button onclick="triggerSOS('medical')" class="sos-button sos-medical">🏥 Medical SOS</button>
        <button onclick="triggerSOS('police')" class="sos-button sos-police">🚓 Police SOS</button>
        <button onclick="triggerSOS('secure_contact')" class="sos-button sos-secure">🛡️ Secure Contact</button>
      </div>
    </div>

    <!-- Manage Contacts Card -->
    <div class="dashboard-card">
      <h3>📇 Emergency Contacts</h3>
      <p>Keep your emergency contacts up to date for quick assistance during crises.</p>
      <a href="{{ route('contacts.index') }}" class="manage-link">Manage Contacts</a>
    </div>

    <!-- Map Card -->
    <div class="dashboard-card">
      <h3>🌍 Live Location Map</h3>
      <div id="map" class="map-container"></div>
    </div>

  </div>
</div>

<!-- Leaflet Map JS and CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
  const apiKey = 'AIzaSyCPB6SUK0fHtKOC-CEzxwVoPGTca6uFfNA'; // Replace with your key
  let map;

  async function getGoogleLocation() {
    const response = await fetch(`https://www.googleapis.com/geolocation/v1/geolocate?key=${apiKey}`, {
      method: 'POST'
    });
    const data = await response.json();
    return data.location;
  }

  async function triggerSOS(type) {
    try {
      const location = await getGoogleLocation();
      fetch("{{ route('sos.store') }}", {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
          type: type,
          latitude: location.lat,
          longitude: location.lng,
          message: 'Emergency: ' + type
        })
      }).then(response => response.json()).then(data => {
        alert(`SOS Sent: ${data.status}`);
      }).catch(error => {
        console.error('Error:', error);
        alert('SOS Failed');
      });
    } catch (err) {
      console.error('Geolocation error:', err);
      alert('Location not found');
    }
  }

  document.addEventListener('DOMContentLoaded', async () => {
    try {
      const location = await getGoogleLocation();
      map = L.map('map').setView([location.lat, location.lng], 14);
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
      }).addTo(map);
      L.marker([location.lat, location.lng]).addTo(map).bindPopup('Your Location').openPopup();
    } catch (error) {
      console.error('Map error:', error);
    }
  });
</script>
