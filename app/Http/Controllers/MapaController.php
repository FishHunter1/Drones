<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        $deviceId = 'abc123';
        $apiToken = 'SharedAccessSignature sr=b9fed3f2-6920-48ef-81f5-df2b4b6f5eee&sig=UCPz6sksviV6nPAWTvyQdjHBiDwWHKulhSVotuf7SWw%3D&skn=vehiculo-token&se=1763106357543';

        $url = "https://personalizado-12eisw56o06.azureiotcentral.com/api/devices/{$deviceId}/telemetry";

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$apiToken}",
        ])->get($url);

        if ($response->successful()) {
            $telemetry = $response->json();

            return response()->json([
                'lat' => $telemetry['latitude'] ?? 0,
                'lng' => $telemetry['longitude'] ?? 0,
            ]);
        }

        return response()->json(['error' => 'No se pudieron obtener los datos'], 500);
    }
}
