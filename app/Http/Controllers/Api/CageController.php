<?php

namespace App\Http\Controllers\Api;

use Auth;
use \App\Cage;
use \App\HistoryCage;
use \App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CageController extends Controller
{
    public $ok = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cage = Cage::where('active',true)
            ->with('category')
            ->with('user')
            ->with('history')
            ->get();
        
        return response()->json([
            'data' => $cage,
            'status' => 'ok',
            'statusCode' => $this->ok,
        ], $this->ok);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategory()
    {
        $c = Category::All();
        return response()->json([
            'statusCode' => $this->ok,
            'msg' => 'ok',
            'category' => $c,
        ], $this->ok);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userID = Auth::user()->id;
        Cage::create([
            'user_id' => $userID,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'current_capacity' => $request->current_capacity,
            'capacity' => $request->capacity,
            'active' => true,
        ]);
        return response()->json([
            'statusCode' => $this->ok,
            'msg' => 'ok'
        ], $this->ok);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'name' => 'required',
            'capacity' => 'required',
            'current_capacity' => 'required',
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }else{
            Cage::where('id', $request->id)
                ->update([
                    'category_id' => $request->category_id,
                    'name' => $request->name,
                    'capacity' => $request->capacity,
                    'current_capacity' => $request->current_capacity,
                ]);
            return response()->json([
                'statusCode' => $this->ok,
                'msg' => 'ok'
            ], $this->ok);
        }
    }
    public function updateCurrent(Request $request)
    {
        //required {id, currents, value, status}
        $cages = Cage::where('id', $request->id)->first();
        if($request->status == 'penambahan'){
            $capacityNow = $request->currents + $cages->current_capacity;
            if ($cages->capacity < $capacityNow) {
                return response()->json([
                    'statusCode' => 401,
                    'msg' => 'Batas Kapasitas Kandang Adalah ' . $cages->capacity,
                ], 401);
            }
            else{
                Cage::where('id', $request->id)
                ->update([
                    'current_capacity' => $capacityNow,
                ]);
                HistoryCage::create([
                    'cage_id' => $request->id,
                    'num' => $request->currents, 
                    'value' => $request->value, 
                    'status' => $request->status, 
                ]);
                return response()->json([
                    'statusCode' => $this->ok,
                    'msg' => 'ok'
                ], $this->ok);
            }
        }else{
            $capacityNow = $cages->current_capacity - $request->currents;
            if ($cages->current_capacity < $request->currents) {
                return response()->json([
                    'statusCode' => 401,
                    'msg' => 'Pengurangan lebih dari stok yang ada yaitu : ' . $cages->current_capacity,
                ], 401);
            }
            else{
                Cage::where('id', $request->id)
                ->update([
                    'current_capacity' => $capacityNow,
                ]);
                HistoryCage::create([
                    'cage_id' => $request->id,
                    'num' => $request->currents, 
                    'value' => $request->value, 
                    'status' => $request->status, 
                ]);
                return response()->json([
                    'statusCode' => $this->ok,
                    'msg' => 'ok'
                ], $this->ok);
            }
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cage::where('id', $id)
        ->update([
            'active' => false,
        ]);
        return response()->json([
            'statusCode' => $this->ok,
            'msg' => 'ok'
        ], $this->ok);
    }
}
