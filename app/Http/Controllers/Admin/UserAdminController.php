<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fixer\AuthFixer;
use App\Models\User;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    public function getAllUser(Request $request){
        $user = User::all();
        $poster = AuthFixer::all();
        return response([
            '$user'=>$user,
            '$poster'=>$poster
        ]);
    }
}
