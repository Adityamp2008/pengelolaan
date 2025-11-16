<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\lokasi;
use Illuminate\Http\Request;

class lokasisController extends Controller
{
    public function index()
    {
        $lokasi = lokasi::latest()->get();
        return view('pages.admin.lokasi.index', compact('lokasi'));
    }

    public function create()
    {
        return view('pages.admin.lokasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required|string|max:255|unique:lokasi,nama_lokasi',
        ]);

        Lokasi::create($request->all());
        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $lokasiEdit = lokasi::findOrFail($id);
        $lokasi = lokasi::latest()->get();

        return view('pages.admin.lokasi.edit', compact('lokasiEdit', 'lokasi'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lokasi' => 'required|string|max:255|unique:lokasi,nama_lokasi,' . $id,
        ]);

        $lokasi = lokasi::findOrFail($id);
        $lokasi->update($request->all());
        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        lokasi::findOrFail($id)->delete();
        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil dihapus.');
    }
}
