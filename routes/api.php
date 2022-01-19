<?php

use App\Http\Controllers\DistrictController;
use App\Http\Controllers\SectorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/districts',[DistrictController::class,'index']);
Route::get('/districts/{id}',[DistrictController::class,'show']);
Route::prefix('/districts')->group(function (){
    Route::post('/store',[DistrictController::class,'store']);
    Route::put('/{id}',[DistrictController::class,'update']);
    Route::delete('/{id}',[DistrictController::class,'destroy']);
});

Route::get('/sectors',[SectorController::class,'index']);
Route::get('/sectors/{id}',[SectorController::class,'show']);
Route::prefix('/sectors')->group(function (){
    Route::post('/store',[SectorController::class,'store']);
    Route::put('/{id}',[SectorController::class,'update']);
    Route::delete('/{id}',[SectorController::class,'destroy']);
});
