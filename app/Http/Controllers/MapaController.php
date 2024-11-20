<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MapaController extends Controller
{
    private $latitud = 7.116816;
    private $longitud = -73.105240;

    public function showMapa()
    {
        Log::info('Vista del mapa cargada correctamente.');
        return view('mapa.mapa');
    }

    public function getUbicacionVehiculo()
    {
        $deviceId = 'abc123';
        $apiToken = 'SharedAccessSignature sr=b9fed3f2-6920-48ef-81f5-df2b4b6f5eee&sig=UCPz6sksviV6nPAWTvyQdjHBiDwWHKulhSVotuf7SWw%3D&skn=vehiculo-token&se=1763106357543';

        $url = "https://personalizado-12eisw56o06.azureiotcentral.com/api/devices/{$deviceId}/telemetry";

        Log::info('Iniciando solicitud HTTP hacia Azure IoT Central.', [
            'url' => $url,
            'deviceId' => $deviceId
        ]);

        try {
            $response = Http::withHeaders([
                'Authorization' => "Bearer {$apiToken}",
            ])->get($url);

            Log::info('Respuesta recibida de Azure IoT Central.', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);

            if ($response->successful()) {
                $telemetry = $response->json();

                Log::info('Datos de telemetría procesados correctamente.', $telemetry);

                return response()->json([
                    'lat' => $telemetry['latitude'] ?? $this->latitud,
                    'lng' => $telemetry['longitude'] ?? $this->longitud,
                ]);
            }

            Log::warning('La solicitud a Azure IoT Central no fue exitosa.', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);

        } catch (\Exception $e) {
            Log::error('Excepción al realizar la solicitud HTTP.', [
                'error' => $e->getMessage()
            ]);
        }

        return response()->json(['error' => 'No se pudieron obtener los datos de telemetría'], 500);
    }
}
