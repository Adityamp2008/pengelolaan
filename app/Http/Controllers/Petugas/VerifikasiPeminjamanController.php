<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class VerifikasiPeminjamanController extends Controller
{
    // Menampilkan daftar pengajuan peminjaman yang belum diverifikasi
    public function index()
    {
        $peminjaman = Peminjaman::with(['user', 'inventaris'])
            ->orderByDesc('created_at')
            ->get();

        return view('pages.petugas.verifikasi.index', compact('peminjaman'));
    }

    // Proses verifikasi oleh petugas
    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // Update status peminjaman
        $peminjaman->update([
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        // Kalau disetujui, ubah status barang jadi Dipinjam
        if ($request->status == 'disetujui') {
            $peminjaman->inventaris->update(['status' => 'Dipinjam']);
        }

        // Kalau ditolak, tetap tersedia
        if ($request->status == 'ditolak') {
            $peminjaman->inventaris->update(['status' => 'Tersedia']);
        }

        return redirect()->route('verifikasi.index')->with('success', 'Peminjaman berhasil diverifikasi.');
    }
}
