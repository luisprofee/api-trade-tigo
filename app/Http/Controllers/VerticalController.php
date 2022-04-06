<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Budget;
use App\Models\Vertical;

class VerticalController extends Controller
{
    public function index( $id )
    {
        $budget = Budget::where('id',$id)->first();

        $verticals = DB::table('weight_verticals')
        ->join('verticals','weight_verticals.vertical_id','verticals.id')
        ->select('verticals.name as name','weight', 'weight_verticals.id',
                    DB::raw('('.$budget->value.'* weight)/100 as distribucion')
                    )
        ->get();
        

        $data = DB::table('channel_regional_verticals')
        ->join('regionals','channel_regional_verticals.regional_id','regionals.id')
        ->join('channels','channel_regional_verticals.channel_id','channels.id')
        ->join('verticals','channel_regional_verticals.vertical_id','verticals.id')
        ->select('regionals.name as regional', 'channels.name as channel', 'verticals.name as vertical', 'weight AS peso',
                    DB::raw('('.$budget->value.' * weight)/100 as asignado')
                    )

        ->orderBy('regionals.name')
        ->orderBy('channels.name')
        ->get();

        foreach ($data as $key => $info) {
            $info->asignado = (int)$info->asignado;
        }
        foreach ($verticals as $key => $vertical) {
            $vertical->distribucion = (int)$vertical->distribucion;
        }
        $pesoVertical = 0;
        foreach ($verticals as $key => $vertical) {
            $pesoVertical = $pesoVertical + $vertical->weight;
        }


        return response()->json(["pesos"=>$data,"verticales"=>$verticals,"pesosVerticals"=>$pesoVertical]);
        
    }

    public function listVerticals()
    {
        $verticals = DB::table('verticals')
        ->join('weight_verticals','verticals.id','weight_verticals.vertical_id')
        ->select('*')
        ->get();
        $acu = 0;
        foreach ($verticals as $key => $vertical) {
            $acu = $acu + $vertical->weight;
        }
        return response()->json(["verticales"=>$verticals,"pesoTotal"=>$acu]);
    }

    

    public function dealer($id, $value)
    {
        $data = DB::table('channel_regional_verticals')
        ->join('regionals','channel_regional_verticals.regional_id','regionals.id')
        ->join('channels','channel_regional_verticals.channel_id','channels.id')
        ->join('verticals','channel_regional_verticals.vertical_id','verticals.id')
        ->select('regionals.name as regional', 'channels.name as channel', 'channel_regional_verticals.id',
         'verticals.name as vertical', 'weight AS peso',
                    DB::raw('('.$value.' * weight)/100 as asignado')
                    )

        ->where('channel_regional_verticals.channel_id',$id)
        ->get();

        $pptoacum = 0;
        foreach ($data as $key => $info) {
            $pptoacum = $pptoacum + $info->asignado;
        }
        $acuPeso = 0;
        foreach ($data as $key => $info) {
            $acuPeso = $acuPeso + $info->peso;
        }

        

        return response()->json(["dealer"=>$data,"acumulado"=>$pptoacum,"pesoRegional"=>$acuPeso]);

    }

    public function channelVerticals($id, $value)
    {
        $dataChannel = DB::table('channel_verticals')
        ->join('channels','channel_verticals.channel_id','channels.id')
        ->join('verticals','channel_verticals.vertical_id','verticals.id')
        ->select('channels.name as channel', 'channel_verticals.id', 'channel_verticals.channel_id',
         'verticals.name as vertical', 'weight AS peso',
                    DB::raw('('.$value.' * weight)/100 as asignado')
                    )
        ->where('channel_verticals.vertical_id',$id)
        ->get();
        $acuPeso = 0;
        foreach ($dataChannel as $key => $channel) {
            $acuPeso = $acuPeso + $channel->peso;
        }

        return response()->json(["channelsVerticals"=>$dataChannel,"pesoChannel"=>$acuPeso]);
    }

    public function updateWeightVertical($id, $weight)
    {
        $update = DB::table('weight_verticals')
        ->select('id','weight')
        ->where([
            ['id',$id]
        ])
        ->update(["weight"=>$weight]);

        return response()->json(["ok"]);
    }

    public function updateWeightChannel($id, $weight)
    {
        $update = DB::table('channel_verticals')
        ->select('id','weight')
        ->where([
            ['id',$id]
        ])
        ->update(["weight"=>$weight]);

        return response()->json(["ok"]);
    }

    public function updateWeightRegional($id, $weight)
    {
        $update = DB::table('channel_regional_verticals')
        ->select('id','weight')
        ->where([
            ['id',$id]
        ])
        ->update(["weight"=>$weight]);

        return response()->json(["ok"]);
    }

    public function saveVertical( Request $request )
    {

        $data = Vertical::where('name',$request->name)->get();
        if (count($data)) {
            return response()->json(["existe"]);
        }
        $vertical = Vertical::create([
            'name' => $request->name
        ]);

        $v = Vertical::where('name',$request->name)->first();

        $weight = DB::insert('insert into weight_verticals (weight, vertical_id) values('.$request->weight.','.$v->id.')');

        return response()->json(["insertado con exito"]);
    }

    
}
