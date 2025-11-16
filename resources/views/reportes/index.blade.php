@extends('layouts.generica')

@section('titulo', 'Reportes - Proyecto DDR')

@section('contenido')
<div class="max-w-7xl mx-auto py-8">
    <h1 class="text-3xl font-bold text-blue-600 mb-8 text-center">
        Reportes del Sistema DDR
    </h1>

    <div class="bg-white p-8 rounded-xl shadow-md text-center">
        <div class="mb-6">
            <svg class="w-16 h-16 mx-auto text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <p class="text-lg text-gray-700">
                Próximamente: <strong>Exportar a PDF</strong>, <strong>Excel</strong> y <strong>Estadísticas avanzadas</strong>
            </p>
        </div>

        <div class="flex justify-center gap-4 mt-8">
            <a href="{{ route('dashboard') }}" 
               class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold shadow">
                ← Volver al Dashboard
            </a>
            <a href="{{ route('persona.index') }}" 
               class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition font-semibold shadow">
                Buscar Persona
            </a>
        </div>
    </div>
</div>
@endsection