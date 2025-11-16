<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Persona extends Model
{
    protected $table = 'persona';
    protected $primaryKey = 'Número de Documento';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'Número de Documento',
        'Nombre Completo',
        'Género',
        'Estado_Civil',
        'Correo_Electrónico',
        'ID_Fuerza',
        'ID_Departamento',
        'ID_Municipio'
    ];

    public function fuerza(): BelongsTo
    {
        return $this->belongsTo(Fuerza::class, 'ID_Fuerza');
    }

    public function departamento(): BelongsTo
    {
        return $this->belongsTo(Departamento::class, 'ID_Departamento');
    }

    public function municipio(): BelongsTo
    {
        return $this->belongsTo(Municipio::class, 'ID_Municipio');
    }

    public function desarme(): HasMany
    {
        return $this->hasMany(Desarme::class, 'Número de Documento', 'Número de Documento');
    }

    public function desmovilizacion(): HasMany
    {
        return $this->hasMany(Desmovilizacion::class, 'Número de Documento', 'Número de Documento');
    }

    public function reintegracion(): HasMany
    {
        return $this->hasMany(Reintegracion::class, 'Número de Documento', 'Número de Documento');
    }

    public function HistorialMilitancia(): HasMany
    {
        return $this->hasMany(HistorialMilitancia::class, 'Número de Documento', 'Número de Documento');
    }

    public function programasReintegracion(): \Illuminate\Database\Eloquent\Relations\HasMany
{
    return $this->hasMany(PersonaPrograma::class, 'numero_documento', 'Número de Documento');
}
}