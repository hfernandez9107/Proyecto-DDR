@extends('layouts.generica')

@section('titulo', 'Dashboard - Proyecto DDR')

@section('contenido')
<div class="max-w-7xl mx-auto py-8">
    <h1 class="text-3xl font-bold text-blue-600 mb-8 text-center">
        Panel de Control DDR <span class="text-sm text-green-600 animate-pulse">● En vivo</span>
    </h1>

        <!-- Acceso Rápido -->
    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Acceso Rápido</h2>
        <div class="flex flex-wrap gap-4">
            <a href="{{ route('persona.index') }}" 
               class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold shadow transform hover:scale-105">
                Buscar Persona
            </a>
            <a href="{{ route('profile.edit') }}" 
               class="bg-gray-200 text-gray-800 px-6 py-3 rounded-lg hover:bg-gray-300 transition font-semibold shadow border border-gray-300 transform hover:scale-105">
                Mi Perfil
            </a>
            <a href="{{ route('reportes') }}" 
               class="bg-indigo-200 text-indigo-800 px-6 py-3 rounded-lg hover:bg-indigo-300 transition font-semibold shadow border border-indigo-300 transform hover:scale-105">
                Reportes
            </a>
        </div>
    </div>

    <div class="mt-10 text-center text-gray-500 text-xs">
        <p>Actualización automática cada 30 segundos • <strong>Simulador en vivo</strong></p>
    </div>
</div>

    <!-- GRÁFICOS EN VIVO -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-10">
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                Personas por Programa
                <span class="ml-2 text-xs text-green-600 animate-pulse">● Actualizando...</span>
            </h3>
            <canvas id="chartBarras" height="100"></canvas>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                Distribución en Tiempo Real
                <span class="ml-2 text-xs text-green-600 animate-pulse">● Live</span>
            </h3>
            <canvas id="chartDona" height="10"></canvas>
        </div>
    </div>

    <!-- Estadísticas -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-medium">Total Personas</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalPersonas }}</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H9v-1c0-1.1.9-2 2-2h2c1.1 0 2 .9 2 2v1zm3-12a6 6 0 11-12 0 6 6 0 0112 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-medium">Armas Entregadas</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalArmas }}</p>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-medium">En Reintegración</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $enReintegracion }}</p>
                </div>
                <div class="bg-purple-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-medium">Desmovilizados</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $desmovilizados }}</p>
                </div>
                <div class="bg-orange-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

{{-- Scripts empujados correctamente con @push --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let chartBarras = null;
        let chartDona = null;
        const colores = ['#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6', '#EC4899'];

        // Datos iniciales (evita esperar 30s)
        const initialData = @json($programasData);

        function renderCharts(data) {
            if (!data || data.length === 0) return;

            const labels = data.map(p => p.nombre);
            const valores = data.map(p => p.cantidad);

            if (chartBarras) chartBarras.destroy();
            if (chartDona) chartDona.destroy();

            chartBarras = new Chart(document.getElementById('chartBarras'), {
                type: 'bar',
                data: { labels, datasets: [{ label: 'Personas', data: valores, backgroundColor: colores, borderRadius: 6 }] },
                options: { responsive: true, animation: { duration: 800 }, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true } } }
            });

            chartDona = new Chart(document.getElementById('chartDona'), {
                type: 'doughnut',
                data: { labels, datasets: [{ data: valores, backgroundColor: colores, borderColor: '#fff', borderWidth: 3, hoverOffset: 12 }] },
                options: { responsive: true, animation: { duration: 800 }, plugins: { legend: { position: 'bottom' } } }
            });
        }

        // Cargar datos iniciales
        if (initialData && initialData.length > 0) {
            renderCharts(initialData);
        }

        // Actualizar en vivo
        function actualizar() {
            fetch('{{ route('dashboard.data') }}')
                .then(r => r.json())
                .then(data => {
                    if (data.programas && data.programas.length > 0) {
                        renderCharts(data.programas);
                    }
                })
                .catch(() => console.warn('Error en actualización en vivo'));
        }

        setInterval(actualizar, 30000);
    });
</script>
@endpush
@endsection