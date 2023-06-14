<?php

namespace App\Models\Fixer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class AuthFixer extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = ['name','email','password','numberPhone','companyName','typeCompany','socialMedia','address'];
    protected $table = 'auth_fixer';

}
