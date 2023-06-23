<?php

namespace App\Http\Controllers\Fixer;

use App\Http\Controllers\Controller;
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
            'numberPhone'=>'required|string|min:9|max:9',
            'companyName'=>'required',
            'typeCompany'=>'required',
            'socialMedia'=>'required',
            'address'=>'required'

        ]);


        $user = AuthFixer::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'numberPhone'=>$request->numberPhone,
            'companyName'=>$request->companyName,
            'typeCompany'=>$request->typeCompany,
            'socialMedia'=>$request->socialMedia,
            'address'=>$request->address

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
        $user = AuthFixer::where('email', $request->email)->first();
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

    public function getFixerData(){
        return AuthFixer::all();
    }
}
