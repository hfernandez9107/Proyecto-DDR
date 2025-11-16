<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Beneficio extends Model
{
    protected $table = 'beneficio';
    public $timestamps = false;

    protected $fillable = [
        'ID_Programa',
        'Tipo',
        'Descripción',
        'Fecha'
    ];

    public function reintegración(): BelongsTo
    {
        return $this->belongsTo(Reintegracion::class, 'ID_Programa');
    }
}