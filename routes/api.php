<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login',[\App\Http\Controllers\api\UserController::class,'login']);

Route::middleware('auth:api')->group(function(){
    Route::get('/logout',[\App\Http\Controllers\api\UserController::class,'logout']);
});
