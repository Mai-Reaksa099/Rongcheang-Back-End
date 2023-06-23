<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use Illuminate\Http\Request;

class Comment extends Controller
{
    public function comment(Request $request){
        $request->validate([
            'post_id'=>'required',
            'body'=>'required'
        ]);
        $comment = Comments::create([
            'post_id'=>$request->post_id,
            'body'=>$request->body,
            'user_id'=>Auth()->user()->id
        ]);
        return rescue($comment);
    }
}
