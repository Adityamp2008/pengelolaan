<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use App\Models\Inventaris;
use App\Models\Kerusakan;
use Illuminate\Http\Request;

class LaporKerusakanController extends Controller
{
    /**
     * Tampilkan form laporan kerusakan untuk inventaris tertentu.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function formLapor($id)
    {
        $inventaris = Inventaris::with('lokasi')->findOrFail($id);

        return view('pages.guru.laporkerusakan.index', [
            'inventaris' => $inventaris
        ]);
    }

    /**
     * Simpan laporan kerusakan ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeLaporan(Request $request)
    {
        $validated = $request->validate([
            'inventaris_id' => 'required|exists:inventaris,id',
            'deskripsi_kerusakan' => 'required|string|max:255',
        ]);

        // Ambil data inventaris dalam satu query
        $inventaris = Inventaris::with('lokasi')->findOrFail($validated['inventaris_id']);

        Kerusakan::create([
            'inventaris_id'        => $inventaris->id,
            'nama_barang'          => $inventaris->nama_barang,
            'lokasi'               => $inventaris->lokasi->nama_lokasi ?? '-',
            'deskripsi_kerusakan'  => $validated['deskripsi_kerusakan'],
        ]);

        return redirect()
            ->route('guru.inventaris.index')
            ->with('success', 'Laporan kerusakan berhasil dikirim ke petugas.');
    }
}
