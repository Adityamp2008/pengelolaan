<?php

namespace App\Http\Controllers\Petugas;
use App\Http\Controllers\Controller;
use App\Models\Inventaris;
use App\Models\Kategori;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function index()
    {
        // Ambil semua data inventaris dengan relasi kategori & lokasi
        $inventaris = Inventaris::with(['kategori', 'lokasi'])->latest()->get();
        return view('pages.petugas.inventaris.index', compact('inventaris'));
    }

    public function create()
    {
        // Ambil data kategori & lokasi untuk dropdown
        $kategori = Kategori::all();
        $lokasi = Lokasi::all();
        return view('pages.petugas.inventaris.create', compact('kategori', 'lokasi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'lokasi_id' => 'required|exists:lokasi,id',
            'kondisi' => 'required|string',
            'status' => 'required|string',
            'tanggal_perolehan' => 'nullable|date',
        ]);

        Inventaris::create($request->all());

        return redirect()->route('inventari.index')->with('success', 'Data inventaris berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        $kategori = Kategori::all();
        $lokasi = Lokasi::all();
        return view('pages.petugas.inventaris.edit', compact('inventaris', 'kategori', 'lokasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'lokasi_id' => 'required|exists:lokasi,id',
            'kondisi' => 'required|string',
            'status' => 'required|string',
            'tanggal_perolehan' => 'nullable|date',
        ]);

        $inventaris = Inventaris::findOrFail($id);
        $inventaris->update($request->all());

        return redirect()->route('inventaris.index')->with('success', 'Data inventaris berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Inventaris::findOrFail($id)->delete();
        return redirect()->route('inventaris.index')->with('success', 'Data inventaris berhasil dihapus.');
    }
}
