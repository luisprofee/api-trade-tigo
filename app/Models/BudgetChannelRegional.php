<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetChannelRegional extends Model
{
    use HasFactory;

    protected $fillable = [
        'PPTO',
        'budget_id',
        'channel_id',
        'regional_id',
        'detail'
    ];

    public function budget()
    {
        return $this->belongsTo('App\Models\Budget');
    }

    public function channel()
    {
        return $this->belongsTo('App\Models\Channel');
    }

    public function regional()
    {
        return $this->belongsTo('App\Models\Regional');
    }
}
