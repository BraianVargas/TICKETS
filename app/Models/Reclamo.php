<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_denunciante',
        'apellido_denunciante',
        'dni_denunciante',
        'correo_denunciante',
        'telefono_denunciante',
        'direccion_denunciante',
        'razon_social',
        'objeto_denunciado',
        'direccion_denunciado',
        'departamento_denunciado',
        'provincia_denunciado',
        'asunto',
        'sector',
        'prioridad',
        'comprobante_reclamo',
        'motivo',
        'estado' => 'Abierto',
    ];
}
