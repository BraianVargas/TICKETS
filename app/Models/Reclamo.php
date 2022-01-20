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
        'denunciante_id',
        'denunciado_id',
        'asunto',
        'sector',
        'prioridad',
        'comprobante_reclamo',
        'motivo',
        'estado' => 'Abierto',
    ];
}
