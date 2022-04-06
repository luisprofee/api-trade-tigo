<?php

namespace App\Http\Controllers;

use App\Models\BudgetChannelRegional;
use App\Models\Budget;
use Illuminate\Http\Request;
use DB;

class BudgetChannelRegionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $id )
    {
        $budgetsType = BudgetChannelRegional::with(['channel','regional','budget'=> function($query) use ($id){
            $query->where([
               ['budgets.id',$id]
            ]);
        }])
        ->where([
            ['budget_channel_regionals.budget_id',$id]
         ])
        ->get();
        return response()->json(["distribucion"=>$budgetsType]);
    }


    public function opcupationBudget( $id )
    {
        $budget = Budget::where('id',$id)->first();
        
        $accumulateds = BudgetChannelRegional::where('budget_id',$id)->get();
        $total = 0;
        foreach ($accumulateds as $key => $accumulated) {
            $total = $total + $accumulated->PPTO;
        }

        return response()->json(["budget"=>$budget,"accmulated"=>$total]);
    }


    public function budgetsRegionlasChannels( Request $request )
    {
        $budgetsType = BudgetChannelRegional::with(['channel','regional','budget'])
        ->where('budget_channel_regionals.budget_id','like','%'.$request->p)
        ->where('budget_channel_regionals.regional_id','like', '%'.$request->r)
        ->where('budget_channel_regionals.channel_id','like', '%'.$request->c)
        ->get();

        $budget = Budget::where('id',$request->p)->first();

        $accumulateds = BudgetChannelRegional::where('budget_id',$request->p)->get();
        $total = 0;
        foreach ($accumulateds as $key => $accumulated) {
            $total = $total + $accumulated->PPTO;
        }
        return response()->json(["distribucion"=>$budgetsType, "accumulated"=>$total, "budget"=>$budget]);
    }

    public function searchBudget( $id )
    {
        $budgetsType = BudgetChannelRegional::with(['channel','regional','budget'])
        ->where([
            ['id',$id]
        ])
        ->get();
        return response()->json(["distribucion"=>$budgetsType]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request )
    {
        $search = BudgetChannelRegional::where([
            ['budget_id',$request->budget_id],
            ['regional_id',$request->regional_id],
            ['channel_id',$request->channel_id]
        ])
        ->get();

        if (count($search) >= 1) {
            return response()->json(["ok"]);
        }

        $data = BudgetChannelRegional::create([
            'PPTO' => $request->PPTO,
            'budget_id'=> $request->budget_id,
            'channel_id'=> $request->channel_id,
            'regional_id'=> $request->regional_id,
            'detail'=> 'detalles'
        ]);

        return response()->json(["data"=>$data]);
    }

    public function updateBudget( Request $request )
    {
        $update = DB::table('budget_channel_regionals')
            ->select('id', 'PPTO','regional_id','channel_id','budget_id','detail')
            ->where([
                ['id',$request->id]
            ])
            ->update(["PPTO"=>$request->PPTO,"regional_id"=>$request->regional_id,"channel_id"=>$request->channel_id,"budget_id"=>$request->budget_id,"detail"=>$request->detail]);

        return response()->json(["Presupuesto actualizado correctamente"]);
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
     * @param  \App\Models\BudgetChannelRegional  $budgetChannelRegional
     * @return \Illuminate\Http\Response
     */
    public function show(BudgetChannelRegional $budgetChannelRegional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BudgetChannelRegional  $budgetChannelRegional
     * @return \Illuminate\Http\Response
     */
    public function edit(BudgetChannelRegional $budgetChannelRegional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BudgetChannelRegional  $budgetChannelRegional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BudgetChannelRegional $budgetChannelRegional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BudgetChannelRegional  $budgetChannelRegional
     * @return \Illuminate\Http\Response
     */
    public function destroy(BudgetChannelRegional $budgetChannelRegional)
    {
        //
    }
}
