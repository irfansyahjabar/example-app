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
        $user = Auth::user();

        // Ambil stok user login, dikelompokkan berdasarkan jenis
        $stok = StokLpg::where('user_id', $user->id)
            ->selectRaw('MAX(id) as id, jenis, SUM(stok) as total_stok')
            ->groupBy('jenis')
            ->get();

        // Hitung total stok user login
        $totalStok = $stok->sum('total_stok');

        // Hitung jumlah jenis LPG user login
        $jumlahJenis = $stok->count();

        // Ambil data asli untuk hitung status
        $stokAsli = StokLpg::where('user_id', $user->id)->get();

        $stokAdequate = $stokAsli->where('status', 'adequate')->count();
        $stokLow      = $stokAsli->where('status', 'low')->count();
        $stokCritical = $stokAsli->where('status', 'critical')->count();

        // Membuat delete confirmation
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
        $user = auth::user();
        $stok = StokLpg::where('user_id', $user->id)->get();

        return view('penjual.tambahstoklpg', compact('user', 'stok'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|string',
            'stok' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:1000',
        ]);

        // Tentukan status otomatis
        $status = 'adequate';
        if ($request->stok <= 3) {
            $status = 'critical';
        } elseif ($request->stok <= 15) {
            $status = 'low';
        }

        StokLpg::create([
            'user_id' => auth::id(),   // simpan user yang login
            'jenis'   => $request->jenis,
            'stok'    => $request->stok,
            'harga'   => $request->harga,
            'status'  => $status,
        ]);
        Alert::success('Success', 'Data berhasil ditambahkan!');
        return redirect()->route('stoklpg.index')->with('success', 'Stok berhasil ditambahkan!');
    }

    public function edit(StokLpg $stoklpg)
    {
        // pastikan stok milik user yang login
        if ($stoklpg->user_id !== auth::id()) {
            return redirect()->route('stoklpg.index')->with('error', 'Tidak boleh edit stok user lain!');
        }

        $user = auth::user();
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
        if ($stoklpg->user_id !== auth::id()) {
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
        if ($stoklpg->user_id !== auth::id()) {
            return redirect()->route('stoklpg.index')->with('error', 'Tidak boleh hapus stok user lain!');
        }

        $stoklpg->delete();

        return redirect()->route('stoklpg.index')->with('success', 'Stok berhasil dihapus!');
    }
}
