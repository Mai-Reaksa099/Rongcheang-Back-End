<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResources;
use App\Models\PostProduct;
use App\Models\RatingStart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Post extends Controller
{
    public function postContent(Request $request){
         $request->validate([
            'image' =>'required',
            'title'=>'required',
            'description'=>'required',

        ]);

        $post = PostProduct::create([
            'image'=>$request->image,
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id'=>Auth::user()->id
        ]);
        return response($post);
    }
    public function rating(Request $request){
        $request->validate([
            'post_id'=>'required'
        ]);
        RatingStart::create([
            'post_id'=>$request->post_id,
            'user_id'=>Auth::user()->id

        ]);
        return response("Like");
    }
    public function deletePost(Request $request){

    }
    public function updatePost(Request $request){

    }
    public function getPost($id){
        $post = PostProduct::find($id);
        return response(new PostResources($post));
    }
    public function posting(){
        return PostProduct::all();
    }
    public function update(Request $request, $id){
        $product = PostProduct::find($id);
        $product->update($request->all());
        return $product;
    }
}
