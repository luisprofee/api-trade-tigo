<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'objetive',
        'product_id',
        'state'
    ];

    public function budgets()
    {
        return $this->hasMany('App\Models\Budget');
    }
}
