<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\RatingStart;
use App\Http\Resources\Post\PostResources;
class PostProduct extends Model
{
    use HasFactory;
    protected $table = 'post_products';
    protected $guarded = ['id'];
//    public function getPost(){
//        return $this->belongsTo(\App\Models\User::class, 'user_id');
//    }
//    public function getRating(){
//        return $this->hasMany(RatingStart::class, 'post_id');
//    }
}
