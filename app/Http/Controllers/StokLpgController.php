<?php

namespace App\Http\Controllers;

use App\Models\StokLpg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class StokLpgController extends Controller
{
    public function index()
    {
        $user = Auth::guard('penjual')->user();

        // 🔹 Ambil stok terbaru per jenis untuk user login
        $stok = StokLpg::where('user_id', $user->id)
            ->whereIn('id', function ($query) use ($user) {
                $query->selectRaw('MAX(id)')
                    ->from('stok_lpg')
                    ->where('user_id', $user->id)
                    ->groupBy('jenis');
            })
            ->orderBy('updated_at', 'desc')
            ->get(['id', 'jenis', 'stok', 'harga', 'status', 'updated_at']);

        // 🔹 Hitung total stok dan jumlah jenis
        $totalStok = StokLpg::where('user_id', $user->id)->sum('stok');
        $jumlahJenis = $stok->count();

        // 🔹 Hitung kategori stok
        $stokAdequate = $stok->where('status', 'adequate')->count();
        $stokLow      = $stok->where('status', 'low')->count();
        $stokCritical = $stok->where('status', 'critical')->count();

        // 🔹 Buat konfirmasi delete (SweetAlert)
        $title = 'Hapus data stok!';
        $text = "Anda yakin ingin menghapus data ini?";
        confirmDelete($title, $text);

        return view('penjual.stoklpg', compact(
            'user',
            'stok',
            'totalStok',
            'jumlahJenis',
            'stokAdequate',
            'stokLow',
            'stokCritical'
        ));
    }

    public function create()
    {
        $user = Auth::guard('penjual')->user();
        $stok = StokLpg::where('user_id', $user->id)->get();

        return view('penjual.tambahstoklpg', compact('user', 'stok'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|string',
            'stok'  => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);

        $user = Auth::guard('penjual')->user();

        // Tentuin status stok otomatis
        if ($request->stok >= 10) {
            $status = 'adequate';
        } elseif ($request->stok >= 5) {
            $status = 'low';
        } else {
            $status = 'critical';
        }

        // 🔍 Cek apakah stok jenis ini udah ada buat user login
        $existing = StokLpg::where('user_id', $user->id)
            ->where('jenis', $request->jenis)
            ->first();

        if ($existing) {
            // 🔁 Tambah stok lama + stok baru
            $existing->stok = $request->stok;
            $existing->harga = $request->harga; // update harga
            $existing->status = $status;
            $existing->save();

            Alert::success('Berhasil', 'Stok berhasil diperbarui (stok ditambahkan)!');
        } else {
            // ➕ Kalau belum ada jenis itu, buat baru
            StokLpg::create([
                'jenis'      => $request->jenis,
                'stok'       => $request->stok,
                'harga'      => $request->harga,
                'status'     => $status,
                'user_id'    => $user->id,
            ]);

            Alert::success('Berhasil', 'Stok baru berhasil ditambahkan!');
        }

        return redirect()->route('stoklpg.index');
    }

    public function edit(StokLpg $stoklpg)
    {
        // pastikan stok milik user yang login
        if ($stoklpg->user_id != Auth::guard('penjual')->id()) {
            return redirect()->route('stoklpg.index')->with('error', 'Tidak boleh edit stok user lain!');
        }

        $user = Auth::guard('penjual')->user();
        $stok = StokLpg::where('user_id', $user->id)->get();

        return view('penjual.editstoklpg', compact('stoklpg', 'stok', 'user'));
    }

    public function update(Request $request, StokLpg $stoklpg)
    {
        $request->validate([
            'jenis' => 'required|string',
            'stok' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:1000',
        ]);

        // Pastikan hanya pemilik stok yang bisa update
        if ($stoklpg->user_id != Auth::guard('penjual')->id()) {
            return redirect()->route('stoklpg.index')->with('error', 'Tidak boleh edit stok user lain!');
        }

        // Tentukan status otomatis
        $status = 'adequate';
        if ($request->stok <= 10) {
            $status = 'critical';
        } elseif ($request->stok <= 50) {
            $status = 'low';
        }

        $stoklpg->update([
            'jenis' => $request->jenis,
            'stok'  => $request->stok,
            'harga' => $request->harga,
            'status' => $status,
        ]);
        Alert::success('Success', 'Data berhasil diperbarui!');
        return redirect()->route('stoklpg.index');
    }

    public function destroy(StokLpg $stoklpg)
    {
        // Pastikan hanya pemilik stok yang bisa hapus
        if ($stoklpg->user_id != Auth::guard('penjual')->id()) {
            return redirect()->route('stoklpg.index')->with('error', 'Tidak boleh hapus stok user lain!');
        }

        $stoklpg->delete();

        Alert::success('Success', 'Stok dihapus');
        return redirect()->route('stoklpg.index');
    }
}
