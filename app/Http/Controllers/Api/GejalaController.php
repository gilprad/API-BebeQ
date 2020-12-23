<?php

namespace App\Http\Controllers\Api;

use \App\Gejala;
use \App\Penyakit;
use \App\GejalaPenyakit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GejalaController extends Controller
{
	public $ok = 200;
    public function indexPenyakit()
    {
        $a = Penyakit::with('Gejala')->get();
        return response()->json([
            'data' => $a,
            'status' => 'ok',
            'statusCode' => $this->ok,
        ], $this->ok);
    }
    public function index()
    {
    	$a = Gejala::All();
    	return response()->json([
            'data' => $a,
            'status' => 'ok',
            'statusCode' => $this->ok,
        ], $this->ok);
    }
    public function selesai(Request $request)
    {
        if (Penyakit::where('pola',$request->pola)->first()) {
            $x = Penyakit::where('pola',$request->pola)->first();
            $y = $x->Gejala;
            return response()->json([
                'status' => 'ada',
                'penyakit' => $x,
            ], 200);
        }else{
            $a=[];
            $ar = explode(",",$request->pola);
            foreach ($ar as $key) {
                $fetch = Gejala::whereId($key)->first();
                array_push($a, $fetch);
            }
            return response()->json([
                'gejala' => $a,
                'status' => 'tidak ada',
                'message' => 'Penyakit dengan gejala ini belum ada',
            ], 401);
        }
    }
    public function input(Request $request)
    {
        Gejala::create([
            'name' => $request->name
        ]);
        return response()->json([
            'msg' => 'ok',
            'statusCode' => $this->ok,
        ], $this->ok);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'pola' => 'required',
            'solusi' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([$validator->errors()], 401);
        }else{
            $pola = $request->pola;
            if (Penyakit::where('pola',$pola)->first()) {
                return response()->json([
                    'message' => 'Penyakit dengan gejala ini sudah ada',
                    'status' => 'error',
                    'type' => 'gejala',
                    'statusCode' => 401,
                ], 401);
            }else if(Penyakit::where('name',$request->name)->first()){
                return response()->json([
                    'message' => 'Penyakit dengan nama ini sudah ada',
                    'status' => 'error',
                    'type' => 'nama',
                    'statusCode' => 401,
                ], 401);
            }else{

                $p = Penyakit::create([
                    'name' => $request->name,
                    'pola' =>  $pola,
                    'solusi' => $request->solusi
                ]);
                $a = explode(",",$pola);
                foreach ($a as $key) {
                    $penyakit = Penyakit::find($p->id);
                    $penyakit->Gejala()->attach($key);
                }
                return response()->json(['ok'], 200);
            }
        }
    }
    public function update(Request $request)
    {
        // body => {pola, name, id}
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'pola' => 'required',
            'solusi' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([$validator->errors()], 401);
        }else{
            $pola = $request->pola;
            if (Penyakit::where('pola',$pola)->where('id','!=',$request->id)->first()) {
                return response()->json([
                    'message' => 'Penyakit dengan gejala ini sudah ada',
                    'status' => 'error',
                    'statusCode' => 401,
                ], 401);
            }else{
                $penyakit = Penyakit::find($request->id);
                $penyakit->update([
                    'name' => $request->name,
                    'pola' => $pola,
                    'solusi' => $request->solusi
                ]);
                $penyakit->Gejala()->detach();

                $a = explode(",",$pola);
                foreach ($a as $key) {
                    $penyakit->Gejala()->attach($key);
                }
                return response()->json(['ok'], 200);
            }

        }
    }
    public function updateGejala(Request $request)
    {
        Gejala::whereId($request->id)
        ->update([
            'name' => $request->name
        ]);
        return response()->json('ok');
    }
}
