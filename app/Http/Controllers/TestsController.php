<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Tests;
use App\Models\Regional;
use App\Models\Channel;
use App\Models\BudgetType;
use App\Models\Product;
use App\imports\TestsImport;
use App\Models\BudgetChannelRegional;
use Illuminate\Http\Request;

class TestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tests::all();
        return response()->json(['distribucion'=>$data]);
    }

    public function import(Request $request) 
    {
        //return 'si llega';
        $test = $request->file('excel')->store('avatar');
        //dd($test);
        if (true) {
            Tests::truncate();

            Excel::import(new TestsImport, $test); 

        }

        $tests = Tests::all();
        foreach ($tests as $key => $test) {
            $reginal_id = Regional::select('id')->where('name', $test->region)
            ->first();

            /*$budget_type = BudgetType::select('id')->where('name', $test->clase)
            ->first();*/

            $channel_id = Channel::select('id')->where('name', $test->canal)
            ->first();

            $product_id = Product::select('id')->where('name', $test->segmento)
            ->first();

            $data = BudgetChannelRegional::create([
                'PPTO' => $test->valor,
                'budget_id'=> '1',
                'channel_id'=> $channel_id->id,
                'regional_id'=> $reginal_id->id,
                'detail'=> 'Prueba'
            ]);
        }
        //return $reginal_id;

        return response()->json(['success' => 'todo bien'], 200);  
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tests  $tests
     * @return \Illuminate\Http\Response
     */
    public function show(tests $tests)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tests  $tests
     * @return \Illuminate\Http\Response
     */
    public function edit(tests $tests)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tests  $tests
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tests $tests)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tests  $tests
     * @return \Illuminate\Http\Response
     */
    public function destroy(tests $tests)
    {
        //
    }
}
