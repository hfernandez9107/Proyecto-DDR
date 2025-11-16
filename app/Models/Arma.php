<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Arma extends Model
{
    protected $table = 'armas';
    public $timestamps = false;

    protected $fillable = [
        'ID Desarme',
        'Tipo',
        'Serie',
        'Estado',
        'Fecha_Entrega'
    ];

    public function desarme(): BelongsTo
    {
        return $this->belongsTo(Desarme::class, 'ID_Desarme');
    }
}