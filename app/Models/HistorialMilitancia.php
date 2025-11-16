<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistorialMilitancia extends Model
{
    protected $table = 'historialmilitancia';
    public $timestamps = false;

    protected $fillable = [
        'ID',
        'Número de Documento',
        'ID Fuerza',
        'FechaIngreso',
        'FechaRetiro',
        'Rango',
        'Detalle'
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'Número de Documento', 'Número de Documento');
    }

    public function fuerza(): BelongsTo
    {
        return $this->belongsTo(Fuerza::class, 'ID Fuerza', 'ID');
    }
}