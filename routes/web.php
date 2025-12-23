<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClimaController;
use App\Http\Controllers\TokenController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return view('welcome');
});

Route::get('dashboard', function () { return view('dashboard');});


Route::get('clima', function () { return view('clima');});

Route::post('clima', function(Request $request) { $ciudad = $request->input('ciudad'); return ClimaController::forecast($ciudad);});

Route::post('/tokens/create', [TokenController::class, 'web_create']);

Route::get('/user/token', function (Request $request) { return view('auth.token');})->middleware('auth:sanctum');
