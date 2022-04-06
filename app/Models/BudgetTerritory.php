<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetTerritory extends Model
{
    use HasFactory;

    protected $fillable = [
        'budget',
        'budget_id',
        'channel_id',
        'regional_id',
        'territory_id',
        'budget_channel_regional_id'
    ];
}
