<?php

namespace App\Http\Controllers\Fixer;

use App\Http\Controllers\Controller;
use App\Models\PostProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileManagementController extends Controller
{
    public function profile_management(){
        $profile = DB::select('SELECT name, email, numberPhone, companyName, socialMedia, address FROM auth_fixer');
        return response($profile);
    }
}
