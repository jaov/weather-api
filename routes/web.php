<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClimaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return view('welcome');
});

Route::get('dashboard', function () { return view('dashboard');});

Route::post('clima', function(Request $request) { $ciudad = $request->input('ciudad'); return ClimaController::forecast($ciudad);});

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

Route::get('/user/token', function (Request $request) { return view('auth.token');})->middleware('auth:sanctum');
