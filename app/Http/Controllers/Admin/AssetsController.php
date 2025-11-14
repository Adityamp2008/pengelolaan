<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class AssetsController extends Controller
{
    public function index()
    {
        $assets = Inventaris::orderBy('created_at', 'desc')->get();
        return view('pages.admin.Assets.index', compact('assets'));
    }

  public function nonaktifkan($id)
{
    $asset = Inventaris::findOrFail($id);
    $asset->is_active = 0; // Nonaktifkan
    $asset->save();

    return back()->with('success', 'Barang berhasil dinonaktifkan!');
}

public function aktifkan($id)
{
    $asset = Inventaris::findOrFail($id);
    $asset->is_active = 1; // Aktifkan
    $asset->save();

    return back()->with('success', 'Barang berhasil diaktifkan kembali!');
}




}
