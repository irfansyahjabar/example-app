<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\User;

// class MapController extends Controller
// {
//     public function getData()
//     {
//         // Ambil semua penjual + data stok LPG mereka
//         $penjuals = User::with('stokLpg')->get();

//         // Kirim ke frontend dalam format JSON
//         return response()->json($penjuals);
//     }
// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MapController extends Controller
{
    public function getData()
    {
        // Ambil semua penjual dengan relasi stok LPG-nya
        $penjuals = User::with('stokLpg')
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->get(['id', 'name', 'phone', 'address', 'latitude', 'longitude']);

        // Ubah format JSON biar mudah dipakai di JavaScript
        $data = $penjuals->map(function ($user) {
            return [
                'id' => $user->id,
                'store_name' => $user->name,
                'phone' => $user->phone,
                'address' => $user->address,
                'latitude' => $user->latitude,
                'longitude' => $user->longitude,
                'stok_lpg' => $user->stokLpg->map(function ($stok) {
                    return [
                        'jenis' => $stok->jenis,
                        'stok' => $stok->stok,
                        'harga' => $stok->harga,
                        'status' => $stok->status,
                    ];
                }),
            ];
        });

        return response()->json($data);
    }
}
