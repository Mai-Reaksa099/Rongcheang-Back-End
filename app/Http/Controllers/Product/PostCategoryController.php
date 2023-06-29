<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostCategory;
use Illuminate\Support\Facades\Auth;

class PostCategoryController extends Controller
{
    public function category(Request $request){
        $request->validate([
            'category_name' =>'required'
        ]);
        $category = PostCategory::create([
            'category_name'=>$request->category_name,
        ]);
        return response([
            'category'=>$category
        ]);

    }
}
