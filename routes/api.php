<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiPostController;
use App\Http\Controllers\Api\Auth\ApiLoginController;


Route::get('posts',[ApiPostController::class, 'index']);
Route::get('posts/{id}',[ApiPostController::class, 'show']);
Route::post('posts',[ApiPostController::class, 'store'])->middleware('auth:sanctum');

Route::post('login',[ApiLoginController::class,'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
