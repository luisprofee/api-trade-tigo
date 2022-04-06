<?php

namespace App\Http\Controllers;

use App\Models\BudgetType;
use Illuminate\Http\Request;
use DB;

class BudgetTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = BudgetType::where('state', 1)
                            ->get();
        return response()->json(["types"=>$types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function createTypeBudget( Request $request )
    {
        $type = BudgetType::create([
            'description' => $request->description,
            'name'=> $request->name,
            'state'=> $request->state
        ]);

        return response()->json(["typeBudget"=>$type]);
    }

    public function updateState( $id, $state )
    {
        $update = DB::table('budget_types')
            ->select('id', 'state')
            ->where([
                ['id',$id]
            ])
            ->update(["state"=>$state]);

        return response()->json(["actualizado correctamente"]);
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
     * @param  \App\Models\BudgetType  $budgetType
     * @return \Illuminate\Http\Response
     */
    public function show(BudgetType $budgetType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BudgetType  $budgetType
     * @return \Illuminate\Http\Response
     */
    public function edit(BudgetType $budgetType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BudgetType  $budgetType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BudgetType $budgetType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BudgetType  $budgetType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BudgetType $budgetType)
    {
        //
    }
}
