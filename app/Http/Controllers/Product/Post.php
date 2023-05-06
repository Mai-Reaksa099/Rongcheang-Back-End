<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\PostProduct;
use Illuminate\Http\Request;

class Post extends Controller
{
    public function postContent(Request $request){
        $post = $request->validate([
            'image' =>'required',
            'title'=>'required',
            'description'=>'required',

        ]);

        PostProduct::create([
            'image'=>$request->image,
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id'=>Auth()->user()->id
        ]);
        return response($post);
    }
}
