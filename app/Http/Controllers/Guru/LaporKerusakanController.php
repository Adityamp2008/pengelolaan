<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Inventaris;
use App\Models\Kerusakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporKerusakanController extends Controller
{
    // Menampilkan daftar inventaris rusak
    public function index()
    {
        $inventaris = Inventaris::whereIn('kondisi', ['rusak ringan', 'rusak berat'])->get();

        return view('pages.guru.laporkerusakan.index', compact('inventaris'));
    }

    // Form untuk menambah laporan kerusakan
    public function create(Request $request)
    {
        // Ambil barang berdasarkan ID yang dikirim dari tombol
        $inventaris = Inventaris::findOrFail($request->inventaris_id);

        return view('pages.guru.laporkerusakan.create', compact('inventaris'));
    }

    // Menyimpan laporan kerusakan
    public function store(Request $request)
    {
        $request->validate([
            'inventaris_id' => 'required|exists:inventaris,id',
            'deskripsi_kerusakan' => 'required|string|max:500',
        ]);

        kerusakan::create([
            'inventaris_id' => $request->inventaris_id,
            'user_id' => Auth::id(),
            'deskripsi_kerusakan' => $request->deskripsi_kerusakan,
            'status' => 'Menunggu Petugas',
        ]);

        return redirect()->route('laporkerusakan.index')->with('success', 'Laporan kerusakan berhasil dikirim!');
    }
}
