<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denunciado extends Model
{    
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'razon_social',
        'objeto_denunciado',
        'direccion_denunciado',
        'departamento_denunciado',
        'provincia_denunciado',
    ];
}
