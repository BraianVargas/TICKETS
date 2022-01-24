<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject',
        'status',
        'priority',
        'sector',
        'comprobante',
        'creation_datetime',
        'lastmodif_datetime',
        'creator_id',
        'modifier_id',
        'caller_id',
        'target_id',
    ];
}
