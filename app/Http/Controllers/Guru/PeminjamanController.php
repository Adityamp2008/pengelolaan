<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\inventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function create()
    {
        $barang = inventaris::where('is_active', 1)->get();
        return view('pages.guru.peminjaman.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'inventaris_id' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
        ]);

        Peminjaman::create([
            'user_id' => Auth::id(),
            'inventaris_id' => $request->inventaris_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'pending',
        ]);

        return redirect()->route('peminjaman.index')
                         ->with('success', 'Peminjaman berhasil diajukan!');
    }

    public function index()
    {
        $peminjaman = Peminjaman::where('user_id', Auth::id())
                                ->with('inventaris')
                                ->orderBy('created_at', 'DESC')
                                ->get();

        return view('pages.guru.peminjaman.index', compact('peminjaman'));
    }
}
