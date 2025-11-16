<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto DDR - Inicio</title>
    @vite('resources/css/app.css')
    <style>
        .hero {
            background: linear-gradient(135deg, #1e40af, #3b82f6);
            color: white;
            padding: 4rem 2rem;
            text-align: center;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .btn {
            display: inline-block;
            background: white;
            color: #1e40af;
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            font-weight: bold;
            margin-top: 1.5rem;
            text-decoration: none;
            transition: all 0.3s;
        }
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    <!-- HERO -->
    <div class="container mx-auto px-4 flex-grow flex items-center justify-center">
        <div class="hero max-w-4xl mx-auto">
            <h1 class="text-5xl md:text-6xl font-bold mb-4">
                Sistema DDR
            </h1>
            <p class="text-xl md:text-2xl mb-6 opacity-90">
                Desarme, Desmovilización y Reintegración
            </p>
            <p class="text-lg mb-8 max-w-2xl mx-auto">
                Gestiona de forma segura y eficiente el proceso de reintegración de personas.
            </p>

            <div class="space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="btn">
                        Iniciar Sesión
                    </a>
                    <a href="{{ route('register') }}" class="btn bg-transparent border-2 border-white text-white hover:bg-white hover:text-blue-600">
                        Registrarse
                    </a>
                @else
                    <a href="{{ route('dashboard') }}" class="btn">
                        Ir al Dashboard
                    </a>
                @endguest
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-blue-600 text-white text-center py-4 mt-auto">
        <p class="text-sm">Proyecto DDR &copy; {{ date('Y') }}</p>
    </footer>

    @vite('resources/js/app.js')
</body>
</html>