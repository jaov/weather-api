<?php

namespace App\Services;

use App\Models\PeticionClima;
use Illuminate\Support\Facades\Http;

class ClimaService
{

    public static function forecast(string $ciudad): array
    {
        $appid='';
        $appid=config('services.weather_api.key');
        $response = Http::get('https://api.openweathermap.org/geo/1.0/direct?q=' . urlencode($ciudad) . '&appid=' . $appid . '&limit=1');
        $lat = $response[0]['lat'];
        $lon = $response[0]['lon'];

        $forecast = Http::get('https://api.openweathermap.org/data/3.0/onecall?lon='. urlencode($lon). '&lat='. urlencode($lat) . '&appid=' . $appid . '&units=metric' );
        $peticion = new PeticionClima(['city' => $ciudad]);
        $peticion->save();

        return array_slice(($forecast['daily']), 0,3);
    }
}
