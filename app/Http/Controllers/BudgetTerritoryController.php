<?php

namespace App\Http\Controllers;

use App\Models\BudgetTerritory;
use Illuminate\Http\Request;

class BudgetTerritoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = BudgetTerritory::create([
            'budget' => $request->budget,
            'territory_id'=> $request->territory_id,
            'channel_id'=> $request->channel_id,
            'regional_id'=> $request->regional_id,
            'budget_channel_regional_id'=> $request->budget_channel_regional_id
        ]);

        return response()->json(["data"=>$data]);
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
     * @param  \App\Models\BudgetTerritory  $budgetTerritory
     * @return \Illuminate\Http\Response
     */
    public function show(BudgetTerritory $budgetTerritory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BudgetTerritory  $budgetTerritory
     * @return \Illuminate\Http\Response
     */
    public function edit(BudgetTerritory $budgetTerritory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BudgetTerritory  $budgetTerritory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BudgetTerritory $budgetTerritory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BudgetTerritory  $budgetTerritory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BudgetTerritory $budgetTerritory)
    {
        //
    }
}
