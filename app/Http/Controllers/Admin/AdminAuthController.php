<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuthAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function adminRegister(Request $request){
        $request->validate([
            'name'=>'required|string|min:2|max:100',
            'email'=>'required|string|unique:users|email',
            'password'=>'required|string|min:8|max:10'
        ]);
        $user_exist = AuthAdmin::where('email', $request->email)->first();
        if($user_exist){
            return response([
                'message'=>'Create Success!',
                'success'=>false
            ]);
        }

        $user = AuthAdmin::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        return response([
            'message'=>'Create Success',
            'success'=>true,
            '$user'=>$user
        ]);
    }
    public function adminLogin(Request $request){
        $request->validate([
            'email'=>'required|string',
            'password'=>'required|string'
        ]);
        $user = AuthAdmin::where('email', $request->email)->first();
        if(!$user){
            return response([
                'message'=>'User Not Found!',
                'success'=>false
            ]);
        }
        if(Hash::check($request->password, $user->password)){
            $token = $user->createToken('authToken')->plainTextToken;

            return response([
                'message'=>'Longin Success',
                'success'=>true,
                'user'=>$user,
                'token'=>$token,
            ]);
        }
        return response([
            'message'=>'Email and Password  not found!',
            'success'=>false,
        ]);
    }
}
