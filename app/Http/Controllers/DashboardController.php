<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Arma;
use App\Models\PersonaPrograma;
use App\Models\Desmovilizacion;
use App\Models\Reintegracion;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPersonas = Persona::count();
        $totalArmas = Arma::count();
        $enReintegracion = PersonaPrograma::distinct('numero_documento')->count('numero_documento');
        $desmovilizados = Desmovilizacion::distinct('Número de Documento')->count('Número de Documento');

        $programasData = $this->getProgramasData();

        return view('dashboard', compact(
            'totalPersonas',
            'totalArmas',
            'enReintegracion',
            'desmovilizados',
            'programasData'
        ));
    }

    public function data()
    {
        return response()->json([
            'programas' => $this->getProgramasData()
        ]);
    }

    private function getProgramasData()
    {
        return Reintegracion::conParticipantes()
            ->get(['ID', 'Nombre Programa'])
            ->map(fn($p) => [
                'nombre'   => $p->nombre_programa, // ← Usa el accesor
                'cantidad' => $p->participantes_count
            ])
            ->values()
            ->toArray();
    }
}