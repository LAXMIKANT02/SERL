<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome | SERL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vanilla-tilt@1.7.0/dist/vanilla-tilt.min.js"></script>

  <style>
    #particles-js {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #0f172a;
    }

    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      color: white;
      font-family: 'Segoe UI', sans-serif;
      overflow: hidden;
      position: relative;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background: #111;
    }

    h1 {
      position: absolute;
      top: 30px;
      left: 400px;
      transform: translateX(-50%);
      font-size: 3rem;
      font-weight: bold;
      color: #facc15;
      text-shadow: 0 0 20px rgba(255, 204, 85, 0.8);
      text-align: center;
      letter-spacing: 5px;
      z-index: 10;
    }

    .btn {
      padding: 12px 24px;
      font-size: 1rem;
      font-weight: 600;
      border-radius: 8px;
      text-transform: uppercase;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 0 20px rgba(255, 204, 85, 0.6);
    }

    .btn-primary {
      background-color: #ffcc00;
      color: black;
    }

    .btn-primary:hover {
      background-color: #facc15;
      box-shadow: 0 0 30px rgba(255, 204, 85, 0.8);
      transform: translateY(-5px);
    }

    .btn-secondary {
      background-color: transparent;
      border: 2px solid rgb(227, 207, 128);
      color: #ffcc00;
    }

    .btn-secondary:hover {
      background-color: #ffcc00;
      color: black;
      transform: translateY(-5px);
    }

    .mini-cube {
      position: absolute;
      width: 50px;
      height: 50px;
      background-color: rgba(245, 222, 169, 60%);
      box-shadow: 0 0 10px rgba(255, 204, 85, 0.8);
      animation: moveCube 5s infinite ease-in-out, rotateCube 2s infinite linear;
      z-index: 5;
      border-radius: 6px;
    }

    @keyframes moveCube {
      0% { transform: translate(0, 0); }
      25% { transform: translate(100px, 200px); }
      50% { transform: translate(-150px, 100px); }
      75% { transform: translate(200px, -50px); }
      100% { transform: translate(0, 0); }
    }

    @keyframes rotateCube {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
  </style>
</head>
<body>

  <div id="particles-js"></div>

  <h1 class="text-4xl font-extrabold mb-8 text-yellow-400 tracking-widest z-10 relative">
    🚨 SERL: Emergency Response System
  </h1>

  <!-- Mini Cubes with updated positions -->
  <div class="mini-cube" style="top: 10%; left: 15%;"></div>
  <div class="mini-cube" style="top: 20%; left: 75%;"></div>
  <div class="mini-cube" style="top: 40%; left: 30%;"></div>
  <div class="mini-cube" style="top: 60%; left: 80%;"></div>
  <div class="mini-cube" style="top: 70%; left: 10%;"></div>
  <div class="mini-cube" style="top: 85%; left: 50%;"></div>
  <div class="mini-cube" style="top: 35%; left: 60%;"></div>

  <div class="mt-10 space-x-6 z-10 relative">
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
    <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
    <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
  </div>

  <script>
    particlesJS("particles-js", {
      particles: {
        number: { value: 50, density: { enable: true, value_area: 800 } },
        color: { value: "#facc15" },
        shape: { type: "circle", stroke: { width: 0, color: "#fff" }, polygon: { nb_sides: 6 } },
        opacity: { value: 0.5, anim: { enable: true, speed: 1, opacity_min: 0.1, sync: false } },
        size: { value: 3, anim: { enable: true, speed: 40, size_min: 0.1, sync: false } },
        line_linked: { enable: true, distance: 150, color: "#fff", opacity: 0.4, width: 1 },
        move: { enable: true, speed: 3, direction: "none", random: false, straight: false, out_mode: "out" }
      },
      interactivity: {
        detect_on: "canvas",
        events: {
          onhover: { enable: true, mode: "repulse" },
          onclick: { enable: true, mode: "push" },
          resize: true
        },
        modes: { repulse: { distance: 100, duration: 0.4 }, push: { particles_nb: 4 } }
      },
      retina_detect: true
    });
  </script>

</body>
</html>
