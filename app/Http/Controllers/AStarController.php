<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AStarController extends Controller
{
    public function getGraphData()
    {
        $path = storage_path('app/public/data/majene.pbf');

        if (!file_exists($path)) {
            return response()->json(['error' => 'File GeoJSON tidak ditemukan.'], 404);
        }

        $data = json_decode(file_get_contents($path), true);

        // Ambil semua koordinat jalan (contohnya dari LineString)
        $graph = [];
        foreach ($data['features'] as $feature) {
            if ($feature['geometry']['type'] === 'LineString') {
                $coords = $feature['geometry']['coordinates'];

                // Simpan node & edge antar koordinat
                for ($i = 0; $i < count($coords) - 1; $i++) {
                    $from = $coords[$i];
                    $to = $coords[$i + 1];

                    $graph[] = [
                        'from' => ['lat' => $from[1], 'lng' => $from[0]],
                        'to' => ['lat' => $to[1], 'lng' => $to[0]],
                    ];
                }
            }
        }

        return response()->json($graph);
    }
}
