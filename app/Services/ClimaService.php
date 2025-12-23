<?php

namespace App\Services;

use App\Models\PeticionClima;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ClimaService
{

    public static function forecast(string $ciudad): array
    {
        $cache_key = $ciudad . "_" . now()->toDateString();

        if (Cache::has($cache_key)) {
            return Cache::get($cache_key);
        } else {
        $appid=config('services.weather_api.key');

        if($appid == '' || $appid == null) {

            error_log('La clave de API de openweather no está configurada, revisar el archivo .env');


            return [
                'message' => 'Error interno del servidor',
            ];
        }

        $response = Http::get('https://api.openweathermap.org/geo/1.0/direct?q=' . urlencode($ciudad) . '&appid=' . $appid . '&limit=1');
        $lat = $response[0]['lat'];
        $lon = $response[0]['lon'];

        $forecast = Http::get('https://api.openweathermap.org/data/3.0/onecall?lon='. urlencode($lon). '&lat='. urlencode($lat) . '&appid=' . $appid . '&units=metric' );
        $peticion = new PeticionClima(['city' => $ciudad]);
        $peticion->save();

        $three_day_forecast =  array_slice(($forecast['daily']), 0,3);
        Cache::add($cache_key, $three_day_forecast);
        return $three_day_forecast;
        }

    }
}
