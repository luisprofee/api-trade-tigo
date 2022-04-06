<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'objetive',
        'budget_type_id',
        'state',
        'action_plan_id',
        'country_id'
    ];

    public function budgetChannelRegionals()
    {
        return $this->hasMany('App\Models\BudgetChannelRegional');
    }

    public function actionPlan()
    {
        return $this->belongsTo('App\Models\ActionPlan');
    }

    public function budgetType()
    {
        return $this->belongsTo('App\Models\BudgetType');
    }
}
