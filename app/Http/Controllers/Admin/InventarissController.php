<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventariss;
use Illuminate\Http\Request;

class InventarissController extends Controller
{
    public function index()
    {
        $inventaris = Inventaris::orderByDesc('created_at')->get();
        return view('pages.admin.inventaris.index', compact('inventaris'));
    }

    public function create()
    {
        return view('pages.admin.inventaris.create');
    }

    public function store(Request $request)
    {
        Inventaris::create($request->all());
        return redirect()->route('admin.inventaris.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = Inventaris::findOrFail($id);
        return view('pages.admin.inventaris.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $inventaris = Inventaris::findOrFail($id);

        $inventaris->update($request->all());

        // Otomatis nonaktifkan barang
        if (in_array($request->status, ['Rusak', 'Hilang'])) {
            $inventaris->is_active = 0; 
            $inventaris->save();
        }

        // Kalau normal lagi
        if ($request->status == 'Tersedia') {
            $inventaris->is_active = 1;
            $inventaris->save();
        }

        return redirect()->route('admin.inventaris.index')
            ->with('success', 'Data inventaris berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Inventaris::destroy($id);
        return redirect()->route('admin.inventaris.index')->with('success', 'Barang dihapus!');
    }
}
