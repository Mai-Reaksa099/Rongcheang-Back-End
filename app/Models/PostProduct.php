<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\RatingStart;
use App\Http\Resources\Post\PostResources;
use Laravel\Scout\Searchable;
class PostProduct extends Model
{
    use HasFactory, Searchable;
    protected $table = 'post_products';
    protected $fillable = [ 'title', 'description', 'uuid', 'user_id'];

//    public function getPost(){
//        return $this->belongsTo(\App\Models\User::class, 'user_id');
//    }
//    public function getRating(){
//        return $this->hasMany(RatingStart::class, 'post_id');
//    }
    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */
    public function toSearchableArray(): array
    {
        $array = $this->toArray();

        // Customize the data array...

        return $array;
    }
}
