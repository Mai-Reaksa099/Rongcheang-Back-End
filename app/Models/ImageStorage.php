<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageStorage extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'image';
    protected $fillable = [ 'post_id', 'user_id', 'image_url', 'image_public_id'];
    public function getFillable()
    {
        return $this->fillable;
    }
}
