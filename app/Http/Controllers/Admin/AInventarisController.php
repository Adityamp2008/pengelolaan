<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventaris;
use App\Models\Kategori;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class AInventarisController extends Controller
{
    public function index()
    {
        // variabel lokal pakai nama inventaris (bebas)
        $ainventaris = Inventaris::with(['kategori', 'lokasi'])->latest()->get();

        // dikirim ke blade sebagai 'ainventaris'
        return view('pages.admin.ainventaris.index', compact('ainventaris'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $lokasi = Lokasi::all();

        return view('pages.admin.ainventaris.create', compact('kategori', 'lokasi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'lokasi_id' => 'required|exists:lokasi,id',
            'kondisi' => 'required|string',
            'status' => 'required|string',
            'tanggal_perolehan' => 'nullable|date'
        ]);

        Inventaris::create($request->all());

        return redirect()->route('ainventaris.index')
            ->with('success', 'Inventaris berhasil ditambahkan oleh admin.');
    }

    public function edit($id)
    {
        $ainventaris = Inventaris::findOrFail($id);
        $kategori = Kategori::all();
        $lokasi = Lokasi::all();

        return view('pages.admin.ainventaris.edit', compact('ainventaris', 'kategori', 'lokasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'lokasi_id' => 'required|exists:lokasi,id',
            'kondisi' => 'required|string',
            'status' => 'required|string',
            'tanggal_perolehan' => 'nullable|date'
        ]);

        $ainventaris = Inventaris::findOrFail($id);
        $ainventaris->update($request->all());

        return redirect()->route('ainventaris.index')
            ->with('success', 'Inventaris berhasil diperbarui oleh admin.');
    }

    public function hapusForm($id)
    {
        $ainventaris = Inventaris::findOrFail($id);
        return view('pages.admin.ainventaris.hapusForm', compact('ainventaris'));
    }

    public function destroy($id)
    {
        Inventaris::findOrFail($id)->delete();

        return redirect()->route('ainventaris.index')
            ->with('success', 'Inventaris berhasil dihapus oleh admin.');
    }
}
