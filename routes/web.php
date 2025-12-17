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

Route::get('clima/{ciudad}', [ClimaController::class, 'forecast']);
