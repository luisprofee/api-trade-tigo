<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regional extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
        
    ];


    public function verticals()
    {
        return $this->hasMany('App\Models\Vertical');
    }


    public function budgetChannelRegionals()
    {
        return $this->hasMany('App\Models\BudgetChannelRegional');
    }
}
