<?php

use App\Http\Controllers\ReelController;
use App\Http\Controllers\UploadReelsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/showcomptes',[ReelController::class,'showcomptes']); 
Route::get('/auth/instagram', [InstagramController::class,'redirectToInstagram']);
Route::get('/login/instagram/callback', [InstagramController::class,'handleInstagramCallback']);
Route::post('/store', [UploadReelsController::class, 'store']);
