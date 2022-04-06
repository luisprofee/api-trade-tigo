<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $budgets = DB::table('budgets')
                ->join('budget_types','budgets.budget_type_id','budget_types.id')
                ->join('action_plans','budgets.action_plan_id','action_plans.id')
                ->select('budgets.id','budgets.value','budgets.objetive','budgets.objetive','budgets.state','action_plans.description','budget_types.name','budget_types.description')
                ->where('budgets.state','=', 1)
                ->get();
        return response()->json(["budgets"=>$budgets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request )
    {
        $budget = Budget::create([
            'value' => $request->value,
            'objetive'=> $request->objetive,
            'state'=> $request->state,
            'budget_type_id'=> $request->budget_type_id,
            'action_plan_id'=> $request->action_plan_id,
            'country_id'=> 1
        ]);

        return response()->json(["budget"=>$budget]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function show(Budget $budget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function edit(Budget $budget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Budget $budget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Budget $budget)
    {
        //
    }
}
