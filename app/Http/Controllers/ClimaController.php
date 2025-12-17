<?php

namespace App\Http\Controllers;

use App\Models\PeticionClima;
use App\Services\ClimaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClimaController extends Controller
{
    //
    public function forecast(string $ciudad) {
        return ClimaService::forecast($ciudad);
    }
}
