<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MapaController extends Controller
{
    private $latitud = 7.116816;
    private $longitud = -73.105240;

    public function showMapa()
    {
        return view('mapa.mapa');
    }

    public function getUbicacionVehiculo()
    {
        $this->latitud += (rand(-10, 10) / 10000);
        $this->longitud += (rand(-10, 10) / 10000);

        return response()->json([
            'lat' => $this->latitud,
            'lng' => $this->longitud
        ]);
    }
}
