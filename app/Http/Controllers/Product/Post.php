<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\PostProduct;
use App\Models\RatingStart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function rating(Request $request){
        $request->validate([
            'post_id'=>'required'
        ]);
        $rate = RatingStart::create([
            'post_id'=>$request->post_id,
            'user_id'=>Auth()->user()->id

        ]);
        return response($rate);
    }
    public function deletePost(Request $request){

    }
    public function updatePost(Request $request){

    }
}
