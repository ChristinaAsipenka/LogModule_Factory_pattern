<?php

use App\Http\Controllers\LoggerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('log', [LoggerController::class, 'log']);
Route::get('logtoall', [LoggerController::class, 'logToAll']);
Route::get('logto/{type}', [LoggerController::class, 'logTo']);
