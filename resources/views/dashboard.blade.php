<!-- layout.blade.php or dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SERL - Emergency Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <style>
    body {
      background: linear-gradient(to right, #0f172a, #1e293b);
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
    }

    .navbar {
      background: rgba(30, 41, 59, 0.95);
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      color: #facc15;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .navbar a, .navbar button {
      color: #facc15;
      text-decoration: none;
      font-weight: bold;
      margin-left: 1rem;
      background: none;
      border: none;
      font-size: 1rem;
      cursor: pointer;
      transition: all 0.3s;
    }

    .navbar a:hover, .navbar button:hover {
      color: #fde68a;
      transform: scale(1.05);
    }

    .dashboard-container {
      padding: 2rem;
      max-width: 1200px;
      margin: auto;
    }

    .dashboard-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1.5rem;
    }

    @media (min-width: 768px) {
      .dashboard-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    .dashboard-card {
      background: rgba(255, 255, 255, 0.06);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 1rem;
      padding: 1.5rem;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
      color: #f1f5f9;
      text-align: center;
      transition: transform 0.3s ease;
    }

    .dashboard-card:hover {
      transform: translateY(-6px);
    }

    .dashboard-card h3 {
      margin-bottom: 1rem;
      font-size: 1.3rem;
      color: #e2e8f0;
    }

    .contact-card {
      background: linear-gradient(to bottom right, rgba(56, 189, 248, 0.08), rgba(255, 255, 255, 0.04));
      border: 1px solid rgba(96, 165, 250, 0.4);
      box-shadow: 0 6px 20px rgba(59, 130, 246, 0.2);
      transition: all 0.3s ease-in-out;
    }

    .contact-card:hover {
      transform: scale(1.02);
      box-shadow: 0 8px 28px rgba(96, 165, 250, 0.3);
    }

    .manage-link {
      display: inline-block;
      margin-top: 1rem;
      color: #60a5fa;
      text-decoration: underline;
      font-size: 0.95rem;
    }

    .manage-link:hover {
      color: #bfdbfe;
    }

    .map-container {
      margin-top: 1rem;
      height: 220px;
      border-radius: 10px;
      overflow: hidden;
      background-color: #1e293b;
      box-shadow: inset 0 0 12px rgba(0, 0, 0, 0.4);
    }

    .sos-full {
      grid-column: span 1;
    }

    @media (min-width: 768px) {
      .sos-full {
        grid-column: span 2;
      }
    }

    .sos-buttons-row {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 1rem;
      margin-top: 1rem;
    }

    .sos-button {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      font-size: 1.8rem;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: bold;
      border: none;
      cursor: pointer;
      transition: transform 0.2s, box-shadow 0.2s;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
    }

    @media (min-width: 768px) {
      .sos-button {
        width: 100px;
        height: 100px;
      }
    }

    .sos-button:hover {
      transform: scale(1.08);
    }

    .sos-label {
      margin-top: 0.5rem;
      color: #e2e8f0;
      font-size: 0.9rem;
      text-align: center;
    }

    .fire { background-color: #dc2626; }
    .medical { background-color: #16a34a; }
    .police { background-color: #2563eb; }
    .secure { background-color: #eab308; color: black; }
  </style>
</head>

<body>

<!-- Navbar -->
<div class="navbar">
  <h1 style="font-size: 1.5rem;">🛡️ SERL - Emergency Response</h1>
  <div>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
      @csrf
      <button type="submit">Logout</button>
    </form>
  </div>
</div>

<!-- Dashboard Layout -->
<div class="dashboard-container">
  <div class="dashboard-grid">

    <!-- Emergency Contacts -->
    <div class="dashboard-card contact-card">
      <h3>📇 Emergency Contacts</h3>
      <p>Keep your emergency contacts up to date for instant help during a crisis.</p>
      <a href="{{ route('contacts.index') }}" class="manage-link">Manage Contacts</a>
    </div>

    <!-- Map Location -->
    <div class="dashboard-card contact-card">
      <h3>🌍 Your Live Location</h3>
      <div id="map" class="map-container"></div>
    </div>

    <!-- SOS Section -->
    <div class="dashboard-card sos-full contact-card">
      <h3>🚨 Trigger SOS Alerts</h3>
      <div class="sos-buttons-row">
        <div>
          <button class="sos-button fire" onclick="triggerSOS('fire')">🔥</button>
          <div class="sos-label">Fire</div>
        </div>
        <div>
          <button class="sos-button medical" onclick="triggerSOS('medical')">🏥</button>
          <div class="sos-label">Medical</div>
        </div>
        <div>
          <button class="sos-button police" onclick="triggerSOS('police')">🚓</button>
          <div class="sos-label">Police</div>
        </div>
        <div>
          <button class="sos-button secure" onclick="triggerSOS('secure_contact')">🛡️</button>
          <div class="sos-label">Secure</div>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Map & SOS JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
  const apiKey = '{API_key}'; // Replace with your real API key

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
      })
      .then(res => res.json())
      .then(data => alert(`SOS Sent: ${data.status}`))
      .catch(err => {
        console.error('SOS error:', err);
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
      const map = L.map('map').setView([location.lat, location.lng], 14);
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
      }).addTo(map);
      L.marker([location.lat, location.lng]).addTo(map)
        .bindPopup('You are here.')
        .openPopup();
    } catch (err) {
      console.error('Map load error:', err);
    }
  });
</script>

</body>
</html>
