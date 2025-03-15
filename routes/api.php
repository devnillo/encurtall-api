<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::controller(UserController::class)->group(function () {
    Route::get('user', 'getCurrentUser');
});

Route::controller(RoutesController::class)->group(function () {
    Route::post('create/route', 'createRoute');
    Route::get('get/route/{user}', 'getRoute');
    Route::post('user/route/update/{route}', 'updateRoute');
});
