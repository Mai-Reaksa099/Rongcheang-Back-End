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
    public function update(Request $request, $id){
        $costumer = AuthFixer::find($id);
        $costumer->update($request->all());
        return $costumer;
    }
    public function deleteUser($id){
        $delete = AuthFixer::destroy($id);
        return response([
            'message'=>'Deleted User',
            '$user'=>$delete
        ]);
    }
}
