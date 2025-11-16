<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fuerza extends Model
{
    protected $table = 'fuerzacombatiente';
    public $timestamps = false;
    protected $fillable = ['Nombre'];
}