<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registerPage(){
        return view('auth.register.register');
    }

    public function userRegister(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|unique:users,email',
                'password'=>'required',
            ]
        );
        User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
        ]);

        return response()->json([
            'status'=>'success',
            'message'=>'user registration completed successfully',
        ]);

    }
}
