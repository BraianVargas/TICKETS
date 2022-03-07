<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    public $timestamps = false;

    use HasFactory;
    protected $fillable = [
        'subject',
        'status',
        'priority',
        'sector',
        'comprobante',
        'creator_id',
        'modifier_id',
        'caller_id',
        'target_id',
        'creation_datetime',
        'lastmodif_datetime',
    ];
}
