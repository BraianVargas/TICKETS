<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denunciante extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'denunciante_id',
        'name_denunciante',
        'apellido_denunciante',
        'dni_denunciante',
        'correo_denunciante',
        'telefono_denunciante',
        'direccion_denunciante',
    ];

}
