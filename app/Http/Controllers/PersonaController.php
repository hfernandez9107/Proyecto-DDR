<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        return view('persona.buscar');
    }

    public function buscar(Request $request)
    {
        $request->validate([
            'numero_documento' => 'required|integer|exists:persona,Número de Documento'
        ]);

        $persona = Persona::with([
            'fuerza',
            'departamento',
            'municipio',
            'desarme.armas',
            'desmovilizacion',
            'reintegracion.beneficio',
            'historialMilitancia.fuerza'
        ])->findOrFail($request->numero_documento);

        return view('persona.buscar', compact('persona'));
    }
}