<?php

namespace App\Models\Fixer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthFixer extends Model
{
    use HasFactory;
    protected $fillable = ['uname'];
    protected $guarded = ['*'];
    protected $table = 'auth_fixer';
}
