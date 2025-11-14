<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Inventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        // Riwayat peminjaman user guru
        $peminjaman = Peminjaman::with('inventaris')
            ->where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        return view('pages.guru.peminjaman.index', compact('peminjaman'));
    }

public function create()
{
    $barang = Inventaris::where('is_active', 1)
        ->where('status', 'aktif') // <-- ini yang bener
        ->get();

    return view('pages.guru.peminjaman.create', compact('barang'));
}



    public function store(Request $request)
    {
        $request->validate([
            'inventaris_id' => 'required|exists:inventaris,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        $inventaris = Inventaris::findOrFail($request->inventaris_id);

        // ❗ CEK BARANG AKTIF
        if (!$inventaris->is_active) {
            return back()->with('warning', 'Barang ini sedang dinonaktifkan oleh admin.');
        }

        // ❗ CEK BARANG TERSEDIA
        if ($inventaris->status != 'Tersedia') {
            return back()->with('warning', 'Barang tidak tersedia untuk dipinjam.');
        }

        // 🔥 SIMPAN PEMINJAMAN
        Peminjaman::create([
            'inventaris_id' => $inventaris->id,
            'user_id' => Auth::id(),
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'menunggu', // menunggu verifikasi petugas
        ]);

        return redirect()->route('peminjaman.index')
            ->with('success', 'Permintaan peminjaman berhasil dikirim. Menunggu verifikasi petugas.');
    }
}
