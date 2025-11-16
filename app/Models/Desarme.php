<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Desarme extends Model
{
    protected $table = 'desarme';
    protected $primaryKey = 'ID Proceso';
    public $timestamps = false;

    protected $fillable = [
        'Número de Documento',
        'Fecha Entrega',
        'Estado'
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'Número de Documento', 'Número de Documento');
    }

    public function armas(): HasMany
    {
        return $this->hasMany(Arma::class, 'ID Desarme', 'ID Proceso');
    }
}