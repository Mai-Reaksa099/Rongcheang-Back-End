<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/auth/google', [\App\Http\Controllers\GoogleAuthController::class, 'redireact'])->name('google-auth');
Route::get('/auth/google/callback', [\App\Http\Controllers\GoogleAuthController::class, 'callBack']);


Route::get('/verify-account', [App\Http\Controllers\HomeController::class, 'verifyaccout'])->name('verifyAccount');
Route::post('/verifyotp', [App\Http\Controllers\HomeController::class, 'userverification'])->name('verifyotp');

