@extends('layouts.generica')

@section('titulo', 'Buscar Persona - Proyecto DDR')

@section('contenido')
<div class="max-w-4xl mx-auto">
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-blue-600 mb-6 text-center">
            Buscar Persona por Documento
        </h1>

        <!-- Formulario de búsqueda -->
        <form method="POST" action="{{ route('persona.buscar') }}" class="mb-8">
            @csrf
            <div class="flex gap-4 items-end">
                <div class="flex-1">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Número de Documento
                    </label>
                    <input 
                        type="number" 
                        name="numero_documento" 
                        value="{{ old('numero_documento') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Ej: 100000" 
                        required
                    >
                    @error('numero_documento')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" 
                        class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 font-semibold transition">
                    Buscar
                </button>
            </div>
        </form>

        <!-- Resultado: Mostrar todo si existe -->
        @if(isset($persona))
            <div class="space-y-8">
                <!-- 1. Información Personal -->
                <div class="border-l-4 border-blue-600 pl-4">
                    <h2 class="text-2xl font-bold text-gray-800 mb-3">Información Personal</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <p><strong>Documento:</strong> {{ $persona->{'Número de Documento'} }}</p>
                        <p><strong>Nombre Completo:</strong> {{ $persona->{'Nombre Completo'} }}</p>
                        <p><strong>Género:</strong> {{ $persona->{'Género'} }}</p>
                        <p><strong>Estado Civil:</strong> {{ $persona->{'Estado Civil'} }}</p>
                        <p><strong>Correo:</strong> {{ $persona->{'Correo Electrónico'} }}</p>
                        <p><strong>Departamento:</strong> {{ $persona->{'Departamento'} }}</p>
                        <p><strong>Municipio:</strong> {{ $persona->{'Municipio'} }}</p>
                        <p><strong>Ciudad:</strong> {{ $persona->{'Ciudad'} }}</p>
                        <p><strong>Dirección:</strong> {{ $persona->{'Dirección'} }}</p>
                        <p><strong>Detalles Dirección:</strong> {{ $persona->{'Detalles Dirección'} }}</p>
                    </div>
                </div>

                <!-- 2. Armas Entregadas -->
                @if($persona->desarme->isNotEmpty())
                    <div class="border-l-4 border-green-600 pl-4">
                        <h2 class="text-xl font-bold text-gray-800 mb-3">Armas Entregadas (Desarme)</h2>
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-collapse border border-gray-300">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Tipo</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Serie</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Estado</th>
                                        <th CLASS="border border-gray-300 px-4 py-2 text-left">Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($persona->desarme as $desarme)
                                        @foreach($desarme->armas as $arma)
                                            <tr class="hover:bg-gray-50">
                                                <td class="border border-gray-300 px-4 py-2">{{ $arma->Tipo }}</td>
                                                <td class="border border-gray-300 px-4 py-2">{{ $arma->Serie }}</td>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    <span class="px-2 py-1 rounded text-xs font-medium
                                                        {{ $arma->Estado == 'Funcional' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                        {{ $arma->Estado }}
                                                    </span>
                                                </td>
                                                <td class="border border-gray-300 px-4 py-2">{{ $arma->Fecha_Entrega }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

                <!-- 3. Desmovilización -->
                @if($persona->desmovilizacion->isNotEmpty())
                    <div class="border-l-4 border-yellow-600 pl-4">
                        <h2 class="text-xl font-bold text-gray-800 mb-3">Desmovilización</h2>
                        <ul class="space-y-2">
                            @foreach($persona->desmovilizacion as $dm)
                                <li class="flex justify-between">
                                    <span>Proceso ID: {{ $dm->ID_Proceso }}</span>
                                    <span class="text-gray-600">Fecha: {{ $dm->Fecha }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- 4. Reintegración y Beneficios -->
                @if($persona->reintegracion->isNotEmpty())
                    <div class="border-l-4 border-purple-600 pl-4">
                        <h2 class="text-xl font-bold text-gray-800 mb-3">Reintegración</h2>
                        @foreach($persona->reintegracion as $rein)
                            <div class="bg-gray-50 p-4 rounded mb-3">
                                <p><strong>Programa:</strong> {{ $rein->Nombre_Programa }}</p>
                                <p><strong>Fecha Inicio:</strong> {{ $rein->Fecha_Inicio }}</p>
                                @if($rein->beneficio->isNotEmpty())
                                    <p class="mt-2 font-semibold text-sm">Beneficios:</p>
                                    <ul class="list-disc ml-6 text-sm">
                                        @foreach($rein->beneficio as $ben)
                                            <li>{{ $ben->Tipo }}: {{ $ben->Descripción }} ({{ $ben->Fecha }})</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- 5. Historial de Militancia -->
                @if($persona->historialMilitancia->isNotEmpty())
                    <div class="border-l-4 border-indigo-600 pl-4">
                        <h2 class="text-xl font-bold text-gray-800 mb-3">Historial de Militancia</h2>
                        <table class="min-w-full border-collapse border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border px-4 py-2 text-left">Fuerza</th>
                                    <th class="border px-4 py-2 text-left">Ingreso</th>
                                    <th class="border px-4 py-2 text-left">Salida</th>
                                    <th class="border px-4 py-2 text-left">Rango</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($persona->historialMilitancia as $hm)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $hm->fuerza->Nombre ?? 'N/A' }}</td>
                                        <td class="border px-4 py-2">{{ $hm->Fecha_Ingreso }}</td>
                                        <td class="border px-4 py-2">{{ $hm->Fecha_Salida ?? 'Actual' }}</td>
                                        <td class="border px-4 py-2">{{ $hm->Rango }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        @else
            <!-- Mensaje si no se ha buscado aún -->
            <div class="text-center text-gray-500 py-8">
                <p class="text-lg">Ingresa un número de documento para ver los detalles.</p>
            </div>
        @endif
    </div>
</div>
@endsection