<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetType extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'name',
        'state'
    ];

    public function budgets()
    {
        return $this->hasMany('App\Models\Budget');
    }
}
