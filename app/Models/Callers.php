<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Callers extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'lastname',
        'dni',
        'mail',
        'phone',
        'location',
    ];
}
