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
use App\Models\ImageStorage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class Post extends Controller
{
    public function postContent(Request $request){
         $request->validate([
            'image' =>'required',
            'title'=>'required',
            'description'=>'required',
             'category_name_post'=>'required'
        ]);
        $poster = DB::select('SELECT id FROM post_products');
        $image_categoryID = DB::select('SELECT category_name FROM post_category');
        $post = PostProduct::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$request->image,
            'category_name_post'=>$request->$image_categoryID,
            'user_id'=>Auth::user()->id,
            'poster'=>Auth::user()
        ]);

        $response = cloudinary()->upload($request->file('image')
            ->getRealPath(), [
            'folder' => 'ITE'
        ]);

        ImageStorage::create([
            'post_id' => $poster,
            'image_url' => $response->getSecurePath(),
            'image_public_id' => $response->getPublicId()
        ]);

        return response([
            'message'=>'Success',
            'post'=>$post,
        ]);

    }
    public function create_image(){

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
    public function search_product(Request $request){
        if($request->has('search')) {
            $posts = PostProduct::search($request->searchText)->get();
        } else {
            $posts = PostProduct::get();
        }
        return response($posts);
    }

    /**
     * @param str $
     * @return  \Illuminate\Http\Response
     */
    public function search($name){
        return PostProduct::where('name', 'like', '%'.$name.'%')->get();
    }

}

