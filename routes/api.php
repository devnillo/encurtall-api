<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::controller(UserController::class)->group(function () {
    Route::get('user', 'getCurrentUser');
})->middleware('auth:api');

Route::controller(RoutesController::class)->group(function () {
    Route::post('create/route', 'createRoute');
    Route::get('get/route/{user}', 'getRoute');
    Route::post('user/route/update/{route}', 'updateRoute');


})->middleware('auth:api');
