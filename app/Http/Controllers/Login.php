<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class Login extends Controller
{
    public function userAuth(Resquest $request){

        $credentials=$resquest->only('usuario','password');
        $token=null;

        try{
            
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);

        }
    }catch(JWTException $e){

            return response()->json(['error'=>'algo sucedio password o usuario incorrecto'],500);

        }
        return response()->json(compact('token'));
    }

}