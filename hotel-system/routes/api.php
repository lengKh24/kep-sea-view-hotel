<?php

use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\RoomMGTApiController;
use App\Http\Controllers\Api\SaleMgtApiController;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {
    Route::apiResource('rooms', \App\Http\Controllers\Api\RoomController::class);
});

Route::name('api.')->group(function () {
    Route::apiResource('roomsmgt', \App\Http\Controllers\Api\RoomMGTApiController::class);
});

Route::name('api.')->group(function () {
    Route::apiResource('sales', \App\Http\Controllers\Api\SaleMgtApiController::class);
});
