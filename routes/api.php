<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::post('user/login', 'login');
    Route::post('user/register', 'register');
    Route::post('user/logout', 'logout');
    Route::post('user/refresh', 'refresh');
});

Route::controller(UserController::class)->group(function () {
    Route::get('user/get', 'getCurrentUser');
});

Route::controller(RoutesController::class)->group(function () {
    Route::post('/user/create/route', 'createRoute');
    Route::get('/user/get/route/{user}', 'getRoute');
    Route::post('user/update/route/{route}', 'updateRoute');
    Route::get('redirect/{uri}', 'redirectToRoute');
    Route::get('/user/get/route-link/{uri}', 'linkToRedirect');
});
