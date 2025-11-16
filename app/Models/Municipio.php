<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Municipio extends Model
{
    protected $table = 'municipio';
    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'ID_Departamento'
    ];

    public function departamento(): BelongsTo
    {
        return $this->belongsTo(Departamento::class, 'ID_Departamento');
    }
}