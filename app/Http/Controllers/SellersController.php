<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class SellersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user();

        if (!$admin) {
            return redirect()->route('admin.loginadmin')->withErrors('Silakan login terlebih dahulu.');
        }

        // Ambil semua data penjual dari tabel users
        $sellers = User::all();

        foreach ($sellers as $seller) {
            // Pastikan longitude dan latitude tidak null sebelum menggabungkan
            if (!$seller->address && $seller->latitude && $seller->longitude) {
                $seller->address = $this->getAddressFromCoordinates($seller->latitude, $seller->longitude);
                $seller->save();
            }
        }

        // Kirim data ke view
        return view('admin.tabelpenjuallpg', compact('admin', 'sellers'));
    }

    private function getAddressFromCoordinates($lat, $lon)
    {
        try {
            $response = Http::withHeaders([
                'User-Agent' => config('app.name') . '/12.0 (' . config('app.url') . ')'
            ])->get('https://nominatim.openstreetmap.org/reverse', [
                'format' => 'json',
                'lat' => $lat,
                'lon' => $lon,
            ]);

            if ($response->successful()) {
                $data = $response->json();

                return $data['display_name'] ?? 'Alamat tidak ditemukan';
            }

            return 'Alamat tidak ditemukan';
        } catch (\Exception $e) {
            return 'Gagal mendapatkan alamat';
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create_penjual');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
