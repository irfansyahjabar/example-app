<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PbfController extends Controller
{
    public function convertToGeoJson()
    {
        $path = storage_path('app/public/data/majene.pbf');
        $output = storage_path('app/public/data/majene.geojson');
        $osmPath = 'C:\\Windows\\System32\\osmconvert.exe'; // lokasi osmconvert

        if (!file_exists($path)) {
            return response()->json(['error' => 'File PBF tidak ditemukan.'], 404);
        }

        // tambah flag --out-geojson
        $command = "\"$osmPath\" \"$path\" --out-geojson -o=\"$output\"";

        exec($command . " 2>&1", $outputLog, $status);

        if ($status !== 0) {
            return response()->json([
                'error' => 'Gagal mengonversi file PBF ke GeoJSON.',
                'log' => $outputLog,
                'command' => $command,
                'status' => $status
            ]);
        }

        // Cek hasil output
        $geojsonContent = file_get_contents($output);

        // Validasi apakah hasil JSON valid
        $jsonCheck = json_decode($geojsonContent, true);
        if ($jsonCheck === null) {
            return response()->json([
                'error' => 'File hasil tidak valid JSON.',
                'log' => $outputLog
            ]);
        }

        return response()->json($jsonCheck);
    }
}
