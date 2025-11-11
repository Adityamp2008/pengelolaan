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
        $peminjaman = Peminjaman::with('inventaris')
            ->where('user_id', Auth::id())
            ->latest()->get();
        return view('pages.guru.peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $barang = Inventaris::where('status', 'Tersedia')->get();
        return view('pages.guru.peminjaman.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'inventaris_id' => 'required|exists:inventaris,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        Peminjaman::create([
            'user_id' => Auth::id(),
            'inventaris_id' => $request->inventaris_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'Menunggu',
        ]);

        return redirect()->route('peminjaman.index')
            ->with('success', 'Permintaan peminjaman dikirim, menunggu verifikasi petugas.');
    }
}
