<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

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
        // Validasi data input dari form
        $validated = $request->validate([
            'ownerName'   => 'required|string|max:255',
            'shopName'    => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email',
            'phoneNumber' => 'required|string|max:20',
            'password'    => 'required|min:6',
            'latitude'    => 'nullable|numeric',
            'longitude'   => 'nullable|numeric',
        ]);

        // Simpan ke tabel users
        $user = User::create([
            'name'       => $validated['ownerName'],
            'store_name' => $validated['shopName'],
            'email'      => $validated['email'],
            'phone'      => $validated['phoneNumber'],
            'password'   => bcrypt($validated['password']),
            'latitude'   => $validated['latitude'] ?? null,
            'longitude'  => $validated['longitude'] ?? null,
        ]);

        Alert::toast('data berhasil ditambah!', 'success');
        return redirect('/admin/sellers');
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
    public function edit($id)
    {
        $seller = User::findOrFail($id);
        return view('admin.edit_penjual', compact('seller'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'store_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|string|max:20',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $seller = User::findOrFail($id);
        $seller->update($validated);

        Alert::toast('data berhasil diubah!', 'success');
        return redirect()->route('sellers.index')->with('success', 'Data penjual berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $seller = User::findOrFail($id);
        $seller->delete();

        Alert::toast('data berhasil dihapus!', 'success');
        return redirect()->route('sellers.index');
    }
}
