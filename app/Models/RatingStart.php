<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingStart extends Model
{
    use HasFactory;
    protected $table = 'rating_starts';
    protected $guarded = ['id'];
}
