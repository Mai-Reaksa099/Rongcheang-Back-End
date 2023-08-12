<?php

namespace App\Http\Controllers\Fixer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Fixer\AuthFixer;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function fixerRegister(Request $request){
        $request->validate([
            'name'=>'required|string|min:2|max:100',
            'email'=>'required|string|unique:users|email',
            'password'=>'required|string|min:8|max:10',
            'phoneNumber'=>'required|string|min:9|max:9',
            'companyName'=>'required',
            'typeCompany'=>'required',
            'socialMedia'=>'required',
            'address'=>'required'

        ]);


        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'phoneNumber'=>$request->phoneNumber,
            'companyName'=>$request->companyName,
            'typeCompany'=>$request->typeCompany,
            'socialMedia'=>$request->socialMedia,
            'address'=>$request->address,
            //'role' =>$request->user('FIXER'),

        ]);
        return response([
            'message'=>'Create Success',
            'success'=>true,
            '$user'=>$user
        ]);
    }
    public function fixerLogin(Request $request){
        $request->validate([
            'email'=>'required|string',
            'password'=>'required|string'
        ]);
        $user = User::where('email', $request->email)->first();
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
