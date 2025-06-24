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
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
        }

        body {
            background-color: #0f172a;
            margin: 0;
            font-family: 'Figtree', sans-serif;
            color: #f8fafc;
            overflow: hidden;
        }

        .bg-glass {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 1.25rem;
            padding: 2rem;
            color: #f8fafc;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.15);
        }

        .bg-glass:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .auth-logo {
            filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.4));
        }

        /* FORM STYLING */
        .form-wrapper {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .form-wrapper label {
            font-weight: 500;
            color: #e2e8f0;
            margin-bottom: 0.25rem;
        }

        .form-wrapper input,
        .form-wrapper select,
        .form-wrapper textarea {
            background-color: #1e293b;
            border: 1px solid #334155;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            color: #f1f5f9;
            font-size: 0.95rem;
            transition: border 0.3s, box-shadow 0.3s;
        }

        .form-wrapper input:focus,
        .form-wrapper select:focus,
        .form-wrapper textarea:focus {
            outline: none;
            border-color: #6366f1;
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.5);
        }

        .form-wrapper button {
            background-color: #6366f1;
            color: #f8fafc;
            font-weight: 600;
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            border: none;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 0 12px #6366f1aa;
        }

        .form-wrapper button:hover {
            background-color: #4f46e5;
            transform: translateY(-2px);
            box-shadow: 0 0 18px #6366f1cc;
        }
    </style>
</head>
<body class="font-sans text-gray-100 antialiased bg-gray-900">

    <!-- Particles Background -->
    <div id="particles-js"></div>

    <!-- Auth Card -->
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative z-10">
        <div>
            <a href="/" class="auth-logo">
                <x-application-logo class="w-20 h-20 fill-current text-gray-200" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-glass shadow-md sm:rounded-lg">
            <div class="form-wrapper">
                {{ $slot }}
            </div>
        </div>
    </div>

    <!-- Particles Config -->
    <script>
        particlesJS("particles-js", {
            particles: {
                number: { value: 60, density: { enable: true, value_area: 800 } },
                color: { value: "#6366f1" },
                shape: { type: "circle" },
                opacity: { value: 0.4 },
                size: { value: 3 },
                line_linked: { enable: true, distance: 130, color: "#a78bfa", opacity: 0.4, width: 1 },
                move: { enable: true, speed: 1.5, out_mode: "out" }
            },
            interactivity: {
                events: {
                    onhover: { enable: true, mode: "repulse" },
                    onclick: { enable: true, mode: "push" },
                    resize: true
                }
            },
            retina_detect: true
        });
    </script>
</body>
</html>
