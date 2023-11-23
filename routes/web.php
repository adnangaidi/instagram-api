<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstagramController;
use App\Http\Controllers\ReelController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UploadReelsController;


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
Route::get('/auth/instagram', [InstagramController::class,'redirectToInstagram']);
Route::get('/login/instagram/callback', [InstagramController::class,'handleInstagramCallback']);
Route::get('/reels', [ReelController::class,'index']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/store', [UploadReelsController::class, 'store']);
