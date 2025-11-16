<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reintegracion extends Model
{
    protected $table = 'reintegración';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'ID',
        'Número de Proceso',
        'Número de Documento',
        'Fecha',
        'Nombre Programa',
    ];

    public function participantes(): HasMany
    {
        return $this->hasMany(PersonaPrograma::class, 'id_programa', 'ID');
    }

    public function getNombreProgramaAttribute(): string
    {
        return $this->attributes['Nombre Programa'] ?? 'Sin nombre';
    }

    public function scopeConParticipantes($query)
    {
        return $query->withCount('participantes')
                     ->having('participantes_count', '>', 0);
    }

    public function beneficio()
    {
        return $this->hasMany(Beneficio::class, 'ID Programa', 'ID');
    }
}