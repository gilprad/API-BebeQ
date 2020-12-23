<?php

namespace App\Http\Controllers\Api;

use Auth;
use \App\Artikel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Artikel::All();
        return response()->json([
            'data' =>    $data,
            'statusCode' => 200,
        ], 200);
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
        Artikel::create([
            'user_id'=>Auth::user()->id,
            'title'=>$request->title,
            'link_img'=>$request->link_img,
            'value'=>$request->value,
        ]);
        return response()->json([
            'msg' => 'ok',
            'statusCode' => 200,
        ], 200);
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
    public function update(Request $request)
    {
        Artikel::whereId($request->id)
        ->update([
            'title' => $request->title,
            'link_img' => $request->link_img,
            'value' => $request->value,
        ]);
        return response()->json([
            'msg' => 'ok',
            'statusCode' => 200,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Artikel::whereId($request->id)->delete();
        return response()->json([
            'msg' => 'ok',
            'statusCode' => 200,
        ], 200);
    }
}
