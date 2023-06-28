<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResources;
use App\Models\Fixer\AuthFixer;
use App\Models\PostProduct;
use App\Models\RatingStart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class Post extends Controller
{
    public function postContent(Request $request){
        $resopen = cloudinary();
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
        $product = PostProduct::all();
        return response([
            'product'=>$product,
            'state'=>2003
        ]);
    }
    public function userInfo(){
        $infoUser = DB::select('SELECT name, numberPhone, companyName, socialMedia, address FROM auth_fixer');
        return response($infoUser);
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
