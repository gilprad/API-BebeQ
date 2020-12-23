<?php

namespace App\Http\Controllers\Api;

use Auth;
use \App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function info()
    {
        return response()->json([
            'data' => Auth::user(),
        ], 200);
    }
    public function updateInfo(Request $request)
    {
        $id = Auth::user()->id;
        if (Auth::user()->email ==  $request->email) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);            
            }else{
                User::whereId($id)
                ->update([
                    'name' => $request->name,
                ]);
                return response()->json(['ok'],200);
            }
        }
        else{
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
            ]);
            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);            
            }else{
                User::whereId($id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
                return response()->json(['ok'],200);
            }
        }
    }
    public function updatePassword(Request $request)
    {
        $id = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'confirmation_password' => 'required',
            'password' => 'required|same:confirmation_password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }else{
            User::whereId($id)
            ->update([
                'password' => bcrypt($request->password),
            ]);
            return response()->json(['ok'],200);
        }
    }
    public function login(){
        if(Auth::attempt([
        		'email' => request('email'), 
        		'password' => request('password')
        	])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('nApp')->accessToken;
            return response()->json([
                'success' => $success,
                'role' => $user->role,
            ], 200);
        }
        else{
            return response()->json(['error'=>'Unauthorized'], 401);
        }
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'confirmation_password' => 'required',
            'password' => 'required|same:confirmation_password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['role'] = 'peternak';
        $user = User::create($input);
        $success['token'] =  $user->createToken('nApp')->accessToken;

        // return response()->json(['success'=>$success], 200);
        return response()->json([
            'success' => $success,
            'role' => $user->role,
        ], 200);
    }
    public function isAuth()
    {
        $status;
        $statusCode;
        if (Auth::user()) {
            $status = 'ok';
            $statusCode = 200;
        }else{
            $status = 'unauth';
            $statusCode = 401;
        }
        return response()->json([
                'status' => $status,
                'msg' => $statusCode==200 ? 'ok' : 'error',
            ], $statusCode
        );
    }
    public function users()
    {
        $data = User::where('role','peternak')->with('cage')->get();
        return response()->json([
            'status' => 'ok',
            'data' => $data
        ], 200);
    }
}
