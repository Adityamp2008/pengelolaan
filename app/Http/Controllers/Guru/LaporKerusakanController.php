<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kerusakan;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class LaporKerusakanController extends Controller
{
public function formLapor($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        return view('pages.guru.kerusakan.index', compact('inventaris'));
    }

    public function storeLaporan(Request $request)
    {
        $request->validate([
            'inventaris_id' => 'required',
            'deskripsi_kerusakan' => 'required|max:255',
        ]);

        Kerusakan::create([
            'inventaris_id' => $request->inventaris_id,
            'nama_barang' => Inventaris::find($request->inventaris_id)->nama_barang,
            'lokasi' => Inventaris::find($request->inventaris_id)->lokasi->nama_lokasi ?? '-',
            'deskripsi_kerusakan' => $request->deskripsi_kerusakan,
        ]);

        return redirect()->route('guru.inventaris.index')
            ->with('success', 'Laporan kerusakan berhasil dikirim ke petugas.');
    }
}