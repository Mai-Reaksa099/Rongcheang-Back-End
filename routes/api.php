<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
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
Route::get('/me', function (){
    return "H";
});
Route::get('/my-dm', [Auth\AuthController::class, 'domain']);

# Protection Routing
Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::post('/register', [Auth\AuthController::class, 'register']);
    Route::post('/login', [Auth\AuthController::class, 'login']);
});
