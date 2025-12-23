<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClimaController;
use App\Http\Controllers\TokenController;
use App\Models\User;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('clima/{ciudad}', [ClimaController::class, 'forecast'])->middleware('auth:sanctum');

Route::post('/tokens/create', [TokenController::class, 'create']);


