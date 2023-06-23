<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
class AuthAdmin extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = ['name','email','password'];
    protected $table = 'auth_admin';
}
