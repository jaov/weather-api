<?php

use App\Http\Resources\ClimateResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('clima/{ciudad}', function ($ciudad) {
    $appid='';
    $response = Http::get('https://api.openweathermap.org/geo/1.0/direct?q=' . urlencode($ciudad) . '&appid=' . $appid . '&limit=1');
    $lat = $response[0]['lat'];
    $lon = $response[0]['lon'];

    $forecast = Http::get('https://api.openweathermap.org/data/3.0/onecall?lon='. urlencode($lon). '&lat='. urlencode($lat) . '&appid=' . $appid . '&units=metric' );
    return array_slice(($forecast['daily']), 0,3);
});
