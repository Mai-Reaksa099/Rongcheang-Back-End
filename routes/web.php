<?php


use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;
//
///*
//|--------------------------------------------------------------------------
//| Web Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register web routes for your application. These
//| routes are loaded by the RouteServiceProvider and all of them will
//| be assigned to the "web" middleware group. Make something great!
//|
//*/
//
Route::get('/', function () {
   return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Route::get('/home', function (){
//    return view('home');
//})->middleware(['auth'])->name('home');
//Auth::routes();
//
//Route::get('/auth/google', [\App\Http\Controllers\GoogleAuthController::class, 'redireact'])->name('google-auth');
//Route::get('/auth/google/callback', [\App\Http\Controllers\GoogleAuthController::class, 'callBack']);
//
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
//Route::get('/verify-account', [App\Http\Controllers\HomeController::class, 'verifyaccout'])->name('verifyAccount');
////Route::post('/verifyotp', [App\Http\Controllers\HomeController::class, 'userverification'])->name('verifyotp');

