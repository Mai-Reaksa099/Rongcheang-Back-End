<?php

namespace App\Http\Controllers\Fixer;

use App\Http\Controllers\Controller;
use App\Models\PostProduct;
use Illuminate\Http\Request;

class ProfileManagementController extends Controller
{
    public function Profile(Request $request){
        $profile = PostProduct::all();
        return response($profile);
    }
}
