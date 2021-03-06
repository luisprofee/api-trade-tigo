<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vertical extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function regionals()
    {
        return $this->hasMany('App\Models\Regional');
    }

    public function channels()
    {
        return $this->hasMany('App\Models\Channel');
    }
}
