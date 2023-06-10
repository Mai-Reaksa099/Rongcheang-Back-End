<?php

namespace App\Http\Controllers\Fixer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fixer\AuthFixer;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'uname'=>'required|string|min:2|max:100',
            'email'=>'required|string|unique:users|email',
            'password'=>'required|string|min:8|max:10',
            'numberPhone'=>'required',

        ]);
        $user_exist = AuthFixer::where('email', $request->email)->first();
        if($user_exist){
            return response([
                'message'=>'Create Success!',
                'success'=>false
            ]);
        }

        $user = AuthFixer::create([
            'uname'=>$request->uname,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'numberPhone'=>$request->numberPhone
        ]);
        return response([
            'message'=>'Create Success',
            'success'=>true,
            '$user'=>$user
        ]);
    }
}
