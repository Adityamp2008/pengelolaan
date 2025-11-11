<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class VerifikasiPeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['user', 'inventaris'])->orderByDesc('created_at')->get();
        return view('pages.petugas.verifikasi.index', compact('peminjaman'));
    }

    public function approve($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update(['status' => 'disetujui']);

        $peminjaman->inventaris->update(['status' => 'Dipinjam']);

        return redirect()->back()->with('success', 'Peminjaman disetujui.');
    }

    public function reject($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update(['status' => 'ditolak']);

        return redirect()->back()->with('warning', 'Peminjaman ditolak.');
    }

    public function selesai($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update(['status' => 'selesai']);
        $peminjaman->inventaris->update(['status' => 'Tersedia']);

        return redirect()->back()->with('success', 'Peminjaman telah diselesaikan.');
    }
}
