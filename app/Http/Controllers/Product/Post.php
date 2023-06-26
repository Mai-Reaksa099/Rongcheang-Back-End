<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResources;
use App\Models\Fixer\AuthFixer;
use App\Models\PostProduct;
use App\Models\RatingStart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class zPost extends Controller
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
            'user_id'=>Auth::user()->id,
            'poster'=>Auth::user()
        ]);
        $poster = AuthFixer::all();
//        $uploadedFileUrl =
//            Cloudinary::upload($request->file('file')->getRealPath())->getSecurePath();

        return response([
            'message'=>'Success',
            'status'=>300,
            '$post'=>$post,
            'poster'=>$poster
        ]);
    }
    public function rating(Request $request){
        $request->validate([
            'post_id'=>'required'
        ]);
        RatingStart::create([
            'post_id'=>$request->post_id,
            'user_id'=>Auth::auth_fixer()->id

        ]);
        return response("Like");
    }
    public function deletePost($id){
        return PostProduct::destroy($id);
    }
    public function getPost($id){
        $post = PostProduct::find($id);
        return response(new PostResources($post));
    }
    public function getAll(){
        return PostProduct::all();
    }
    public function posting(){
        return PostProduct::all();
    }
    public function updateContent(Request $request, $id){
        $product = PostProduct::find($id);
        $product->update($request->all());
        return $product;
    }
}
