<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginPage(){
        return view('auth.login.login');
    }
    public function userLogin(Request $request){
        $user=User::where('email', $request->input('email'))
            ->where('password', $request->input('password'))->count();
        if($user==1){
            $token=JWTToken::CreateToken($request->input('email'));
            return response()->json([
                'status'=>true,
                'message'=>'user login successfully',
            ])->cookie('token', $token, 60*24);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'user email and password not match',
            ]);
        }
    }
}
