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

# Filter Data
Route::get('/get-user', [Admin\UserAdminController::class, 'getAllUser']);

# Protection Routing
Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::post('/category-name',[Product\PostCategoryController::class, 'category']);
    Route::post('/posting', [Product\Post::class, 'postContent']);
    Route::post('/rating', [Product\Post::class, 'rating']);
    Route::post('/comment', [Product\Comment::class, 'comment']);
    Route::get('/get-post/{id}', [Product\Post::class, 'getPost']);
    Route::get('/user-post', [Product\Post::class, 'posting']);
    Route::put('/update/{id}', [Product\Post::class, 'updateContent']);
    Route::get('/search-product/{name}', [Product\Post::class, 'search_product']);
    Route::put('/update-user/{id}', [Admin\UserAdminController::class, 'update']);
    Route::get('/get_user', [Auth\AuthController::class, 'getUser']);
    Route::get('/get_post', [Product\Post::class, 'getAll']);
    Route::get('/get_post/user', [Product\Post::class, 'userInfo']);
    Route::delete('/delete_post/{id}', [Product\Post::class, 'deletePost']);
    Route::get('/get-fixer', [Fixer\AuthController::class, 'getFixerData']);
    Route::get('fixer/profile_management', [Fixer\ProfileManagementController::class, 'profile_management']);
    Route::put('/update-fixer/{id}', [Admin\UserAdminController::class, 'update']);
    Route::delete('/delete-user/{id}', [Admin\UserAdminController::class, 'deleteUser']);
    Route::get('admin/list-fixer', [Admin\ProductAdminController::class, 'list_user']);
    Route::get('admin/list-guest', [Admin\ProductAdminController::class, 'guest_user']);
    Route::delete('admin/delete-fixer/{id}', [Admin\ProductAdminController::class, 'delete_fixer']);
    Route::delete('admin/delete-guest/{id}', [Admin\ProductAdminController::class, 'delete_guest']);

});
Route::group(['middleware' => ['web']], function () {
    Route::get('auth/google', [GoogleAuthController::class, 'redireact'])->name('google-auth');
    Route::get('auth/google/callback', [GoogleAuthController::class, 'callBack']);
});



