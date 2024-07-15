<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);

Route::post('register', [AuthController::class, 'register']);


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('/task', TaskController::class);
    Route::apiResource('/users', UserController::class);
});


