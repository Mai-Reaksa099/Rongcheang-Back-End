<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fixer\AuthFixer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductAdminController extends Controller
{
    public function list_user(){
        $list = DB::select('SELECT name, email, numberPhone, companyName,typeCompany, address, role  FROM auth_fixer');
        return response([
            'fixer'=>$list
        ]);
    }
    public function delete_fixer($id){
        $delete = AuthFixer::destroy($id);
        return response([
            $delete,
            'user'=>'Fixer was Delete'
        ]);
    }
    public function guest_user(){
        $list = DB::select('SELECT name, email  FROM users');
        return response([
            'guest'=>$list
        ]);
    }
    public function delete_guest($id){
        $delete = User::destroy($id);
        return response([
            $delete,
            'user'=>'Guest was Delete'
        ]);
    }
}
