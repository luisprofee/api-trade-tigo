<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tests extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor',
        'clase',
        'bu',
        'region',
        'mes',
        'anio',
        'vertical',
        'segmento',
        'canal',
    ];
}
