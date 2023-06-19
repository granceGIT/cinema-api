<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\api\UserController::class)->group(function (){
    Route::post('/login','login');
    Route::post('/register','register');
});

Route::controller(\App\Http\Controllers\api\FilmController::class)->group(function(){
    Route::get('/films','index');
    Route::get('/films/{film}','show');
});

Route::controller(\App\Http\Controllers\api\ShowingController::class)->group(function(){
    Route::get('/showings','index');
    Route::get('/showings/popular','popular');
    Route::get('/showings/{showing}/seats/free','freeSeatsCount');
    Route::get('/showings/{showing}/seats','seats');
});

Route::controller(\App\Http\Controllers\api\HallController::class)->group(function(){
    Route::get('/halls','index');
    Route::get('/halls/{hall}/films','films');
});

Route::controller(\App\Http\Controllers\api\GenreController::class)->group(function(){
    Route::get('/genres/{genre}/films','films');
});

Route::middleware('auth:api')->group(function(){
    Route::controller(\App\Http\Controllers\api\UserController::class)->group(function (){
        Route::get('/logout','logout');
        Route::get('/profile','profile');
        Route::get('/orders','orders');
        Route::post('/orders/create','checkoutTransaction');
        Route::post('/films/{film}/rate','rate');

    });




});
