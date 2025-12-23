<?php

namespace App\Http\Controllers;

use App\Models\PeticionClima;
use App\Services\ClimaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClimaController extends Controller
{
    public static function forecast(string $ciudad) {
        $array =  ClimaService::forecast($ciudad);
        if(isset($array['message'])) {
            return response()->json($array,500);
        } else {
            return response()->json($array,200);
        }
    }
}
