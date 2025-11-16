<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersonaPrograma extends Model
{
    protected $table = 'persona_programa';
    public $timestamps = false;

    protected $fillable = [
        'numero_documento',
        'id_programa',
        'fecha_inscripcion'
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'numero_documento', 'Número de Documento');
    }

    public function programa(): BelongsTo
    {
        return $this->belongsTo(Reintegracion::class, 'id_programa', 'ID');
    }
}