<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Desmovilizacion extends Model
{
    protected $table = 'desmovilización'; // ← ¡NOMBRE EXACTO!
    protected $primaryKey = 'ID_Proceso'; // ← Clave primaria real
    public $timestamps = false;           // ← Sin timestamps

    protected $fillable = [
        'Número de Documento',
        'Fecha',
        'Estado_Proceso'
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'Número de Documento', 'Número de Documento');
    }
}