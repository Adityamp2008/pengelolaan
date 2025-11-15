<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Inventaris;
use App\Models\Kategori;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class GInventarisController extends Controller
{
    /**
     * Guru hanya melihat inventaris.
     */
    public function index()
    {
        $inventaris = Inventaris::with(['kategori', 'lokasi'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('guru.inventaris.index', compact('inventaris'));
    }

    /**
     * Guru hanya bisa melihat detail inventaris.
     */
    public function show($id)
    {
        $inventaris = Inventaris::with(['kategori', 'lokasi'])->findOrFail($id);

        return view('guru.inventaris.show', compact('inventaris'));
    }

    /**
     * Request izin hapus inventaris → dikirim ke petugas.
     */
    public function requestHapus($id)
    {
        $inventaris = Inventaris::findOrFail($id);

        // Logic kirim request hapus ke petugas
        // Bisa simpan ke tabel "pengajuan_hapus"
        // atau update inventaris->status_pengajuan = "menunggu"

        $inventaris->update([
            'request_hapus' => true,          // Buat field ini di database
            'status_request_hapus' => 'menunggu'
        ]);

        return back()->with('success', 'Permintaan hapus telah dikirim ke petugas.');
    }

    /**
     * Request izin edit inventaris → dikirim ke petugas.
     */
    public function requestEdit($id)
    {
        $inventaris = Inventaris::findOrFail($id);

        $inventaris->update([
            'request_edit' => true,
            'status_request_edit' => 'menunggu'
        ]);

        return back()->with('success', 'Permintaan edit telah dikirim ke petugas.');
    }
}
