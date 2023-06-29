<?php

namespace App\Http\Controllers;

use App\Models\PostProduct;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request, $id){
        $post = PostProduct::all();
}
}
