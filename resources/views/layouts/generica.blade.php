<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Proyecto DDR')</title>

    {{-- Estilos con Vite --}}
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col">

    <!-- NAVEGACIÓN -->
    <nav class="bg-blue-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Proyecto DDR</h1>

            <ul class="flex gap-6 items-center">

                <li>
                    <a href="{{ url('/') }}" class="hover:underline transition">
                        Inicio
                    </a>
                </li>

                <li>
                    <a href="{{ route('persona.index') }}" class="hover:underline transition">
                        Buscar Persona
                    </a>
                </li>

                <li>
                    <a href="{{ route('profile.edit') }}" class="hover:underline transition">
                        Perfil
                    </a>
                </li>

                <li>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="hover:underline transition text-left">
                            Cerrar Sesión
                        </button>
                    </form>
                </li>

            </ul>
        </div>
    </nav>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="container mx-auto mt-8 flex-grow px-4">
        @yield('contenido')
    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-800 text-white text-center py-4 mt-10">
        <p class="text-sm">Proyecto DDR &copy; {{ date('Y') }} | Todos los derechos reservados</p>
    </footer>

    {{-- Scripts de Vite --}}
    @vite('resources/js/app.js')

    {{-- Scripts adicionales (desde @push) --}}
    @stack('scripts')

</body>
</html>