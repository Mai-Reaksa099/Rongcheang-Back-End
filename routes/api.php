<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Product;
use App\Http\Controllers\Fixer;
use App\Http\Controllers\Admin;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [Auth\AuthController::class, 'register']);
Route::post('/login', [Auth\AuthController::class, 'login']);
Route::post('/admin-register', [Admin\AdminAuthController::class, 'adminRegister']);
Route::post('/admin-log', [Admin\AdminAuthController::class, 'adminLogin']);
Route::post('/register-fixer', [Fixer\AuthController::class, 'fixerRegister']);
Route::post('/login-fixer', [Fixer\AuthController::class, 'fixerLogin']);

# Protection Routing
Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::post('/posting', [Product\Post::class, 'postContent']);
    Route::post('/rating', [Product\Post::class, 'rating']);
    Route::post('/comment', [Product\Comment::class, 'comment']);
    Route::get('/get-post/{id}', [Product\Post::class, 'getPost']);
    Route::get('/user-post', [Product\Post::class, 'posting']);
    Route::put('/update/{id}', [Product\Post::class, 'updateContent']);
    Route::get('/get_user', [Auth\AuthController::class, 'getUser']);
    Route::get('/get_post', [Product\Post::class, 'getAll']);
    Route::delete('/delete_post/{id}', [Product\Post::class, 'deletePost']);

});
 # Admin Panel
Route::get('/get-user', [Admin\UserAdminController::class, 'getAllUser']);
