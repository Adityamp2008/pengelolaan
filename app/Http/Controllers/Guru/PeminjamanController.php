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
    $peminjaman = \App\Models\Peminjaman::with('inventaris')
        ->where('user_id', auth()->id())
        ->orderByDesc('created_at')
        ->get();

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
        'user_id' => auth()->id(),
        'inventaris_id' => $request->inventaris_id,
        'tanggal_pinjam' => $request->tanggal_pinjam,
        'tanggal_kembali' => $request->tanggal_kembali,
        'status' => 'pending', // ✅ status default selalu 'pending'
    ]);

    return redirect()->route('peminjaman.index')->with('success', 'Permintaan peminjaman berhasil dikirim dan menunggu verifikasi.');
}

}
