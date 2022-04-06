<?php

namespace App\Http\Controllers;
use DB;
use App\Models\ActionPlan;
use Illuminate\Http\Request;

class ActionPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planes = ActionPlan::all();
        return response()->json(["planes"=>$planes]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    public function newPlan(Request $request){
        $nuevo_plan = ActionPlan::create([
            'description' => $request->description,
            'objetive'=> $request->objetive,
            'product_id'=> $request->product_id,
            'state'=> $request->state
        ]);

        return response()->json(["Nuevo_Plan"=>$nuevo_plan]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActionPlan  $actionPlan
     * @return \Illuminate\Http\Response
     */
    public function show(ActionPlan $actionPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActionPlan  $actionPlan
     * @return \Illuminate\Http\Response
     */
    public function edit( $id, $state )
    {
        
    }

    public function updateState( $id, $state )
    {
        $update = DB::table('action_plans')
            ->select('id', 'state')
            ->where([
                ['id',$id]
            ])
            ->update(["state"=>$state]);

        return response()->json(["actualizado correctamente"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActionPlan  $actionPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActionPlan $actionPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActionPlan  $actionPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActionPlan $actionPlan)
    {
        //
    }
}
